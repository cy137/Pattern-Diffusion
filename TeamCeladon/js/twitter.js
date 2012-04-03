function showProcessingOverlay()
{
	$("#processingOverlay").modal({
		keyboard: false,
		backdrop: 'static'
	});
}

function hideProcessingOverlay()
{
	$("#processingOverlay").modal('hide');
}

var resultArray = {};

function GetUserAdjacencyGraph()
{
	var duplicateCount = 0;
	for(var i = 0; i < resultSet.rawData.length; i++)
	{
		for(var j = 0; j < resultSet.rawData[i].results.length; j++)
		{
			var tweet = resultSet.rawData[i].results[j];
			var userID = tweet.from_user_id;
			$.ajax({
				url: 'https://api.twitter.com/1/followers/ids.json?cursor=5000&stringify_ids=true&user_id='+userID,
				dataType: 'jsonp',
				success: function(tweetData)	
				{
					resultArray[userID] = tweetData.ids;
				}
			});
		}
	}
}

function SubmitQuery()
{
	showProcessingOverlay();
	$.post("createQuery.php",
		{
			"q":"",
			"callback":"",
			"geocode":$("#geocode").val(),
			"lang":$("#lang").val(),
			"pages":$("#pages").val(),
			"resultType":$("#resultType option:selected").val(),
			"rpp":$("#rpp").val(),
			"showUser":$("#showUser option:selected").val(),
			"until":$("#until").val(), 
			"sinceID":$("#sinceID").val(),
			"includeEntities":$("#includeEntities option:selected").val(),
			"words":$("#words").val(),
			"wordModifiers":$("#wordModifiers").val(),
			"hashTags":$("#hashTags").val(),
			"fromUser":$("#fromUser").val(),
			"toUser":$("#toUser").val(),
			"place":$("#place").val(),
			"mentions":$("#mentions").val(),
			"sinceDate":$("#sinceDate").val(),
			"attitude":$("#attitude").val(),
			"hasURL":$("#hasURL").val(),
			"source":$("#source").val(),
			"customFilter":$("#customFilter").val()
		},
	function(data){
		//LoadResultSetFromSession();
		resultSet = $.parseJSON(data);
		var queryPT1 = 'http://search.twitter.com/search.json?page=';
		var queryPT2 = resultSet.query.queryString;
		var query;
		var returnedData = new Array();
		var def = new Array();
		for(var i = 0; i < parseInt(resultSet.query.pages); i++){
			def.push($.Deferred());
		}
		
		
		for(var i = 1; i <= parseInt(resultSet.query.pages); i++)
		{
			query = queryPT1 + i + queryPT2;
			$.ajax({
				url: query,
				dataType: 'jsonp',
				async:false,
				success: function(tweetData)	
				{
					returnedData.push(tweetData);
					var isResolved = false;
					for(var j = 0; j < def.length && !isResolved; j++)
					{
						if(def[j].state() == "pending")
						{
							def[j].resolve();
							isResolved = true;
						}
					}
				}
			});
		}
		$.when.apply($,def).done(function(){
			resultSet.rawData = returnedData.slice(0);
			SaveResultSetToSession();
			//GetUserAdjacencyGraph();
			hideProcessingOverlay();
		});
	});
}