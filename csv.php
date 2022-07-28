<?php
class csv extends mysqli
{
    public function _construct()
    {
        if ($this->connect_error) {
            echo "fail to connecct to database : ". $this->connect_error;
        }
    }
    public function import($file)
    {
        $file = fopen($file, 'r');

        while ($row = fgetcsv($file)) {
            print"<pre>";
            print_r($row);
            print"</pre>";
            $value = "'". implode("','", $row) ."'";
            echo $value;
            $con = mysqli_connect("localhost", "root", "", "core_php");
            $sql = "INSERT INTO currency(iso_code,iso_numeric_code,common_name,official_name,symbol)
            VALUES(".$value.")";
            if (!mysqli_query($con, $sql)) {
                die('Error');
            }
            echo "<script type=\"text/javascript\">
alert(\"Currency Record Successfully Uploaded! .\");
window.location = \"index.php\"
</script>";
        }
    }
}
