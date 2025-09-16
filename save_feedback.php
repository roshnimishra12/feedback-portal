<?php
// Include database connection
include 'db.php';

// Get form data safely using null coalescing operator
$trainee_id = $_POST['trainee_id'] ?? '';
$reference_number = $_POST['reference_number'] ?? '';
$name = $_POST['name'] ?? '';
$branch = $_POST['branch'] ?? '';
$guide_name = $_POST['guide_name'] ?? '';
$guide_personal_name = $_POST['guide_personal_name'] ?? '';
$experience_snti = $_POST['experience_snti'] ?? '';
$learning_environment = $_POST['learning_environment'] ?? '';
$quality_facility = $_POST['quality_facility'] ?? '';

// Check if all required fields are filled
if (
    !empty($trainee_id) && !empty($reference_number) && !empty($name) &&
    !empty($branch) && !empty($guide_name) && !empty($guide_personal_name) &&
    !empty($experience_snti) && !empty($learning_environment) && !empty($quality_facility)
) {
    // Prepare SQL insert statement
    $stmt = $conn->prepare("INSERT INTO trainee_feedback (
        trainee_id, reference_number, name, branch, guide_name, guide_personal_name,
        experience_snti, learning_environment, quality_facility
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the statement
    $stmt->bind_param("sssssssss", 
        $trainee_id, $reference_number, $name, $branch, $guide_name, 
        $guide_personal_name, $experience_snti, $learning_environment, $quality_facility
    );

    // Execute and set message based on result
    if ($stmt->execute()) {
        $message = "✅ Thank you! Your feedback has been submitted successfully.";
    } else {
        $message = "❌ Error submitting feedback: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    $message = "⚠️ All fields are required. Please fill out the entire form.";
}

// Close DB connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Status</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #dceefc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .feedback-container {
            background-color: #ffffff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 106, 170, 0.2);
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        .feedback-container h2 {
            color: #005a9e;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .feedback-container p {
            font-size: 18px;
            color: #333;
        }

        .btn-back {
            margin-top: 30px;
            padding: 12px 28px;
            background-color: #0078D4;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #005a9e;
        }
    </style>
</head>
<body>

<div class="feedback-container">
    <h2>Feedback Status</h2>
    <p><?php echo htmlspecialchars($message); ?></p>
    <a href="dashboard.php" class="btn-back">Go to Dashboard</a>
</div>

</body>
</html>
