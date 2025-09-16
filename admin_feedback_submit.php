<?php
include 'admin_db.php';


$admin_id = $_POST['admin_id'] ?? '';
$guide_name = $_POST['guide_name'] ?? '';
$guide_number = $_POST['guide_number'] ?? '';
$experience = $_POST['experience'] ?? '';
$environment = $_POST['environment'] ?? '';
$facilities = $_POST['facilities'] ?? '';
$faculty = $_POST['faculty'] ?? '';
$impression = $_POST['impression'] ?? '';
$remarks = $_POST['remarks'] ?? '';

// Basic validation
if (empty($admin_id) || empty($guide_name) || empty($guide_number) || empty($experience) || empty($remarks)) {
    echo "<h2 style='color:red; text-align:center;'>Please fill in all required fields.</h2>";
    exit;
}

$sql = "INSERT INTO admin_feedback (
    admin_id, guide_name, guide_number, experience, environment,
    facilities, faculty, impression, remarks, submitted_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssss",
    $admin_id, $guide_name, $guide_number, $experience,
    $environment, $facilities, $faculty, $impression, $remarks
);

if ($stmt->execute()) {
    header("Location: feedback_complete.html");
    exit;
} else {
    echo "<h2>Error submitting feedback: " . htmlspecialchars($stmt->error) . "</h2>";
}

$stmt->close();
$conn->close();
?>
