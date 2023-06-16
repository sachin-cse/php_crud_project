<?php
session_start();
include 'connection.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="script.js"></script>
    <script src="edit.js"></script>

    <title>Student Table</title>

    <!-- for error style -->
    <style>
    .error {
        color: red;
        font-size: 0.8rem;
    }
    </style>
    <!-- end for error style -->

</head>

<body>

    <div class="container mt-5">

        <?php include 'message.php'; ?>

        <!-- Add Student -->

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="save_data.php" method="post" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label>Student Name</label>
                                <input type="text" name="name" class="form-control">
                                <span id="nameError" class="error"></span>
                            </div>

                            <div class="mb-3">
                                <label>Student Email</label>
                                <input type="text" name="email" class="form-control">
                                <span id="emailError" class="error"></span>
                            </div>

                            <div class="mb-3">
                                <label>Student Contact</label>
                                <input type="text" name="phone" class="form-control">
                                <span id="phoneError" class="error"></span>
                            </div>

                            <div class="mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" class="form-control">
                                <span id="courseError" class="error"></span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- end Add Student -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add Student</a>
                        </h4>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Student Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $limit = 3;
                                $totalPages=0;
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                } else {
                                    $page=1;
                                }
                                $offset = ($page-1) * $limit;
                $query = "SELECT * FROM student LIMIT {$offset}, {$limit}";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run)>0){

                  foreach($query_run as $student){
                    ?>
                                <tr>
                                    <td><?= $student['id']; ?></td>
                                    <td><?= $student['name']; ?></td>
                                    <td><?= $student['email']; ?></td>
                                    <td><?= $student['phone']; ?></td>
                                    <td><?= $student['course']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewModal<?= $student['id']; ?>">View</a>
                                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal<?= $student['id']; ?>">Edit</a>


                                        <form action="save_data.php" method="post" class="d-inline">
                                            <button type="submit" name="delete_student" value="<?= $student['id']; ?>"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- view model -->

                                <div class="modal fade" id="viewModal<?= $student['id']; ?>" tabindex="-1"
                                    aria-labelledby="viewModalLabel<?= $student['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel<?= $student['id']; ?>">View
                                                    Student Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>ID</label>
                                                    <input type="text" name="student_id" value="<?= $student['id']; ?>"
                                                        class="form-control" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Student Name</label>
                                                    <input type="text" name="name" value="<?= $student['name']; ?>"
                                                        class="form-control" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Student Email</label>
                                                    <input type="email" name="email" value="<?= $student['email']; ?>"
                                                        class="form-control" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Student Contact</label>
                                                    <input type="text" name="phone" value="<?= $student['phone']; ?>"
                                                        class="form-control" minlength="10" maxlength="12" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Student Course</label>
                                                    <input type="text" name="course" value="<?= $student['course']; ?>"
                                                        class="form-control" readonly>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- view model end -->

                                <!-- edit model -->

                                <div class="modal fade" id="editModal<?= $student['id']; ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel<?= $student['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?= $student['id']; ?>">Edit
                                                    Student Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="save_data.php" method="post" onsubmit="return validateEditForm()">

                                                    <div class="mb-3">
                                                        <label>ID</label>
                                                        <input type="text" name="student_id"
                                                            value="<?= $student['id']; ?>" class="form-control"
                                                            readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Student Name</label>
                                                        <input type="text" name="name" value="<?= $student['name']; ?>"
                                                            class="form-control">
                                                        <span id="editnameError" class="error"></span>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Student Email</label>
                                                        <input type="email" name="email"
                                                            value="<?= $student['email']; ?>" class="form-control">
                                                        <span id="editemailError" class="error"></span>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Student Contact</label>
                                                        <input type="text" name="phone"
                                                            value="<?= $student['phone']; ?>" class="form-control">
                                                        <span id="editphoneError" class="error"></span>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Student Course</label>
                                                        <input type="text" name="course"
                                                            value="<?= $student['course']; ?>" class="form-control">
                                                        <span id="editcourseError" class="error"></span>

                                                    </div>

                                                    <div class="mb-3">
                                                        <button type="submit" name="update_student"
                                                            class="btn btn-primary">Update Student</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end edit details -->
                                <?php
                  }

                  $sql1 = "SELECT * FROM student";
                  $result1 = mysqli_query($conn, $sql1);

                  if(mysqli_num_rows($result1) > 0){
                    $total_records = mysqli_num_rows($result1);
                    $totalPages = ceil($total_records / $limit);
                  }

                } else {
                  echo "<h5>No Record Found</h5>";
                }
                ?>
                            </tbody>
                        </table>

                        <!-- pagination code  -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="...">
                                <ul class="pagination pagination-sm">
                                    <?php
                                
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="page-item' . ($page == $i ? ' active' : '') . '">';
                                    echo '<a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a>';
                                    echo '</li>';
                                }
                                ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- end pagination -->

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>