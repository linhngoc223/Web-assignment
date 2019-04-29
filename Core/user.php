<?php
//require "../Database/config.php";

class User{
    public $db;

    public function __construct()
    {
        define('SERVER', 'localhost');
        define('PASSWORD', 'Rinkute_98');
        define('DATABASE', 'ss2');
        define('USERNAME', 'linh');

        $this->db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    function Error($password,$repassword){
        /**
         * Check error
         */
        if (strlen($password) < 6 || strlen($repassword) < 6)
        {
            $passError = "* Your password must be have at least 6 character";
        }

        if ($password != $repassword) {
            $passError = "* Two passwords must be the same";
        }

    }

    public function getSignUp($username,$password, $email)
    {
        $password = md5($password);

        $checkemail = 'SELECT * FROM users WHERE email = "' . $email . '"';
        $checkusername = 'SELECT * FROM users WHERE username = "' . $username . '"';

        //Checking if username or email is available in database
        $check = $this->db->query($checkemail);
        $count_row = $check->num_rows;
        $checkus = $this->db->query($checkusername);
        $count = $checkus->num_rows;
        //if the username is not in database then insert the table
        if ($count_row == 0 && $count == 0) {
            $sqlInsertDB = 'INSERT INTO users SET email="' . strtolower($email) . '", password = "'
                . strtolower($password) . '",username= "' . $username. '";';
            mysqli_query($this->db, $sqlInsertDB);

            return false;
        } else {
            return true;
        }
    }

    /**
     *
     */
    public function signUp()
    {
        //Checking for user login or not
        if (isset($_REQUEST['signup'])) {

            $password = $_POST["password"];

            $username = $_POST['username'];

            $email = $_POST["email"];


            //Checking for user login or not
            $signUp = $this->getSignUp($username, $password, $email);

            if ($signUp) {
                $success = 'Sign in successful';
                echo "<p><span class='error'>" . $success . "</span></p><br>";
            } else {
                // Registration Failed
                $fail = 'Sign in failed. Account already exits, please try again.';
                echo "<p><span class='error'>" . $fail . "</span></p><br>";
            };
        }
    }

    public function checkLogin($email, $password)
    {

        $password = md5($password);
        $checklogin = 'SELECT * FROM users WHERE email="'.strtolower($email) .'"AND password="'.strtolower($password).'"';

        $result = mysqli_query($this->db, $checklogin);
        $userData = mysqli_fetch_array($result);
        $countRow = $result->num_rows;

        if ($countRow === 1) {
            //this login var will use for the session thing
            $_SESSION["login"] = true;
            $_SESSION["id"] = $userData["id"];
            $_SESSION['type']= $userData["type"];
            return true;
        } else {
            return false;
        }
    }

    public function login() {
        if (isset($_REQUEST['signin'])) {
            $email = $_POST['email'];

            $password = $_POST["password"];

            $login = $this->checkLogin($email, $password);
            if ($login) {
                //registration success
                header("location:/User/index.php");
            } else {
                $error = "Your username or password wrong!";
                echo "<p><span class='error'>" . $error . "</span></p><br>";
            }
        }
    }



    /**Starting session*/
    public function get_session() {
        return $_SESSION["login"];
    }

    /**For logout process*/
    public function  get_logout() {
        $_SESSION["login"] = false;
        session_destroy();
    }
}
?>