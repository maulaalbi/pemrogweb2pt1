<?php
mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "lat_dbase");
$hasil = mysqli_query("select * from tbl_mhs");
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[FirstName] $data[LastName] $data[Age]<br>";
}
?>