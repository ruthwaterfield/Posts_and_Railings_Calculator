<!DOCTYPE html>
<html>
<header>
    <title> Posts and Railings Calculator </title>
</header>
<?php
require 'prfunctions.php';
?>

<body>
<div class="titleBar">
    <h1>
        Posts and Railings Calculator
    </h1>
</div>
<form name="inputLength" action="" method="GET">
    What is the minimum length for your fence in metres?
    <input name="minLength" type="number" value="1.7" min="1.7" class="length">
    <input name="getpr" type="submit" value="Calculate number of posts and railings">
</form>

<h3> You will need: </h3>
<div class="pr">
    <?php
    $postsAndRailings = determinePostsAndRailings($_GET['minLength']);
    echo $postsAndRailings[0] . 'Posts <br>';
    echo $postsAndRailings[1] . 'Railings';
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
    Note: you will need at least 1 railing and 2 posts, then a post for each further railing.
    <input name="getLength" type="submit" value="Calculate length of fence">
</form>

<h3> Your fence will be: </h3>
<div class="length">
    <?php
    echo calculateLength($_GET('posts'), $_GET('railings')) . 'metres long';
    ?>
</div>

</body>

</html>