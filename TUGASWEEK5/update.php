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
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: read.php');
    exit;
}

// Get user data
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    header('Location: read.php');
    exit;
}

$username = $user['username'];
$email = $user['email'];

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
        // Check if username or email exists (except current user)
        $stmt = $conn->prepare("SELECT id FROM users WHERE (username = ? OR email = ?) AND id != ?");
        $stmt->bind_param("ssi", $username, $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $msg = 'Username atau email sudah terdaftar';
            $type = 'error';
        } else {
            // Update data
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $email, $id);

            if ($stmt->execute()) {
                $msg = 'Data berhasil diupdate';
                $type = 'success';
            } else {
                $msg = 'Gagal mengupdate data';
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
    <title>Update Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>

        <?php if ($msg): ?>
            <div class="toast <?php echo $type; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form method="POST" action="update.php?id=<?php echo $id; ?>">
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

            <button type="submit">Update</button>
        </form>

        <div class="nav-buttons">
            <a href="create.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>