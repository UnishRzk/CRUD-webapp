<!-- =========================== DATABASE CONNECTION FOR APU ======================= -->

<?php
$databaseHost = 'localhost';
$databaseName = 'apu';
$databaseUsername = 'root';
$databasePassword = '';

// Host,username,password,dbname
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli) {
    //echo "connected";
} else {
    echo "error";
}
?>