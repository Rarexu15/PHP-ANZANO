<?php
include 'connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
        die("All fields are required!");
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

    if ($stmt->execute()) {
        // Redirect to the registration page with a success message
        header("Location: register.php?success=1");
        exit(); // Stop further execution
    } else {
        die("Error: " . $stmt->error);
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <!-- Success Message Here -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<div class="success-message">Registration successful! <a href="login.php">Login here</a></div>';
    }
    ?>
    <form action="register.php" method="POST">
        <div class="input-group">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
        </div>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
