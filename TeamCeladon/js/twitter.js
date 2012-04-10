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

function CreateUserAdjacencyGraphCallback(userID)
{
	return function(data){
		resultSet.userAdjacencyGraph[userID] = data.ids.slice(0);
		var isResolved = false;
		for(var j = 0; j < uagDef.length && !isResolved; j++)
		{
			if(uagDef[j].state() == "pending")
			{
				uagDef[j].resolve();
				isResolved = true;
			}
		}
	}
}

var uagDef;
function GetUserAdjacencyGraph()
{
	var sampleSize = 100;
	resultSet.userAdjacencyGraph = {};
	uagDef = new Array();
	for(var i = 0; i < sampleSize; i++){
		uagDef.push($.Deferred());
	}
	
	$.ajax({
		url: 'https://api.twitter.com/1/account/rate_limit_status.json',
		dataType: 'jsonp',
		success: function(data){
			if(data.remaining_hits > sampleSize)
			{
				var count = 0;
				var duplicateCount = 0;
				for(var i = 0; i < resultSet.rawData.length && count < sampleSize; i++)
				{
					for(var j = 0; j < resultSet.rawData[i].results.length && count < sampleSize; j++)
					{
						var tweet = resultSet.rawData[i].results[j];
						var userID = tweet.from_user_id;
						$.ajax({
							url: 'https://api.twitter.com/1/followers/ids.json?cursor=-1&user_id='+userID,
							dataType: 'jsonp',
							success:CreateUserAdjacencyGraphCallback(userID)
						});
						count++;
					}
				}
			}
		}
	})
	
	$.when.apply($,uagDef).done(function(){
		$.post("SaveUserAdjacencyGraph.php",{"userAdjacencyGraph":JSON.stringify(resultSet.userAdjacencyGraph)});
	});
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
			GetUserAdjacencyGraph();
			SaveResultSetToSession();
			hideProcessingOverlay();
		});
	});
}