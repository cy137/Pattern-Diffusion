<?php
$action = $_POST["navAction"];
$detail = $_POST["detail"];

switch($action)
{
	case "gather":
		switch($detail)
		{
			case "All":
			include("gatherDataForm.php");
				break;
		}
		break;
	case "parseprocess":
		switch($detail)
		{
			case "HITS":
				include("notfound.php");
				break;
			case "PageRank":
				include("notfound.php");
				break;
			case "KMeans":
				include("notfound.php");
				break;
			case "PatternDiffusion":
				include("notfound.php");
				break;
		}
		break;
	case "visualizeresults":
		switch($detail)
		{
			case "NumericData":
				include("notfound.php");
				break;
			case "Graphs":
				include("notfound.php");
				break;
		}
		break;
}
?>