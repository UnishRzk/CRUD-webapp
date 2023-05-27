<!-- =================== Edit student page ================== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Student Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="edit.css">
</head>

<body>
  <div>
    <div class="container">

      <?php
      if (isset($_GET['id'])) {

        require "../../config/config.php";
        $id = $_GET['id'];
        $retrieve = $mysqli->prepare("SELECT name, tpnumber, address, birthdate, email FROM students WHERE id=?");
        $retrieve->bind_param("s", $id);
        $retrieve->execute();
        $retrieve->store_result();
        $retrieve->bind_result($name, $tpnumber, $address, $birthdate, $email);

        // rest of the code
      
        if ($retrieve->num_rows == 1) {
          while ($row = $retrieve->fetch()) {

            ?>

            <form method="POST" action="../../controller/edit.php">
              <div class="contact-box">
                <div class="left"></div>
                <div class="right">
                  <h2>Edit Student</h2>

                  <input type="text" class="field" value=<?php echo $id; ?> name="id" readonly>

                  <input type="text" class="field" placeholder="Enter Name" value="<?php echo $name; ?>" name="name" required
                    on invalid="this.setCustomValidity('Enter your Name')" on input="this.setCustomValidity('')">

                  <input type="date" class="field" placeholder="Birth date" value="<?php echo $birthdate; ?>" name="birthdate"
                    required on invalid="this.setCustomValidity('Enter your Birth Date')" on
                    input="this.setCustomValidity('')">

                  <input type="email" class="field" placeholder="Email" value="<?php echo $email; ?>" name="email" required on
                    invalid="this.setCustomValidity('Enter your Email')" on input="this.setCustomValidity('')">

                  <input type="text" class="field" placeholder="Address" value="<?php echo $address; ?>" name="address"
                    required on invalid="this.setCustomValidity('Enter your Address')" on input="this.setCustomValidity('')">

                  <input type="tel" class="field" placeholder="Phone Number (Eg: 977-0123456789)" value=<?php echo $tpnumber; ?> name="tpnumber" required on invalid="this.setCustomValidity('Enter your Phone number')" on
                    input="this.setCustomValidity('')">
                  <span class="note">Format: XXX-XXXXXXXXXX</span>
                </div>
                <a href="../" class="btn">Home</a>
                <button type="submit" class="btn" name="editbutton" value="submit">Submit</button>
              </div>
            </form>
          </div>

        <?php }
        }
      } ?>
    <?php
    if (isset($_GET['message'])) {
      if ($_GET['message'] == "success") {
        echo "<script>alert('Record Edited')</script>";
      } else if ($_GET['message'] == "specifydata") {
        echo "<h4> EMPTY </h4>";
      } else {
        echo "<h4>Duplicate Name</h4>";
      }
    }
    ?>
  </div>
  </div>
</body>

</html>