<?php
    require 'conn.php';

    $FullName = $_POST["fullnameSign"];
    $Email = $_POST["emailSign"];
    $Password = $_POST["passwordSign"];
    $PasswordRep = $_POST["passwordSign2"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="CSS/index.css"/>
    <!-- light slider css-->
    <link rel="stylesheet" type="text/css" href="CSS/lightslider.css">
    <!-- JQuery -->
    <script src="JS/JQuery.js"></script>
    <!-- light slider js-->
    <script src="JS/lightslider.js"></script>
    <!-- fav icon -->
    <link rel="shortcut icon" href="IMG/nike_logo.jpg"/>
    <!-- FontAwesome for social media logos -->
    <script src="https://kit.fontawesome.com/ea92a5f608.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="form">
            <!-- login -->
            <div class="login-form">
                <!-- cancel button -->
                <a href="../index.html" class="form-cancel">
                    <i class="fas fa-times"></i>
                </a>

                <!-- heading -->
                <strong>Log In</strong>
                <!-- inputs -->
                <form >
                    <input type="email" placeholder="Example@gmail.com" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <!-- submit button -->
                    <input type="Submit" value="Log In">
                </form>
                <!-- forget and sign up button -->
                <div class="form-btns">
                    <a href="#" class="forget">Forget Your Password?</a>
                    <a href="signup.php" class="sign-up-btn">Create Account</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>