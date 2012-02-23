<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Twitter Data gathering</title>
</head>
<script src='jquery-1.6.4.js'></script>
<script type='text/javascript' language='javascript'>
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

function queryTwitter2()
{
	var queryPT1 = 'http://search.twitter.com/search.json?page=';
	var queryPT2 = '&q=republican&rpp=100&include_entities=true';
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
							data: 'data=' + dataString + '&filename=republican.txt'
						});
				}
			});
			ajaxQueue.dequeue();
		});
	}
	ajaxQueue.dequeue();
}


$(document).ready(function()
{
	queryTwitter();
	queryTwitter2();
});

</script>
<body>
<div class='content'>
</div>
<?php

?>
</body>
</html>