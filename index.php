<?php
include("csv.php");
$csv = new csv();
if (isset($_POST['sub'])) {
    $csv->import($_FILES['file']['tmp_name']);
}

?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>

<head>
	<title>
		Uploading And Exporting CSV Files in Php
	</title>
	<div class="nav_head">
		<nav class="">
			<ul>
				<a class="nav_header" href="/CSV/index.php">HOME</a>
				<a class="nav_heade" href="/CSV/Upload_Currency.php">UPLOAD CURRENCY</a>
				<a class="nav_heade" href="/CSV/Upload_Country.php">UPLOAD COUNTRY</a>
				<a class="nav_heade" href="/CSV/new_search.php">SEARCH CURRENCY</a>
				<a class="nav_heade" href="/CSV/search_record.php">SEARCH COUNTRY</a>
				<a class="nav_heade" href="/CSV/index.php">BACK</a>

			</ul>
		</nav>
	</div>
</head>

<body>
	<div class="home">

		<form method="POST" enctype="multipart/form-data">
			<p class="text_1">Welcome TO Csv File Upload Using Core Php</p>
			<img src="5.jpg" alt="" class="img">

		</form>

	</div>

</body>

</html>