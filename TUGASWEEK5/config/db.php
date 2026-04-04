<!-- 
 Nama: Mohd.Hafiz Yazid Nst
 Nrp: 162023018
  -->
<?php
$host = '127.0.0.1';
$db = 'crud_db';
$user = 'root';
$pass = 'root';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>