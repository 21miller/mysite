
<?php
define('IN_PHPBB', true);
$phpbb_root_path = 'forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup(); ?>
<html>

<head>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Login</title>

</head>

<body>
<?php
if($user->data['is_registered'])
{
echo("<b>Hi " . $user->data['username'] . "!</b><br /><br /><a href='logout.php'>Logout</a>" );
}
else
{
echo('Log In<form action="forum/ucp.php" method="post" enctype="multipart/form-data">
<label for="username">Username:</label><input type="text" name="username" />
<label for="password">Password:</label><input type="password" name="password" />
<label for="username">Automatic login:</label><input type="checkbox" name="autologin" id="autologin" class="checkbox" />
<input type="submit" value="Login" name="Login" />
</form>
<form action="register.php"><input type="submit" value="Register" name="Register" />
</form>');
} ?>

</body>

</html>
