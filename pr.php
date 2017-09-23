<!DOCTYPE html>
<html>
<head>
    <title> Posts and Railings Calculator </title>
</head>
<?php
require 'prfunctions.php';
?>

<body>
    <h1> Posts and Railings Calculator </h1>
    <p> This calculator can either: </p>
    <ul>
        <li> Work out how many posts and railings you would need to make a fence of a certain length. </li>
        <li> How long a fence would be if you used certain numbers of posts and railings. </li>
    </ul> <br/>


<form name="inputLength" method="POST">
    <b>What is the minimum length for your fence in metres?</b>
    <input name="minLength" type="number" min="1.7" value="1.7" step="0.1">
    <input name="getpr" type="submit" value="Calculate number of posts and railings"> <br/><br/>
</form>

    <?php
    if(isset($_POST['minLength'])) {
        echo producePRString($_POST['minLength']);
    }
    ?>

<h2>OR</h2>

<form name="inputpr" method="POST">
    <b>How many posts are you using?</b>
    <input name="posts" type="number" value="2" min="2">
    <b>How many railings are you using?</b>
    <input name="railings" type="number" value="1" min="1">
    <input name="getLength" type="submit" value="Calculate length of fence"> <br/>
    <i>Note: You will need at least 1 railing and 2 posts, and then a post for each further railing.</i> <br/><br/>
</form>

 <?php
    if(isset($_POST['posts']) && isset($_POST['railings'])) {
        echo produceLengthString($_POST['posts'], $_POST['railings']);
    }
    ?>

</body>

</html>