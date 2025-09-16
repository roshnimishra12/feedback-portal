<?php 
$adminId = $_POST['admin_id'] ?? '';
$adminPass = $_POST['admin_pass'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Feedback</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #00264d, #66a3ff); /* Dark to Light Blue */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .container {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 650px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 25px;
            font-size: 26px;
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-top: 20px;
            margin-bottom: 6px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            background-color: #005a9e;
            color: #fff;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #003f73;
        }

        .admin-info {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome to the Admin Feedback Form</h2>
        <div class="admin-info">Please fill out the form below:</div>

        <form action="admin_feedback_submit.php" method="POST">
            <input type="hidden" name="admin_id" value="<?php echo htmlspecialchars($adminId); ?>">

            <label for="guide_name">Guide Name:</label>
            <input type="text" name="guide_name" id="guide_name" required>

            <label for="guide_number">Guide Personal Number:</label>
            <input type="text" name="guide_number" id="guide_number" required>

            <label for="experience">How would you describe your experience with SNTI?</label>
            <select name="experience" id="experience" required>
                <option value="">--Select--</option>
                <option value="Not Good">Not Good</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
                <option value="Average">Average</option>
            </select>

            <label for="environment">How was the learning environment?</label>
            <select name="environment" id="environment" required>
                <option value="">--Select--</option>
                <option value="Not Good">Not Good</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
                <option value="Average">Average</option>
            </select>

            <label for="facilities">How would you describe the quality and state of the art facility?</label>
            <select name="facilities" id="facilities" required>
                <option value="">--Select--</option>
                <option value="Not Good">Not Good</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
                <option value="Average">Average</option>
            </select>

            <label for="faculty">How would you describe the faculty and their work?</label>
            <select name="faculty" id="faculty" required>
                <option value="">--Select--</option>
                <option value="Not Good">Not Good</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
                <option value="Average">Average</option>
            </select>

            <label for="impression">What is your impression after the internship at SNTI?</label>
            <select name="impression" id="impression" required>
                <option value="">--Select--</option>
                <option value="Not Good">Not Good</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
                <option value="Average">Average</option>
            </select>

            <label for="remarks">Remarks:</label>
            <textarea name="remarks" id="remarks" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

</body>
</html>
