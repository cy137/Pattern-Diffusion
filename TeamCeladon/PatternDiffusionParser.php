<?php
function ParseWord($input)
{
	$output = $input;
	if(stristr($output,'$'))
		$output = "MONEY";
	$output = str_replace("#","HASHTAG",$output);
	$output = preg_replace("/[^a-zA-Z0-9\s]/","",$output);
	$output = trim($output);
	$output = strtolower($output);
	return $output;
}

?>

<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];

$stopWords = array("a", "about", "above", "after", "again", "against", "all", "am", "an", 
            "and", "any", "are", "aren't", "as", "at", "be", "because", "been", 
            "before", "being", "below", "between", "both", "but", "by", "can't", 
            "cannot", "could", "couldn't", "did", "didn't", "do", "does", "doesn't",
            "doing", "don't", "down", "during", "each", "few", "for", "from", 
            "further", "had", "hadn't", "has", "hasn't", "have", "haven't", 
            "having", "he", "he'd", "he'll", "he's", "her", "here", "here's", 
            "hers", "herself", "him", "himself", "his", "how", "how's", "i", 
            "i'd", "i'll", "i'm", "i've", "if", "in", "into", "is", "isn't", 
            "it", "it's", "its", "itself", "let's", "me", "more", "most", "mustn't", 
            "my", "myself", "no", "nor", "not", "of", "off", "on", "once", "only", "or", 
            "other", "ought", "our", "ours ", " ourselves", "out", "over", "own", "same", 
            "shan't", "she", "she'd", "she'll", "she's", "should", "shouldn't", "so", "some", 
            "such", "than", "that", "that's", "the", "their", "theirs", "them", "themselves", 
            "then", "there", "there's", "these", "they", "they'd", "they'll", "they're", 
            "they've", "this", "those", "through", "to", "too", "under", "until", "up", 
            "very", "was", "wasn't", "we", "we'd", "we'll", "we're", "we've", "were", 
            "weren't", "what", "what's", "when", "when's", "where", "where's", "which", 
            "while", "who", "who's", "whom", "why", "why's", "with", "won't", "would", 
            "wouldn't", "you", "you'd", "you'll", "you're", "you've", "your", "yours", 
            "yourself", "yourselves");
			
$data = $resultSet->rawData;

$keyCounts = array();
for($i = 0; $i < sizeof($data); $i++)
{
	$currResultSet = $data[$i];
	for($j = 0; $j < sizeof($currResultSet["results"]); $j++)
	{
		$currResult = $currResultSet["results"][$j]["text"];
		$words = explode(" ",$currResult);
		for($k = 0; $k < sizeof($words); $k++)
		{
			$word = ParseWord($words[$k]);
			if(!in_array($word,$stopWords) && $word != "")
			{
				if(array_key_exists($word,$keyCounts))
					$keyCounts[$word] = $keyCounts[$word] + 1;
				else
					$keyCounts[$word] = 1;
			}
		}
	}
}
//Get top 100 keys
arsort($keyCounts);
$topKeys = array_slice($keyCounts,0,100,true);
//Write keys to file
$keysFile = "./Results/" . $resultSet->id . "-Keys.txt";
$keysHandle = fopen($keysFile, 'w');
$count = 0;
foreach($topKeys as $key => $value)
{
	$count++;
	fwrite($keysHandle,(string)$count . ": " . $key . " - " . $value . "\r\n");
}
fclose($keysHandle);

$filename = "./Results/" . $resultSet->id . "-ProcessedData.txt";
$handle = fopen($filename, 'w');
for($i = 0; $i < sizeof($data); $i++)
{
	$currResultSet = $data[$i];
	for($j = 0; $j < sizeof($currResultSet["results"]); $j++)
	{
		$currResult = $currResultSet["results"][$j]["text"];
		$output = "";
		foreach(array_keys($topKeys) as $key)
		{
			if(stristr($key,"HASHTAG"))
				$output .= (string)(substr_count(strtolower($currResult),$key)+3);
			else
				$output .= (string)(substr_count(strtolower($currResult),$key));
			$output .= ",";
		}
		$output = substr($output,0,-1);
		$output .= "\r\n";
		fwrite($handle,$output);
	}
}

fclose($handle);

$inputDir = "C:\Websites\TeamCeladon\Results";
$outputDir = "C:\Websites\TeamCeladon\Results";
$command = "matlab -wait -sd {$inputDir} -r PatternDiffusion('{$resultSet->id}',10.0,1.0,2)";
exec($command);
echo("Your data has been successfully processed using the Pattern Diffusion method.");

?>