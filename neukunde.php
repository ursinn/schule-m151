<?php
/**
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org>
 */

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