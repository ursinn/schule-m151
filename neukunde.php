<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $personalnummer = $_POST['personalnummer'];
    $gehalt = $_POST['gehalt'];
    $geburtstag = $_POST['geburtstag'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'schule');
    mysqli_query($con, "INSERT INTO `personen`(`name`, `vorname`, `personalnummer`, `gehalt`, `geburtstag`) VALUES ('$name', '$vorname', '$personalnummer', '$gehalt', '$geburtstag')");
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
<form action="neukunde.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="vorname">Vorname</label>
    <input type="text" name="vorname" id="vorname">
    <br>
    <label for="personalnummer">Personalnummer</label>
    <input type="number" name="personalnummer" id="personalnummer">
    <br>
    <label for="gehalt">Gehalt</label>
    <input type="number" name="gehalt" id="gehalt">
    <br>
    <label for="geburtstag">Geburtstag</label>
    <input type="date" name="geburtstag" id="geburtstag">
    <br>
    <input type="submit">
</form>
</body>
</html>