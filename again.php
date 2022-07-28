<?php
    $con = mysqli_connect("localhost", "bee6cd4feb80c5", "4b1c8190", "core_php");

    if (isset($_GET['search'])) {
        $filtervalues = $_GET['search'];
        //$filtervalues1 = $_GET['Year'];
        // $filtervalues2 = $_GET['Month'];
        // $qry="SELECT * FROM individualledgger WHERE CONCAT(comp_number) LIKE '%$filtervalues%' ";
        $qry="SELECT * FROM currency WHERE iso_code ='$filtervalues'";
        $result = mysqli_query($con, $qry);

        if (mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'>
			   alert( 'One Record Found!');
			   </script>";
            header('location:search_record.php?message=1');
            foreach ($result as $items) {
                ?>
<tr>
	<td><?= $items['date']; ?>
	</td>
	<td><?= $items['parti']; ?>
	</td>
	<td><?= $items['lf']; ?>
	</td>
	<td><?= number_format($items['cash'], 3); ?>
	</td>
	<td><?= $items['date1']; ?>
	</td>
	<td><?= $items['parti1']; ?>
	</td>
	<td><?= $items['lf1']; ?>
	</td>
	<td><?= number_format($items['cash1'], 3); ?>
	</td>
</tr>
<?php
            }
        } else {
            echo "<script type='text/javascript'>
			   alert( 'No Record Found!');
			   </script>"; ?>
<tr>
	<td>
		No Record Found!
	</td>
</tr>
<?php
        }
    }
