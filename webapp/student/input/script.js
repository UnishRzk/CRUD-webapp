function validateForm() {
    // Get all the required input fields
    var name = document.forms["inputForm"]["name"].value;
    var birthdate = document.forms["inputForm"]["birthdate"].value;
    var email = document.forms["inputForm"]["email"].value;
    var address = document.forms["inputForm"]["address"].value;

    // Check if any of the required fields are empty
    if (name == "" || birthdate == "" || email == "" || address == "") {
      alert("Please fill all the required fields.");
      return false; // Prevent form submission
    }
  }