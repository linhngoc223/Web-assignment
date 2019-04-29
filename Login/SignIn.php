<html>
<header>
    <title>Sign In Page</title>
    <link rel="stylesheet" href="../Asset/css/Au.css">
</header>
<body>
<?php
session_start();

    require_once '../Database/config.php';
    require "../Core/user.php";

    $user = new User();

    if(isset($_POST['signin'])) {

        $email = $_POST['email'];

        $password = $_POST["password"];

        $user->checkLogin($email, $password);
    }

?>

    <div class="signin">
        <h2>Sign In</h2>
        <h5>Please enter your email and password</h5>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
            <?php
            $user->login();
            ?>
            Email: <br>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter your password" required><br>

            <input type="submit" name="signin" value="Sign In">
        </form>

        <p><a href="SignUp.php">Sign Up</a><br></p>
        <p><a href="#">Forgot username or password</a></p>
    </div>
</body>
</html>
<?php ?>