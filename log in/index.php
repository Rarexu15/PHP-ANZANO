<?php
// Include database connection
include 'connect.php';

// Start a session to track logged-in users
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        die("Email and Password are required!");
    }

    // Look up user in database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['firstname']; // Store session variable
            header("Location: homepage.php"); // Redirect to homepage
            exit();
        } else {
            die("Invalid password!");
        }
    } else {
        die("User not found!");
    }

    $conn->close(); // Close connection
}
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
    <form method="POST">
        <h2>Login</h2>
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



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="form-title">SIGN IN</h1>
        <form method="post" action="login.php">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
                
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
    </div>
    <div class="register-form">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Sign In</a></p>
    </div>
    
</body>
</html> -->