<?php
    session_start();

    require 'conn.php';  

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnsignup'])) {
        $FullName = htmlspecialchars($_POST['fullnameSign']);
        $Email = htmlspecialchars($_POST['emailSign']);
        $Password = htmlspecialchars($_POST['passwordSign']);
        $PasswordRep = htmlspecialchars($_POST['passwordSign2']);

        // Verificar se o username e/ou o email ja existe na BD
        $sql = "SELECT * FROM users WHERE FullName='$FullName'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $err = 1;
            echo '<script>alert("Username já existente")</script>';
        } else {
            $sql = "SELECT * FROM users WHERE Email='$Email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $err = 1;
                echo '<script>alert("Email já existente")</script>';
            }
        }

        if ($err == 0) {
            if ($Password == $PasswordRep) {
                // Encrypt the password
                $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(FullName, Email, Passwrd, email)
                    VALUES ('$Fullname','$Email','$hashedPassword')";

                if (mysqli_query($conn, $sql)) {
                    echo "</p>Conta criada!";
                    header("location: ../index.html");
                } else {
                    echo "Erro ao Criar a conta!";
                    mysqli_close($conn);
                }
            } else {
                echo '<script>alert("As passwords não coincidem")</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="../CSS/index.css"/>
    <!-- light slider css -->
    <link rel="stylesheet" href="../CSS/lightslider.css">
    <!-- JQuery -->
    <script src="../JS/JQuery.js"></script>
    <!-- light slider js -->
    <script src="../JS/lightslider.js"></script>
    <!-- fav icon -->
    <link rel="shortcut icon" href="../IMG/nike_logo.jpg"/>
    <!-- FontAwesome for social media logos -->
    <script src="https://kit.fontawesome.com/ea92a5f608.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form">
        <!-- sign up -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <div class="sign-up-form">
                <!-- cancel button -->
                <a href="../index.html" class="form-cancel">
                    <i class="fas fa-times"></i>
                </a>

                <!-- heading -->
                <strong>Sign Up</strong>
                <!-- inputs -->
                <input type="text" placeholder="Full Name" name="fullnameSign" required>
                <input type="email" placeholder="Example@gmail.com" name="emailSign" required>
                <input type="password" placeholder="Password" name="passwordSign" required>
                <input type="password" placeholder="Repeat Password" name="passwordSign2" required>
                <!-- submit button -->
                <input type="submit" value="Sign Up" name="btnsignup">
                <!-- forget and sign up button -->
                <div class="form-btns">
                    <a href="login.php" class="already-account">Already Have Account?</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>