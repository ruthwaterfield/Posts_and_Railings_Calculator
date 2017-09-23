<!DOCTYPE html>
<html>
<head>
    <title> Posts and Railings Calculator </title>
</head>
<?php
require 'prfunctions.php';
?>

<body>
<div class="titleBar">
    <h1>
        Posts and Railings Calculator
    </h1>
</div>
<form name="inputLength" action="pr.php" method="GET">
    What is the minimum length for your fence in metres?
    <input name="minLength" type="number" min="1.7" value="1.7" step="0.1" class="length">
    <input name="getpr" type="submit" value="Calculate number of posts and railings">
</form>

<div class="pr">
    <?php
    if(isset($_GET['minLength'])) {
        echo producePRString($_GET['minLength']);
    }
    ?>
</div>

<div class="divider">
    <h2>OR</h2>
</div>

<form name="inputpr" action="" method="GET">
    How many posts are you using?
    <input name="posts" type="number" value="2" min="2" class="posts">
    How many railings are you using?
    <input name="railings" type="number" value="1" min="1" class="railings">
    <input name="getLength" type="submit" value="Calculate length of fence"> <br/>
    Note: you will need at least 1 railing and 2 posts, then a post for each further railing.
</form>

<div class="length">
    <?php
    if(isset($_GET['posts']) && isset($_GET['railings'])) {
        echo produceLengthString($_GET['posts'], $_GET['railings']);
    }
    ?>
</div>

</body>

</html>