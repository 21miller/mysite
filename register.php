<?php

// get some functions from phpBB3
define(‘IN_PHPBB’, true);
$phpbb_root_path = ‘forum/';
$phpEx = substr(strrchr(__FILE__, ‘.’), 1);
include($phpbb_root_path . ‘common.’ . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
include($phpbb_root_path .’includes/functions_user.php’);
//$user->setup();

$user_row = array(
‘username’ => ‘testtest’,
‘user_password’ => md5(‘test’),
‘user_email’ => ‘test@test.com’,
‘group_id’ => 2,
‘user_timezone’ => 0,
‘user_dst’ => 1,
‘user_lang’ => ‘en’,
‘user_type’ => 0,
‘user_actkey’ => ”,
‘user_dateformat’ => ‘D M d, Y g:i a’,
‘user_style’ => 1,
‘user_regdate’ => time(),
);
/* Now Register user */
$phpbb_user_id = user_add($user_row);
echo $phpbb_user_id.’ finished';
?>