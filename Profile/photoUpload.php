<?php
    include "../Components/header.php"
?>
<title>Photo Upload</title>
<link rel="stylesheet" href="../Asset/css/style.css">

<div class="photo">
    <fieldset>
        <legend>Create Photo</legend>
        <div class="content">
            <ul>
                <li style="width: 250px; text-align: center">Name:</li>
                <li style="width: 900px"><input type="text" name="name"></li>
                <li style="width: 250px; text-align: center">Tag: </li>
                <li style="width: 900px"><input type="text" name="tag"></li>
                <li style="width: 50px"><input type="submit" name="add" value="ADD"></li>
                <li style="width: 250px; text-align: center">Description: </li>
                <li style="width: 900px"><textarea name="tag"></textarea></li>
                <li style="width: 250px; text-align: center">Image: </li>
                <li style="width: 900px"><input type="file" name="image"></li>
                <li style="width: 150px"><input type="submit" name="add" value="CREATE" class="create"></li>
            </ul>
        </div>
    </fieldset>
</div>


<div class="photo">
    <h3>
        Username
    </h3>
    <h5 class="name">
        <i class="far fa-calendar-times"></i>
        Datetime
    </h5>
    <div class="content" style=" padding: 0">
        <ul style="padding: 0; margin: 0">
            <li style="margin: 0">
                <img src="../Asset/image/avatar">
            </li>
            <li style="width: 940px; padding: 0 20px">
                DESCRIPTION
            </li>
        </ul>
        <a class="link" href="/Profile/fixPhoto.php"><i class="fas fa-tools"></i></a>
    </div>
</div>

<?php
    include "../Components/footer.php"
?>

</body>
</html>