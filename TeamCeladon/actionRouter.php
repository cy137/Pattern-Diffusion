<?php
$action = $_POST["navAction"];
$detail = $_POST["detail"];
$type = $_POST["type"];

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
			case "PCA":
				include("PCAParser.php");
				break;
			case "PatternDiffusion":
				include("PatternDiffusionParser.php");
				break;
		}
		break;
	case "visualizeresults":
		switch($detail)
		{
			case "NumericData":
				if($type == "")
					include("notfound.php");
				else
					include($type."NumericData.php");
				break;
			case "Graphs":
				if($type == "")
					include("notfound.php");
				else
					include($type."Graphs.php");
				break;
		}
		break;
}
?>