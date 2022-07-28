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
            $sql = "INSERT INTO country(continent_code,currency_code,iso2_code,iso3_code,iso_numeric_code,fips_code,
            calling_code,common_name,official_name,endonym,demonym)
            VALUES(".$value.")";

            if (!mysqli_query($con, $sql)) {
                die('Error');
            }
            
            echo "<script type=\"text/javascript\">
alert(\"Country Record Successfully Uploaded! .\");
window.location = \"index.php\"
</script>";
        }
    }
}
