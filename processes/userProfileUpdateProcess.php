<?php

//connect database
$db_server = "localhost";
$db_user   = "root";
$db_password = "";
$db_database = "project_1";
$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);

session_start();

if(isset($_POST['update'])) {
	$userNewName        =    $_POST['userName'];
	$userNewDescription =    $_POST['userDescription'];
	$userImageLink      =    escapeshellcmd($_POST['imageLink']);

	if(!empty($userNewName)) {
		$fileExtension = end(explode('.',$userImageLink));
		if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || $fileExtension == 'gif') {
			//Process Image
			if($fileSize < 5000000) {
				$imageName = end(explode('/',$userImageLink)); 
				$fileNewName = "public/userImages/".$imageName;
				//Use wget to download file from link
				exec("cd ../public/userImages/; wget \"{$userImageLink}\"", $output, $retval);

				if(!$retval) {
					$stmt = $connection->prepare('INSERT INTO profile (image_link, name, description) VALUES (?, ?, ?)');
					$stmt->bind_param('sss', $fileNewName, $userNewName, $userNewDescription); 
					$stmt->execute();
					$stmt->close();
					header('Location:../create_profile.php?success=userUpdated');
					exit;
				}

			} else {
				header('Location:../create_profile.php?error=invalidFileSize');
				exit;
			}
			exit;
		} else {
			header('Location:../create_profile.php?error=invalidFileType');
			exit;
		}
	} else {
		header('Location:../create_profile.php?error=emptyNameAndEmail');
		exit;
	}
}
?>
