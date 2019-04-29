
<html>
<header>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="../Asset/css/Au.css">
</header>
<body>
<?php
session_start();

include "../Core/validate.php";
include "../Core/user.php";
include "../Database/config.php";

$user = new User();

if(isset($_POST["signup"])) {

    $email = $_POST['email'];

    $password = $_POST["password"];

    $repassword = $_POST["password-re"];

    $username = $_POST['username'];

    $user->getSignUp($email, $username, $password);
}

?>

    <div class="signup">
        <h2>
            Sign Up
        </h2>
        <h5>Welcome to Sign Up page</h5>
        <?php
        if(isset($passError))
            echo "<p><span class='error'>".$passError ."</span></p><br>";
        $user-> signUp();
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">

            Email:<br>
            <input type="email" name="email" placeholder="Please enter your email" required>

            Password: <br>
            <input type="password" name="password" placeholder="Enter your password" required><br>


            Password (re-enter):<br>
            <input type="password" name="password-re" placeholder="Enter your password again"required><br>

            Username:<br>
            <input type="text" name="username" placeholder="Enter your username"required><br>

            <input type="submit" name="signup" value="Sign Up">

            <p><a href="SignIn.php" style="background: white">Sign in</a><br></p>
        </form>
    </div>

</body>
</html>

