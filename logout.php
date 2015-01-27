<?php
define('IN_PHPBB', true);
$phpbb_root_path = 'forum/'; //the path to your phpbb relative to this script
$phpEx = substr(strrchr(__FILE__, '.'), 1); //the file extension necessary
include("forum/common.php"); //the path to your phpbb common relative to this script

$user->session_kill();
echo 'Logged out successfully!';
header( "refresh:5;url=index.php" );
?>
