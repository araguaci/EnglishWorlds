<?php
	ob_start();
	require_once './inc/header.inc.php';
	$buffer = ob_get_contents();
	ob_end_clean();
	$buffer=str_replace("%TITLE%","Account Settings",$buffer);
	echo $buffer;
	if ($username) {

	} else {
		die("You must be logged in to view this page!");
	}
 ?>
 <?php
 $senddata = @$_POST['senddata'];
 // Password variables
 $old_password = @$_POST['old_password'];
 $new_password = @$_POST['new_password'];
 $repeat_password = @$_POST['newpassword2'];

	if ($senddata) {
		// If the form is submitted ....
		$password_query = $db->query("SELECT * FROM users WHERE username='$user'");
		if ($password_query) {
			while ($row = $password_query->fetch_assoc()) {
				$db_password = $row['password'];
				// hash the old password before we check if it matches
				$options = [
					'cost' => 11 // TODO: change this for production.
				];
				$old_hashed_password = password_hash($old_password, PASSWORD_BCRYPT, $options);
				// Check whether old password equals $db_password
				if ($old_password == $db_password) {
					// Continue Changing the users password ...
					if ($new_password == $repeat_password) {
						if (strlen($new_password) <= 4) {
							echo "Sorry! But your password must be more than 4 characters";
						} else {
							// hash the new password before we add it to the database.
							$new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT, $options);
							$password_update_query = $db->query("UPDATE users SET password='$new_hashed_password' WHERE username='$username'");
							echo "Success";
						}
					} else {
						echo "Your two new passwords don't match!";
					}
				} else {
					echo "The old password is incorrect!";
				}
			}
		} else {
			echo mysqli_error($db);
		}

	} else {
		// echo "Please submit some data!";
	}
	$updateinfo = @$_POST['updateinfo'];
	// First name, last name, and about the user query
	$get_info = $db->query("SELECT first_name, last_name, bio FROM users WHERE username='$username'");
	if ($get_info) {
		$get_row = $get_info->fetch_assoc();
		$db_first_name = $get_row['first_name'];
		$db_last_name = $get_row['last_name'];
		$db_bio = $get_row['bio'];
		// Submit what the user types into the database.
		if ($updateinfo) {
			$firstname = strip_tags(@$_POST['fname']);
			$lastname = strip_tags(@$_POST['lname']);
			$bio = strip_tags(@$_POST['bio']);
			if (strlen($firstname) < 3) {
				echo "Your first name must be 3 or more characters long!";
			} elseif (strlen($lastname) < 5) {
				echo "Your last name must be 5 or more characters long!";
			} else {
				// Submit the form to the database.
				$info_submit_query = $db->query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$username'");
				echo "Your Profile information has been updated";
			}
		} else {
			// Do nothing
		}
	} else {
		echo mysqli_error($db);
	}

	// Check whether the user has uploaded a profile pic or not
	$check_pic = $db->query("SELECT profile_pic FROM users WHERE username = '$username'");
	if ($check_pic) {
		$get_pic_row = $check_pic->fetch_assoc();
		$profile_pic_db = $get_pic_row['profile_pic'];
		if ($profile_pic_db == "") {
			$profile_pic = "img/default-pp.jpg";
		} else {
			$profile_pic = "userdata/profile_pics/".$profile_pic_db;
		}
	} else {
		echo mysqli_error($db);
	}
	// Profile Image upload script
	if (isset($_FILES['profilepic'])) {
		if (@$_FILES["profilepic"]["type"]=="image/jpeg" || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif") && (@$_FILES["profilepic"]["size"] < 1048576)) /* 1 Megabyte */{
			$chars = "abcdefghijklmnopqrstuvwyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890";
			$rand_dir_name = substr(str_shuffle($chars), 0, 15);
			mkdir("userdata/profile_pic/$rand_dir_name");
			if (file_exists("userdata/profile_pic/$rand_dir_name/".@$_FILES["profilepic"]["name"])) {
				echo @$_FILES["profilepic"]["name"]." Already exists";
			} else {
				move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "userdata/profile_pic/$rand_dir_name/".$_FILES["profilepic"]["name"]);
				// echo "Uploaded and stored in: userdata/profilepic/$rand_dir_name".@$_FILES["profilepic"]["name"];
				$profile_pic_name = @$_FILES["profilepic"]["name"];
				if ($db->query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username = '$username'")) {
					header("Location: account_settings.php");
				} else {
					echo mysqli_error($db);
				}
			}
		} else {
			echo "Invalid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif";
		}
	}
	?>
 <h2>Edit Your account settings below</h2>
 <hr>
 <p>Upload your profile photo</p>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	 <?php
	 $check_pic = $db->query("SELECT profile_pic FROM users WHERE username = '$username'");
	 if ($check_pic) {
		 $get_pic_row = $check_pic->fetch_assoc();
		 $profile_pic_db = $get_pic_row['profile_pic'];
		 if (@$profile_pic_db == NULL) {
			 $profile_pic = "img/default-pp.jpg";
		 } else {
			 $profile_pic = "userdata/profile_pic/".$profile_pic_db;
		 }
	 } else {
		 echo mysqli_error($db);
	 }
		?>
	 <img src="<?php echo $profile_pic; ?>" width="70" alt="<?php echo $username; ?>" />
	 <script type="text/javascript">
			document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
	 </script>
	 <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
		<div class="fileUpload btn btn-primary">
				<span>Upload</span>
				<input id="uploadBtn" type="file" class="upload" />
		</div>
	 <input type="file" name="profilepic" placeholder="wiw"><br>
	 <input type="submit" name="uploadpic" value="Upload Image">
 </form>
<hr>
<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<p>
		<b>Change Your Password:</b><br>
	</p>
	Your Old Password: <input type="password" name="oldpassword" id="oldpassword" size="50"><br>
	Your New Password: <input type="password" name="newpassword" id="newpassword" size="50"><br>
	Repeat Password: <input type="password" name="newpassword2" id="newpassword2" size="50"><br>
	<input type="submit" name="senddata" id="senddata" value="Update Information">
	</form>
	<hr>
	<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<b>UPDATE YOUR PROFILE INFO:</b><br>
		First Name: <input type="text" name="fname" id="fname" size="40" value="<?php echo capitalize($db_first_name); ?>"><br>
		Last Name: <input type="text" name="lname" id="lname" size="40" value="<?php echo capitalize($db_last_name); ?>"><br>
		About You: <textarea name="bio" id="bio" rows="7" cols="40"><?php echo $db_bio; ?></textarea>
	<hr>
	<input type="submit" name="updateinfo" value="Update Information" id="updateinfo">
	</form>
