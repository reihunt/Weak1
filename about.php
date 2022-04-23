<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="templates/css/style.css" rel="stylesheet" >

		<title>Team Fire Portfolio</title>
	</head>

	<body>
		<!-- Start navbar -->
		<?php include "templates/navbar.html" ?>	
		<!-- End navbar -->

		<div class="row" id="members">
			<h1>Community gallery:</h1>
		</div>
		<div class="container-fluid">
			<div class="row justify-content-around mt-5 ms-5">

				<?php
					$db_server = "localhost";
					$db_user   = "root";
					$db_password = "";
					$db_database = "project_1";

					$conn = mysqli_connect($db_server, $db_user, $db_password, $db_database);
					$sql  = "SELECT name, description, image_link FROM profile";
					$result = mysqli_query($conn, $sql);
					$queryResult = mysqli_num_rows($result);
					if ($queryResult > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<div class="col-lg-4 mb-5">
									<div class="card" style="width:400px; border-radius: 0.7rem;">
										<img class="card-img-top" style="border-radius: 0.7rem 0.7rem 0 0;" src="'.$row['image_link'].'" alt="Card image">
										<div class="card-body">
											<h4 class="card-title">'.$row['name'].'</h4>
											<p class="card-text">'.$row['description'].'</p>
											<a href="" target="_blank" class="btn btn-primary">More Information</a>
										</div>
									</div>
								</div>';
						}	
					}
				?>
				

			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>

