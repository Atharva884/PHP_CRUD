<?php

$showSuccessAlert = false;
$showErrorAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include './partials/_db.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['number'];

    // Check if email Already Exist...
    $emailSql = "SELECT * FROM datas where Email = '$email'";

    $result = mysqli_query($conn, $emailSql);
    $num = mysqli_num_rows($result);

    
        if($num == 1){
            $showErrorAlert = true;
            $mess = "Email Already Exist";
        }else{
            $sql = "INSERT INTO `datas` (`Name`, `Email`, `Mobile_No`) VALUES ('$name', '$email', '$mobile')";
        
            $result = mysqli_query($conn, $sql);
        
            if($result){
                $showSuccessAlert = true;
                $mess = "Added Data Successfully";
                header("location: display.php");
            }else{
                $showErrorAlert = true;
                $mess = "An Error Occurred";
            }
        }
    }



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>
  </head>
  <body>
    <?php require './partials/_nav.php' ?>

    <div class="container mt-3">

        <?php

        if($showSuccessAlert){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success </strong>'.$mess.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }

        ?>

        <?php

        if($showErrorAlert){
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error </strong>'.$mess.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }

        ?>
        <h1>Add Data</h1>
        <hr>
        <form action="/CRUD/create.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mobile No</label>
                <input type="number" name="number" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
