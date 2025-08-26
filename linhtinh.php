<?php
session_start();


$correct_username = 'admin102';
$correct_password = '1234567';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if ($username === $correct_username && $password === $correct_password) {
      
        $_SESSION['username'] = $username;


        if ($remember) {
            setcookie('username', $username, time() + 15, '/');
        }

        header('Location: index.php');
        exit;
    } else {
        $error_message = '⚠️ Sai tên đăng nhập hoặc mật khẩu!';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; padding: 50px; }
        form { background: #fff; padding: 20px; border-radius: 5px; max-width: 300px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%; padding: 8px; background: #28a745; border: none; color: #fff; border-radius: 3px; cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>

<?php if (!empty($error_message)): ?>
    <div class="error"><?= $error_message ?></div>
<?php endif; ?>

<form method="post">
    <h2>Đăng nhập</h2>
    <input type="text" name="username" placeholder="Tên đăng nhập" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <label><input type="checkbox" name="remember"> Ghi nhớ đăng nhập</label>
    <input type="submit" value="Đăng nhập">
</form>

</body>
</html>