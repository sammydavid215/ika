<?php
$con = mysqli_connect("localhost", "root", "", "core_php");
define('phone', 'GetID');
if (!$con) {
    die("Connection Error");
}
$cemail = "";
$ccontact = "";
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

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
<br></br>

<body>
	<div class="form_Client2">
		<div>
			<form method="GET" action="" class="Serch_client">


				Please Put 0 to search All Record

				<div class="serch_LF">
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="text" name="search" value="<?php if (isset($_GET['search'])) {
					    echo $_GET['search'];
					}?>" placeholder="Enter COUNTRY" required />
					<?php
					                                                                                                                                                       $con = mysqli_connect("localhost", "root", "", "core_php");

if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $qry="SELECT * FROM country WHERE sn ='$filtervalues'";
    $result = mysqli_query($con, $qry);
    while ($row=mysqli_fetch_assoc($result)) {
    }
}
?>
					<input type="submit" class="sub" placeholder="Search" />
				</div>
			</form>
		</div>
	</div>
	</div>
	<table id="table" style="width:90%" class="table" border="1">
		<thead>
			<col>
			<colgroup span="2"></colgroup>
			<colgroup span="2"></colgroup>
			<tr>
				<th colspan="12">COUNTRY TABLE</th>
			</tr>
			<tr>
				<th scope="col">S/N</th>
				<th scope="col">continent_code</th>
				<th scope="col">currency_code</th>
				<th scope="col">iso2_code</th>
				<th scope="col">iso3_code</th>
				<th scope="col">iso_numeric_code</th>
				<th scope="col">fips_code</th>
				<th scope="col">calling_code</th>
				<th scope="col">official_name</th>
				<th scope="col">iso3_code</th>
				<th scope="col">endonym</th>
				<th scope="col">demonym</th>

			</tr>
		</thead><br></br>

		<tbody>
			<?php
    $con = mysqli_connect("localhost", "root", "", "core_php");

if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $qry="SELECT * FROM country WHERE sn ='$filtervalues'";
    $result = mysqli_query($con, $qry);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $items) {
            ?>
			<tr>
				<td><?= $items['sn']; ?>
				</td>
				<td><?= $items['continent_code']; ?>
				</td>
				<td><?= $items['currency_code']; ?>
				</td>
				<td><?= $items['iso2_code']; ?>
				</td>
				<td><?= $items['iso3_code']; ?>
				</td>
				<td><?= $items['iso_numeric_code']; ?>
				</td>
				<td><?= $items['fips_code']; ?>
				</td>
				<td><?= $items['calling_code']; ?>
				</td>
				<td><?= $items['official_name']; ?>
				</td>
				<td><?= $items['iso3_code']; ?>
				</td>
				<td><?= $items['endonym']; ?>
				</td>
				<td><?= $items['demonym']; ?>
				</td>
			</tr>
			<?php
        }
    } else {
        ?>
			<tr>
				<td>
					No Record Found!
				</td>
			</tr>
			<?php
    }
}
?>

		</tbody>
	</table>

	</div>
	<div>
		<button onclick="exportToExcel('table')" name="creat_excel" id="create_excel" class="Home2">Create Excel
			File</button>
	</div>
</body>

</html>
</body>
<table>
	<script type="text/javascript">
		function exportToExcel(table, filename = '') {
			var downloadurl;
			var dataFileType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(table);
			var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');

			filename = filename ? filename + '.xls' : 'Export_Personnal_Ledger.xls';

			downloadurl = document.createElement("a");
			document.body.appendChild(downloadurl);

			if (navigator.msSaveOrOpenBlob) {
				var blob = new Blob(['\ufeff', tableHTMLData], {
					type: dataFileType
				});
				navigator.msSaveOrOpenBlob(blob, filename);
			} else {
				downloadurl.href = 'data:' + dataFileType + ',' + tableHTMLData;
				downloadurl.download = filename;
				//downloan.real;
				downloadurl.click();
			}
		}
	</script>

	</html>