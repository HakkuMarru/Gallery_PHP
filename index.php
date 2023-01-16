<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<title>Gallery</title>
</head>
<body>
	<main class="container">
		<section class="gallery">
			<div class="gallery__row">
				<?php
				include_once 'includes/dbh.inc.php';

				$sql = "SELECT * FROM gallery ORDER BY image_order DESC";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "SQL statement failed!";
				} else {
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="gallery__column">
										<div class="gallery__image" style="background-image: url(img/' . $row["image_name"] . ')">
										</div>
										<div class="gallery__name">
											' . $row["title"] . '	
										</div>
										<div class="gallery__description">
										' . $row["description"] . '	
										</div>
									<form action="includes/gallery-delete.inc.php" method="POST">
										<input class="image-name-input" type="text" name="image_name" value="' . $row["image_name"] . '">
										<button class="delete-btn" name="submit-delete">Delete Image</button>
									</form>
								</div>';
					}
				}
				?>
				
			</div>
		</section>
		<section class="form-upload">
			<form action="includes/gallery-upload.inc.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="file_name" placeholder="File name...">
				<input type="text" name="file_title" placeholder="Image title...">
				<input type="text" name="file-desc" placeholder="Image description..">
				<input type="file" name="file">
				<button type="submit" name="submit">UPLOAD</button>
			</form>
		</section>
	</main>
</body>
</html>