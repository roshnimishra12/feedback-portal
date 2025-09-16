<?php
$trainee_id = $_POST['trainee_id'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainee Feedback</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgba(104, 224, 240, 0.79); /* light blue */
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .page-heading {
            text-align: center;
            color: #003366;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
        }

        form {
            background-color: #ffffff; /* white form */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #003366;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
            background-color: #f9f9f9;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            margin-top: 25px;
            background-color: #005A9E;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #003f73;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="page-heading">Welcome to the Trainee Feedback Form</div>

        <form action="save_feedback.php" method="post">
            <input type="hidden" name="trainee_id" value="<?php echo htmlspecialchars($trainee_id); ?>">

            <label for="reference_number">Reference Number</label>
            <input type="text" name="reference_number" id="reference_number" required>

            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="branch">Branch</label>
            <input type="text" name="branch" id="branch" required>

            <label for="guide_name">Guide Name</label>
            <input type="text" name="guide_name" id="guide_name" required>

            <label for="guide_personal_name">Guide Personal Name</label>
            <input type="text" name="guide_personal_name" id="guide_personal_name" required>

            <label for="experience_snti">How would you describe your experience with SNTI?</label>
            <select name="experience_snti" id="experience_snti" required>
                <option value="">-- Select --</option>
                <option value="Not Good">Not Good</option>
                <option value="Average">Average</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
            </select>

            <label for="learning_environment">How was the learning environment?</label>
            <select name="learning_environment" id="learning_environment" required>
                <option value="">-- Select --</option>
                <option value="Not Good">Not Good</option>
                <option value="Average">Average</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
            </select>

            <label for="quality_facility">How would you describe the quality and state-of-the-art facility?</label>
            <select name="quality_facility" id="quality_facility" required>
                <option value="">-- Select --</option>
                <option value="Not Good">Not Good</option>
                <option value="Average">Average</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
            </select>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

</body>
</html>
