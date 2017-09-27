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
    <p> You can use this calculator to work out: </p>
    <ul>
        <li> How many posts and railings you would need to make a fence of a certain length. </li>
        <li> How long a fence would be if you used certain numbers of posts and railings. </li>
    </ul>
    <br/>


<form name="inputLength" method="POST">
    <b>What is the minimum length (in metres) you would like your fence to be?</b>
    <input name="minLength" type="number" min="1.7" step="0.1" required>
    <input name="getPR" type="submit" value="Calculate numbers of posts and railings">
    <br/>
    <br/>
</form>

    <?php
    if(isset($_POST['minLength'])) {
        echo producePRString($_POST['minLength']);
    }
    ?>

<h2>OR</h2>

<form name="inputpr" method="POST">
    <b>How many posts would you like to use?</b>
    <input name="posts" type="number" min="2" step="1" required>
    <b>How many railings would you like to use?</b>
    <input name="railings" type="number" min="1" step="1" required>
    <input name="getLength" type="submit" value="Calculate length of fence">
    <br/>
    <i>Note: A fence must have at least 2 posts and 1 railing, and then a post for each further railing.</i>
    <br/>
    <br/>
</form>

 <?php
    if(isset($_POST['posts']) && isset($_POST['railings'])) {
        echo produceLengthString($_POST['posts'], $_POST['railings']);
    }
    ?>

</body>

</html>