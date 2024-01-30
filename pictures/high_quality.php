<?php

require_once("../include/users.php");
require_once("../include/pictures.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

session_start();

require_login();

if (!(isset($_GET['key']) && isset($_GET['picid'])))
{
   error_404();
}

$user = Users::current_user();
$pic = Pictures::get_picture($_GET['picid']);

if ($_GET['key'] != 'highquality')
{
   error_404();
}

$filename = $pic['filename'];



header("Content-type: " . mime_content_type($filename));
passthru("cat ../upload/$filename");

?>