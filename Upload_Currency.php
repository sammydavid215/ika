<?php
include("csv.php");
$csv = new csv();
if (isset($_POST['sub'])) {
    $csv->import($_FILES['file']['tmp_name']);
}

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
	<title>
		Uploading And Exporting CSV Files in Php
	</title>
	<div class="nav_head">
		<nav>
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
	<div class="home_1">
		<form method="POST" enctype="multipart/form-data">
			<p class="text">Choose Currency Csv File to Upload Using Core Php</p><br></br>
			<input type="file" name="file" required><br></br>
			<input type="submit" class="button" name="sub" value="Import">
		</form>
	</div>
</body>

</html>