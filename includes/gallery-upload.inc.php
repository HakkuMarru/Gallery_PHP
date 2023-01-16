<?php

if (isset($_POST['submit'])) {
	$new_file_name = $_POST['file_name'];

	if(empty($_POST['file_name']))  {
		$new_file_name = "gallery";
	} else {
		$new_file_name = strtolower(str_replace(' ', '-', $new_file_name));
	}

	$image_title = $_POST['file_title'];
	$image_desc = $_POST['file-desc'];

	$file = $_FILES['file'];

	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_tmp_name = $file['tmp_name'];
	$file_error = $file['error'];
	$file_size = $file['size'];

	$file_ext = explode('.', $file_name);
	$file_ext_final = strtolower(end($file_ext));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($file_ext_final, $allowed)) {
		if ($file_error === 0) {
			if ($file_size < 20000000000) {
				$image_name = $file_name . '.' . uniqid("", true) . '.' . $file_ext_final;
				$file_destionation = "../img/" . $image_name;

				include_once 'dbh.inc.php';

				if (empty($image_title) || empty($image_desc)) {
					header("Location: ../index.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM gallery;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$row_count = mysqli_num_rows($result);
						$set_image_order = $row_count + 1;

						$sql = "INSERT INTO gallery (title, description, image_name, image_order) 
									VALUES (?, ?, ?, ?);";
						
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "SQL statement failed!";
						} else {
							mysqli_stmt_bind_param($stmt, "ssss", $image_title, $image_desc, $image_name, $set_image_order);
							mysqli_stmt_execute($stmt);

							move_uploaded_file($file_tmp_name, $file_destionation);

							header("Location: ../index.php?upload=success");
					exit();
						}
					}
				}
			} else {
				echo "Your file size is too big!";
				exit();
			}
		} else {
			echo "You had an error!";
			exit();
		}
	} else {
		echo "You need to upload a proper file type!";
		exit();
	}
}