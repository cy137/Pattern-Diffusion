<?php
$data = $_POST['data'];
$filename = $_POST['filename'];
echo $data;
$handle = fopen($filename, 'a');
fwrite($handle,$data);
fclose($handle);
//unset($value);
?>