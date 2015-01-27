
<?php
define('IN_PHPBB', true);
$phpbb_root_path = 'forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup(); ?>

<?php
echo(<form name="register" action="forum/ucp.php?mode=register" method="post" enctype="multipart/form-data">
	<table width="510" border="0">
		<tr>
			<td colspan="2"><p><strong>Registration Form</strong></p></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" maxlength="20" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="new_password" /></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="password_confirm" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Register" /></td>
			<input type="hidden" name="redirect" value="../index.php" /><br />
		</tr>
	</table>
</form>);
?>
</div>

