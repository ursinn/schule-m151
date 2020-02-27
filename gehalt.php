<?php
if (isset($_POST['min'])) {
    $min = $_POST['min'];
    $max = $_POST['max'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'schule');
    $res = mysqli_query($con, "SELECT * FROM `personen` WHERE `gehalt` BETWEEN '$min' AND '$max'");
    while ($data = mysqli_fetch_assoc($res)) {
        echo $data["name"] . ", "
            . $data["vorname"] . ", "
            . $data["personalnummer"] . ", "
            . $data["gehalt"] . ", "
            . $data["geburtstag"] . "<br>";
    }
    mysqli_close($con);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="gehalt.php" method="post">
    <label for="min">Min</label>
    <input type="number" name="min" id="min">
    <br>
    <label for="max">Max</label>
    <input type="number" name="max" id="max">
    <br>
    <input type="submit">
</form>
</body>
</html>
