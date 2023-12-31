<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form action="login.php" method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>

<?php
// اگر اطلاعات POST ارسال شده است، اجرای عملیات لاگین
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // دریافت اطلاعات ارسال شده از فرم
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // اجرای عملیات لاگین با استفاده از AuthController
    // مطمئن شوید که فایل AuthController.php را require کرده‌اید
    require_once __DIR__ . '/app/Controllers/AuthController.php';

    use App\Controllers\AuthController;

    $authController = new AuthController();
    $loginResult = $authController->login($username, $password);

    // نمایش پیغام خروجی بر اساس نتیجه لاگین
    if ($loginResult) {
        echo '<p>Login successful!</p>';
        // Redirect to another page if login is successful
        // header("Location: another_page.php");
        // exit();
    } else {
        echo '<p>Login failed. Please try again.</p>';
    }
}
?>
</body>
</html>
