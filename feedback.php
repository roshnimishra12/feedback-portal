<?php
// Include database connection
include 'db.php';

// Get data from form
$trainee_id = $_POST['trainee_id'] ?? '';
$feedback = $_POST['feedback'] ?? '';

// Insert into database if data is provided
if (!empty($trainee_id) && !empty($feedback)) {
    $stmt = $conn->prepare("INSERT INTO trainee_feedback (trainee_id, feedback) VALUES (?, ?)");
    $stmt->bind_param("ss", $trainee_id, $feedback);

    if ($stmt->execute()) {
        $message = "Thank you! Your feedback has been submitted.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    $message = "Please fill in all fields.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8fb;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            background: white;
            padding: 25px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 500px;
        }

        .box h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        .box p {
            font-size: 18px;
            color: #333;
        }

        .btn-back {
            margin-top: 20px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
        }

        .btn-back:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Feedback Status</h2>
    <p><?php echo $message; ?></p>
    <a href="dashboard.php" class="btn-back">Go to Dashboard</a>
</div>

</body>
</html>
