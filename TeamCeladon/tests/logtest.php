<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unit Test Example</title>
</head>

<body>
<?php

	require_once('simpletest/autorun.php');
	require_once('../classes/log.php');

	class TestOfLogging extends UnitTestCase {
    	function __construct() {
        	parent::__construct('Log test');
		}
	
		function testFirstLogMessagesCreatesFileIfNonexistent() {
			@unlink(dirname(__FILE__) . '/../temp/test.log');
			$log = new Log(dirname(__FILE__) . '/../temp/test.log');
			$log->message('Should write this to a file');
			$this->assertTrue(file_exists(dirname(__FILE__) . '/../temp/test.log'));
		}
	}
?>
</body>
</html>