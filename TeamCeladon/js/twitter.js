function SubmitQuery()
{
	$.ajax({url:"createQuery.php",
		async: false,
		type: "POST",
		data:
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
		}
	},
	function(data){
		resultSet = $.parseJSON(data);
		var queryPT1 = 'http://search.twitter.com/search.json?page=';
		var queryPT2 = resultSet.query.queryString;
		var query;
		var returnedData = new Array();
		//var ajaxQueue = $({});
		for(var i = 1; i <= parseInt(resultSet.query.pages); i++)
		{
			query = queryPT1 + i + queryPT2;
			//ajaxQueue.queue(function(){
			$.ajax({
				url: query,
				dataType: 'jsonp',
				async:false,
				success: function(tweetData)	
				{
					returnedData.push(tweetData);
					console.log(returnedData);
				}
			});
				//ajaxQueue.dequeue();
			//});
		}
		//ajaxQueue.queue(function(){
		resultSet.rawData = returnedData.slice(0);
		
		//console.log(resultSet);
		//console.log(output);
		//console.log(JSON.stringify(returnedData));
		//$.post("saveRawDataToSession.php",
		//{
		//	"rawData": JSON.stringify(returnedData)
		//},function(data2){console.log(data2)});
		//	});
		//ajaxQueue.dequeue();
		
	});
}

function queryTwitter()
{
	var queryPT1 = 'http://search.twitter.com/search.json?page=';
	var queryPT2 = '&q=democrat&rpp=100&include_entities=true';
	var query;
		
	var ajaxQueue = $({});
	for(var i = 1; i <= 10; i++)
	{
		query = queryPT1 + i + queryPT2;
		
		ajaxQueue.queue(function()
			{
			$.ajax({
				url: query,
				dataType: 'jsonp',
				async: false,
				success: function(data)
				{
					var dataString = "";
					for(var j = 0; j < data.results.length; j++)
					{
						dataString += data.results[j].text + "|||";
						$(".content").append(data.results[j].text + "<br>");
					}
					$.ajax({
							url: "writedatatofile.php",
							type: 'POST',
							data: 'data=' + dataString + '&filename=democrat.txt'
						});
				}
			});
			ajaxQueue.dequeue();
		});
	}
	ajaxQueue.dequeue();
}