<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .background {
            background: url('image/bannerss.jpg') no-repeat center center/cover;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            padding-bottom: 40px;
            position: relative;
        }

        .header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .logo {
            position: absolute;
            left: 20px;
            height: 60px;
        }

        .heading {
            font-size: 24px;
            font-weight: bold;
            color: #004080;
        }

        .button-group {
            display: flex;
            gap: 20px;
        }

        .btn {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .form-popup {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            z-index: 10;
            width: 300px;
        }

        .form-popup label {
            display: block;
            margin: 10px 0 5px;
        }

        .form-popup input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .form-popup button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
        }

        .form-popup button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="background">
        <!-- Header Section -->
        <div class="header">
            <img src="image/tatasteel_logo.png" alt="Tata Steel Logo" class="logo">
            <div class="heading">Welcome to the SNTI Feedback System</div>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <button class="btn" onclick="openTraineeForm()">Trainee Login</button>
            <button class="btn" onclick="openAdminForm()">Admin Login</button>
        </div>

        <!-- Trainee Login Form Popup -->
        <div class="form-popup" id="traineeForm">
            <form action="trainee_feedback.php" method="POST">
                <h3 style="margin-bottom: 15px;">Trainee Login</h3>
                <label for="trainee_id">User ID:</label>
                <input type="text" name="trainee_id" required>
                <label for="trainee_pass">Password:</label>
                <input type="password" name="trainee_pass" required>
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Admin Login Form Popup -->
        <div class="form-popup" id="adminForm">
            <form action="admin_feedback.php" method="POST">
                <h3 style="margin-bottom: 15px;">Admin Login</h3>
                <label for="admin_id">Admin ID:</label>
                <input type="text" name="admin_id" required>
                <label for="admin_pass">Password:</label>
                <input type="password" name="admin_pass" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        function openTraineeForm() {
            document.getElementById("traineeForm").style.display = "block";
            document.getElementById("adminForm").style.display = "none";
        }

        function openAdminForm() {
            document.getElementById("adminForm").style.display = "block";
            document.getElementById("traineeForm").style.display = "none";
        }
    </script>

</body>
</html>
