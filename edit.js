// Add Student validation in javascript
function validateEditForm(){
    var name = document.forms[1].name.value;
    var email = document.forms[1].email.value;
    var phone = document.forms[1].phone.value;
    var course = document.forms[1].course.value;

    // clear previous error messages
    document.getElementById('editnameError').innerHTML = "";
    document.getElementById('editemailError').innerHTML = "";
    document.getElementById('editphoneError').innerHTML = "";
    document.getElementById('editcourseError').innerHTML = "";

    // check validation

    // validate name field
    if(name.trim() === ""){
        document.getElementById('editnameError').innerHTML = "Please enter the student's name.";
        return false;
    }

    // validate email field
    if(email.trim() === ""){
        document.getElementById('editemailError').innerHTML = "Please enter the student's email.";
        return false;
    }

    else {

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!email.match(emailRegex)){
            document.getElementById("editemailError").innerHTML = "Please enter a valid email address.";
            return false;
        }
    }

    // validation phone field
    if(phone.trim() === ""){
        document.getElementById('editphoneError').innerHTML = "Please enter the student's phone number.";
        return false;
    }

    //validation phone number length
    if(phone.length < 10 || phone.length > 12 ){
        document.getElementById('editphoneError').innerHTML = "Phone number should be between 10 and 12 digits.";
        return false
    }

    // validation course field
    if(course.trim() === ""){
        document.getElementById('editcourseError').innerHTML = "Please enter the student's course name.";
        return false;
    }

    return true;

}