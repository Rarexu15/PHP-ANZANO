<?php
// Include the database connection
include 'connect.php';

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        die("Email and Password are required!");
    }

    // Look up the user in the database
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            // Store session variables
            $_SESSION['user'] = $row['firstname']; 
            header("Location: homepage.php"); 
            exit();
        } else {
            die("Invalid password!");
        }
    } else {
        die("User not found!");
    }

    $stmt->close(); // Close statement
    $conn->close(); // Close connection
}
?>

<!-- Login Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.php">Sign up</a></p>
    </form>
</div>
</body>
</html>
