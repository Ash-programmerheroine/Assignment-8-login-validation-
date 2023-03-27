<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h2>Registration Form</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required>
		<br>
		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required>
		<br>
		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required>
		<br>
		<button type="submit" name="submit">Submit</button>
	</form>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];

			if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
				echo "<p>Please fill in all fields.</p>";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<p>Please enter a valid email address.</p>";
			} elseif ($password !== $confirm_password) {
				echo "<p>Passwords do not match.</p>";
			} else {
				echo "<p>Registration successful!</p>";
			}
		}
	?>
</body>
</html>
