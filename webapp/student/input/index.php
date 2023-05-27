<!-- ======================= Add Student page =================== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Webpage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="input.css">

  <script src="script.js"></script>

</head>

<body>
  <div class="container">
    <div>

      <form method="POST" action="../../controller/input.php" name="inputForm" onsubmit="return validateForm()">

        <div class="contact-box">
          <div class="left"></div>
          <div class="right">
            <h2>Add Student</h2>
            <input type="text" class="field" placeholder="Enter Name" name="name">

            <input type="date" class="field" placeholder="Birthdate" name="birthdate">

            <input type="email" class="field" placeholder="Email" name="email">

            <input type="text" class="field" placeholder="Address" name="address">

            <input type="tel" class="field" placeholder="Phone Number (Eg: 977-0123456789)" name="tpnumber"
              pattern="[0-9]{3}-[0-9]{10}">

            <span class="note">Format: XXX-XXXXXXXXXX</span>

          </div>
          <a href="../" class="btn">Home</a>
          <button type="submit" class="btn" name="newbutton" value="submit">Submit</button>
        </div>

      </form>
      <?php
      if (isset($_GET['message'])) {
        if ($_GET['message'] == "success") {
          echo "<script>alert('Record Added')</script>";
        } else if ($_GET['message'] == "specifydata") {
          echo "<h4> EMPTY </h4>";
        } else {
          echo "<h4>Duplicate Entry </h4>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>