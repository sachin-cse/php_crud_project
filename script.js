// Add Student validation in javascript
function validateForm(){
    var name = document.forms[0].name.value;
    var email = document.forms[0].email.value;
    var phone = document.forms[0].phone.value;
    var course = document.forms[0].course.value;

    // clear previous error messages
    document.getElementById('nameError').innerHTML = "";
    document.getElementById('emailError').innerHTML = "";
    document.getElementById('phoneError').innerHTML = "";
    document.getElementById('courseError').innerHTML = "";

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

    return true;

}