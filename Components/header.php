<html>
<header>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</header>
<body>
<h1 class="h1">HOME PAGE</h1>

<h5 class="h5">PHOTOGRAPHY</h5>

<div class="menu">
    <ul>
        <li><a href="/">Home Page</a></li>
        <?php
        if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) {
            echo "<li><a href='/Profile/photoUpload.php'>Photo</a></li>";
            echo "<li><a href='../Login/logout.php'>Log out</a>";
        }
        else {
            echo "<li><a href='../Login/SignIn.php'>Sign In</a>";
            echo "<li><a href='../Login/SignUp.php'>Sign Up</a>";

        }
        ?>
        <li>
            <input type="text" name="search" value="search">
        </li>
    </ul>

</div>