<?php  require './partials/_db.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
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
        <h1>Update Data</h1>
        <hr>
    <?php
        

        if(isset($_GET['edit'])){
            $id = $_GET['edit'];
            // echo $id;

            
            $sql = "select * from `datas` where ID = '$id'";
            $result = mysqli_query($conn, $sql);
    
    
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['ID'];
                    $name = $row['Name'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile_No'];
    
                    echo '
                    <form action="/CRUD/edit.php?edit='.$id.'" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="number" value="'.$id.'" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" value="'.$name.'" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="'.$email.'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile No</label>
                            <input type="number" name="number" value="'.$mobile.'" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    ';
                }
            }    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
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
                    $sql = "UPDATE `datas` set ID = '$id', Name = '$name', Email = '$email', Mobile_No = '$mobile' where id=$id"; 
                
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
    }



    ?>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
