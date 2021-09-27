<?php
$mysqli = new mysqli('localhost', 'root', '', 'daftar_jumaat') or die(mysqli_error($mysqli));


if (isset($_POST['update'])) {
    $phone = $_POST['phone'];
    $fname = $_POST['name'];
    // $lname = $_POST['lname'];
    // $role = $_POST['role'];

    $sql = "UPDATE users SET name='$name', phone='$phone' WHERE phone LIKE $phone";

$res = $mysqli->query($sql) or die($mysqli->error);

    $_SESSION['msg'] = "Record has been updated!";

    if ($res) {
        return 'data updated';
    }
}
?>