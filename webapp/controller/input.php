<!-- ============ RESPONSIBLE FOR ADDING RECORDS ============ -->

<?php
include "../config/config.php";

if (isset($_POST['newbutton'])) {
    $name = $_POST['name'];
    $tpnumber = $_POST['tpnumber'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];

    $update = $mysqli->prepare("INSERT INTO students(name, tpnumber, address, birthdate, email) values(?, ?, ?, ?, ?)");
    $update->bind_param("sssss", $name, $tpnumber, $address, $birthdate, $email);
    $result = $update->execute();
    if ($result) {
        header("location: ../student/input/?message=success");
    } else {
        header("location: ../student/input/?message=sqlfail");
    }
} else {
    header("location: ../student/input/?message=specifydata");
}
?>