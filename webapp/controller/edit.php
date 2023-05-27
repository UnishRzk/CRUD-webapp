<!-- ============= RESPONSIBLE FOR THE EDITING OF THE RECORDS ============= -->

<?php

include "../config/config.php";

if (isset($_POST['editbutton'])) {
    // Variable Decleare Gareko
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tpnumber = $_POST['tpnumber'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];

    $update = $mysqli->prepare("UPDATE students SET name=?,tpnumber=?,address=?,birthdate=?,email=? where id =?");
    $update->bind_param("ssssss", $name, $tpnumber, $address, $birthdate, $email, $id);
    $result = $update->execute();
    if ($result) {
        // Update successful vayo vaney
        header("location: ../student/edit/?id=$id&message=success");
    } else {
        // update fail vayo vaney
        header("location: ../student/edit/?id=$id&message=sqlfail");
    }
} else {
    header("location: ../student/");
}

?>