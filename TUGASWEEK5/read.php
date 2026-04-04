<!-- 
 Nama: Mohd.Hafiz Yazid Nst
 Nrp: 162023018
  -->
<?php
include 'config/db.php';

$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Read Data</h2>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="user-item">
                    <div class="user-info">
                        <div class="user-name"><?php echo htmlspecialchars($row['username']); ?></div>
                        <div class="user-email"><?php echo htmlspecialchars($row['email']); ?></div>
                    </div>
                    <div class="user-actions">
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete" data-id="<?php echo $row['id']; ?>">Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-data">Tidak ada data</div>
        <?php endif; ?>

        <div class="nav-buttons">
            <a href="create.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-title">Konfirmasi Hapus</div>
            <div class="modal-text">Apakah Anda yakin ingin menghapus data ini?</div>
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" id="cancelBtn">Batal</button>
                <button class="modal-btn modal-btn-confirm" id="confirmBtn">Hapus</button>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>