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

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $CompanyName = $_POST['CompanyName'];
    $ContactName = $_POST['ContactName'];
    $ContactTitle = $_POST['ContactTitle'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Region = $_POST['Region'];
    $PostalCode = $_POST['PostalCode'];
    $Country = $_POST['Country'];
    $Phone = $_POST['Phone'];
    $Fax = $_POST['Fax'];
    $HomePage = $_POST['HomePage'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'suppliers');
    mysqli_query($con, "UPDATE `suppliers` SET `CompanyName` = '$CompanyName', `ContactName` = '$ContactName', `ContactTitle` = '$ContactTitle', `Address` = '$Address', `City` = '$City', `Region` = '$Region', 'PostalCode' = '$PostalCode', 'Country' = '$Country', 'Phone' = '$Phone', 'Fax' = '$Fax', 'HomePage' = '$HomePage');");
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
<form action="suppliers_add.php" method="post">
    <label for="id">Id</label>
    <input type="number" name="id" id="id">
    <br>
    <label for="CompanyName">CompanyName</label>
    <input type="text" name="CompanyName" id="CompanyName">
    <br>
    <label for="ContactName">ContactName</label>
    <input type="text" name="ContactName" id="ContactName">
    <br>
    <label for="ContactTitle">ContactTitle</label>
    <input type="text" name="ContactTitle" id="ContactTitle">
    <br>
    <label for="Address">Address</label>
    <input type="text" name="Address" id="Address">
    <br>
    <label for="City">City</label>
    <input type="text" name="City" id="City">
    <br>
    <label for="Region">Region</label>
    <input type="text" name="Region" id="Region">
    <br>
    <label for="PostalCode">PostalCode</label>
    <input type="text" name="PostalCode" id="PostalCode">
    <br>
    <label for="Country">Country</label>
    <input type="text" name="Country" id="Country">
    <br>
    <label for="Phone">Phone</label>
    <input type="text" name="Phone" id="Phone">
    <br>
    <label for="Fax">Fax</label>
    <input type="text" name="Fax" id="Fax">
    <br>
    <label for="HomePage">HomePage</label>
    <input type="text" name="HomePage" id="HomePage">
    <br>
    <input type="submit">
</form>
</body>
</html>
