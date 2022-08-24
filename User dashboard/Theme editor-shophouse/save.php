<?php


define('MAX_FILE_LIMIT', 1024 * 1024 * 2);//2 Megabytes max html file size

function sanitizeFileName($file)
{
	//sanitize, remove double dot .. and remove get parameters if any
	$file = __DIR__ . '/' . preg_replace('@\?.*$@' , '', preg_replace('@\.{2,}@' , '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $file)));
	return $file;
}

$html = "";
if (isset($_POST['startTemplateUrl']) && !empty($_POST['startTemplateUrl'])) 
{
	$startTemplateUrl = sanitizeFileName($_POST['startTemplateUrl']);
	$html = file_get_contents($startTemplateUrl);
} else if (isset($_POST['html']))
{
	$html = substr($_POST['html'], 0, MAX_FILE_LIMIT);
}

$file = sanitizeFileName($_POST['file']);

if (file_put_contents($file, $html)) {
	echo "File saved $file";
} else {
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	echo "Error saving file  $file\nPossible causes are missing write permission or incorrect file path!";
}	
