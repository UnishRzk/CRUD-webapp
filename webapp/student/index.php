<!-- ====================== MAIN PAGE ======================= -->

<!DOCTYPE html>
<html>

<head>
  <title>Student Vault | Home | Unish Rajak</title>
  <link rel="stylesheet" href="mainpage.css">

</head>

<body>

  <div class="filter">
  </div>

  <div class="wrapper">
    <div class="typing-demo">
      Student Record Management System
    </div>
  </div>

  <div>
    <a href="../login.php" class="button button3">Log out</a>
    <a href="input/index.php"> <button class="button button4"> Add new student </button></a>
  </div>

  <table>
    <!-- HEADER -->
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Birth Date</th>
      <th>Email</th>
      <th>Address</th>
      <th>Phone Number</th>
      <th>Actions </th>
    </tr>

    <!-- ISI -->
    <?php
    require "../config/config.php";

    $retrieve = $mysqli->prepare("SELECT id, name, tpnumber, address, birthdate, email FROM students");
    $retrieve->execute();
    $retrieve->store_result();
    $retrieve->bind_result($id, $name, $tpnumber, $address, $birthdate, $email);

    if ($retrieve->num_rows > 0) {
      while ($row = $retrieve->fetch()) {


        ?>
        <tr>
          <td>
            <?php echo $id; ?>
          </td>
          <td>
            <?php echo $name; ?>
          </td>
          <td>
            <?php echo $birthdate; ?>
          </td>
          <td>
            <?php echo $email; ?>
          </td>
          <td>
            <?php echo $address; ?>
          </td>
          <td>
            +
            <?php echo $tpnumber; ?>
          </td>
          <td>
            <a href="../controller/remove.php?id=<?php echo $id; ?>"> <button class="button button1"> Remove
              </button></a>
            <a href="edit/?id=<?php echo $id; ?>"> <button class="button button2"> Edit </button></a>
          </td>
        </tr>
        <p class="khali">
        <?php }
    } else {
      echo '<h4 style="margin-left:120px">EMPTY</h4>';
    }
    ?>
    </p>
  </table>



  <?php
  if (isset($_GET['message'])) {
    if ($_GET['message'] == "deleted") {
      echo "<script>alert('Record Removed')</script>";
    } else {
      echo "<h4>Delete Error</h4>";
    }
  }
  ?>
  </div>

</body>

</html>