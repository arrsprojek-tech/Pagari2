
<?php include "inc/config.php"; ?>
<!DOCTYPE html>
<html><body>
<h2>Login</h2>
<form method="POST" action="process/login_process.php">
<input name="email" required>
<input type="password" name="password" required>
<button>Login</button>
</form>
<a href="register.php">Register</a>
</body></html>
