<?php
session_start();
include 'connection.php';

// delete record
if(isset($_POST['delete_student'])){
    $student_id = $_POST['delete_student'];
    $query = "DELETE FROM student WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = 'Student Record deleted successfully.';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Student Not deleted.';
        $_SESSION['message_type'] = 'error';
        header("Location: index.php");
        exit(0);
    }

}

// update record
if(isset($_POST['update_student'])){

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "UPDATE student SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){

        $_SESSION['message'] = 'Student Details updated successfully.';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Student not updated successfully.';
        $_SESSION['message_type'] = 'error';
        header("Location: index.php");
        exit(0);
    }
}

// save student details
if (isset($_POST['save_student'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Check if email already exists in the database
    $existingEmailQuery = "SELECT * FROM student WHERE email = '$email'";
    $existingEmailResult = mysqli_query($conn, $existingEmailQuery);
    if (mysqli_num_rows($existingEmailResult) > 0) {
        $_SESSION['message'] = 'The student of this email already exist. Please choose another email.';
        $_SESSION['message_type'] = 'error';
        header("Location: index.php");
        exit(0);
    }

    // check if phone number already exists in the database
    $existingPhoneQuery = "SELECT * FROM student WHERE phone = '$phone'";
    $existingPhoneResult = mysqli_query($conn, $existingPhoneQuery);
    if(mysqli_num_rows($existingPhoneResult) > 0){
        $_SESSION['message'] = 'The student of this phone number already exist. Please choose another phone number.';
        $_SESSION['message_type'] = 'error';
        header("Location: index.php");
        exit(0);
    }

    // Insert new student record
    $sql = "INSERT INTO student (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = 'Student created successfully.';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Student not created successfully.';
        $_SESSION['message_type'] = 'error';
        header("Location: index.php");
        exit(0);
    }
}

mysqli_close($conn);
?>