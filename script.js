// Add Student validation in javascript
function validateForm(){
    var name = document.forms[0].name.value;
    var email = document.forms[0].email.value;
    var phone = document.forms[0].phone.value;
    var course = document.forms[0].course.value;
    var image = document.forms[0].image.value;

    // clear previous error messages
    document.getElementById('nameError').innerHTML = "";
    document.getElementById('emailError').innerHTML = "";
    document.getElementById('phoneError').innerHTML = "";
    document.getElementById('courseError').innerHTML = "";
    document.getElementById('imageError').innerHTML = "";

    // check validation

    // validate name field
    if(name.trim() === ""){
        document.getElementById('nameError').innerHTML = "Please enter the student's name.";
        return false;
    }

    // validate email field
    if(email.trim() === ""){
        document.getElementById('emailError').innerHTML = "Please enter the student's email.";
        return false;
    }

    else {

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!email.match(emailRegex)){
            document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
            return false;
        }
    }

    // validation phone field
    if(phone.trim() === ""){
        document.getElementById('phoneError').innerHTML = "Please enter the student's phone number.";
        return false;
    }

    //validation phone number length
    if(phone.length < 10 || phone.length > 12 ){
        document.getElementById('phoneError').innerHTML = "Phone number should be between 10 and 12 digits.";
        return false
    }

    // validation course field
    if(course.trim() === ""){
        document.getElementById('courseError').innerHTML = "Please enter the student's course name.";
        return false;
    }

    // validation image field
    if(image.trim() === ""){
        document.getElementById('imageError').innerHTML = "Please upload your image.";
        return false;
    }

    return true;

}

// Validation for Edit form
// Add Student validation in javascript

function validateEditForm() {
    var name = document.forms["editForm"]["name"].value;
    var email = document.forms["editForm"]["email"].value;
    var phone = document.forms["editForm"]["phone"].value;
    var course = document.forms["editForm"]["course"].value;
  
    // Clear previous error messages
    document.getElementById("editnameError").innerHTML = "";
    document.getElementById("editemailError").innerHTML = "";
    document.getElementById("editphoneError").innerHTML = "";
    document.getElementById("editcourseError").innerHTML = "";
  
    // Check validation
  
    // Validate name field
    if (name.trim() === "") {
      document.getElementById("editnameError").innerHTML = "Please enter the student's name.";
      return false;
    }
  
    // Validate email field
    if (email.trim() === "") {
      document.getElementById("editemailError").innerHTML = "Please enter the student's email.";
      return false;
    } else {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email.match(emailRegex)) {
        document.getElementById("editemailError").innerHTML = "Please enter a valid email address.";
        return false;
      }
    }
  
    // Validate phone field
    if (phone.trim() === "") {
      document.getElementById("editphoneError").innerHTML = "Please enter the student's phone number.";
      return false;
    }
  
    // Validation phone number length
    if (phone.length < 10 || phone.length > 12) {
      document.getElementById("editphoneError").innerHTML = "Phone number should be between 10 and 12 digits.";
      return false;
    }
  
    // Validate course field
    if (course.trim() === "") {
      document.getElementById("editcourseError").innerHTML = "Please enter the student's course name.";
      return false;
    }
  
    return true;
  }
  