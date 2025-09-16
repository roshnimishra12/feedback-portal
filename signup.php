<?php 
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        $check = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $check);
        
        if (mysqli_num_rows($result) > 0) {
            $message = "User ID already exists!";
        } else {
            $sql = "INSERT INTO users (user_id, password, name) VALUES ('$user_id', '$password', '$name')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['user_id'] = $user_id;
                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Signup</h2>
    
    <?php if ($message != "") echo "<div class='message'>$message</div>"; ?>

    <form method="post" action="">
        <label>User ID:</label>
        <input type="text" name="user_id" required>

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
