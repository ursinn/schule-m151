<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'schule');
$res = mysqli_query($con, 'SELECT * FROM personen');
$num = mysqli_num_rows($res);
echo $num . "<br>";

if ($num > 0)
    echo "Ergebnis:<br>";
else
    echo "keine Ergebnisse!<br>";

while ($data = mysqli_fetch_assoc($res)) {
    echo $data["name"] . ", "
        . $data["vorname"] . ", "
        . $data["personalnummer"] . ", "
        . $data["gehalt"] . ", "
        . $data["geburtstag"] . "<br>";
}
mysqli_close($con);