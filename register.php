<?php
//include config
require_once('../includes/config.php');

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'forum/';

$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/functions_user.' . $phpEx);

<!doctype html>
<html lang="en">
<head>
</head>
<body>

<div id="wrapper">

<h2>Register</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if($password ==''){
			$error[] = 'Please enter the password.';
		}

		if($passwordConfirm ==''){
			$error[] = 'Please confirm the password.';
		}

		if($password != $passwordConfirm){
			$error[] = 'Passwords do not match.';
		}

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if($api_id ==''){
			$error[] = 'Please enter the API Id.';
		}

		if($api_key ==''){
			$error[] = 'Please enter the API Key.';
		}

		if(!isset($error)){

			$hashedpassword = $user->create_hash($password);

			try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO phpbb_users (username,user_password,user_email) VALUES (:username, :password, :email)') ;
				$stmt->execute(array(
					':username' => $username,
					':password' => $hashedpassword,
					':email' => $email
				));

				$stmt = $db->prepare('INSERT INTO phpbb_profile_fields_data (pf_api_id,pf_api_key) VALUES (:api_id, :api_key)') ;
				$stmt->execute(array(
					':api_id' => $api_id,
					':api_key' => $api_key,
				));

				//redirect to index page
				header('Location: index.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>API ID</label><br />
		<input type='text' name='api_id' value='<?php if(isset($error)){ echo $_POST['api_id'];}?>'></p>

		<p><label>API Key</label><br />
		<input type='text' name='api_key' value='<?php if(isset($error)){ echo $_POST['api_key'];}?>'></p>

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
		
		<p><input type='submit' name='submit' value='Register'></p>

	</form>

</div>

