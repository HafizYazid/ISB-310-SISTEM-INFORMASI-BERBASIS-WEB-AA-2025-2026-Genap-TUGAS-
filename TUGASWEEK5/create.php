<!-- 
 Nama: Mohd.Hafiz Yazid Nst
 Nrp: 162023018
  -->
<?php
include 'config/db.php';

$msg = '';
$type = '';
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validation
    if (empty($username) || empty($email)) {
        $msg = 'Username dan email tidak boleh kosong';
        $type = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Format email tidak valid';
        $type = 'error';
    } else {
        // Check if username or email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $msg = 'Username atau email sudah terdaftar';
            $type = 'error';
        } else {
            // Insert data
            $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $email);

            if ($stmt->execute()) {
                $msg = 'Data berhasil ditambahkan';
                $type = 'success';
                $username = '';
                $email = '';
            } else {
                $msg = 'Gagal menambahkan data';
                $type = 'error';
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Create Data</h2>

        <?php if ($msg): ?>
            <div class="toast <?php echo $type; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form method="POST" action="create.php">
            <label for="username">Name:</label>
            <input 
                type="text" 
                id="username"
                name="username" 
                placeholder="Your name" 
                value="<?php echo htmlspecialchars($username); ?>"
            >

            <label for="email">Email:</label>
            <input 
                type="email" 
                id="email"
                name="email" 
                placeholder="Your email" 
                value="<?php echo htmlspecialchars($email); ?>"
            >

            <button type="submit">Insert</button>
        </form>

        <div class="nav-buttons">
            <a href="create.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>