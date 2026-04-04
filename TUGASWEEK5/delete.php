<!-- 
 Nama: Mohd.Hafiz Yazid Nst
 Nrp: 162023018
  -->
<?php
include 'config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header('Location: read.php');
exit;
?>