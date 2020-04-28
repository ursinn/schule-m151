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

if (isset($_POST['login'])) {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'schule');

    $name = htmlentities(htmlspecialchars($_POST['name']));
    $name = mysqli_real_escape_string($con, $name);
    $password = htmlentities(htmlspecialchars($_POST['password']));
    $password = mysqli_real_escape_string($con, $password);

    if (!empty($name) && !empty($password)) {
        $hash = "";
        $res = mysqli_query($con, "SELECT password FROM `login` WHERE `name` = '$name'");
        $num = mysqli_num_rows($res);
        if ($num > 0) {
            $data = mysqli_fetch_assoc($res);
            $hash = $data['password'];
        }

        $ok = password_verify($password, $hash);

        if ($ok)
            echo "Sie sind eingeloggt";
        else
            echo "Name oder Passwort ist falsch!";
    } else
        echo "Login Error";
    mysqli_close($con);
}

if (isset($_POST['register'])) {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'schule');

    $name = htmlentities(htmlspecialchars($_POST['name']));
    $name = mysqli_real_escape_string($con, $name);
    $password = htmlentities(htmlspecialchars($_POST['password']));
    $password = mysqli_real_escape_string($con, $password);
    $credit = htmlentities(htmlspecialchars($_POST['credit']));
    $credit = mysqli_real_escape_string($con, $credit);

    if (!empty($name) && !empty($password) && !empty($credit)) {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        mysqli_query($con, "INSERT INTO `login`(`name`, `password`, `credit`) VALUES ('$name', '$hash', '$credit')");
        echo "User Registered";
    } else
        echo "Reg Error";
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
    <form action="password.php" method="post">
        <h1>Register oder Login</h1>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <br>
        <label for="credit">Kreditkarte</label>
        <input type="text" id="credit" name="credit">
        <br>
        <input type="submit" name="login" value="Login">
        <input type="submit" name="register" value="Register">
        <input type="reset">
    </form>
</body>
</html>
