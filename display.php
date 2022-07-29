<?php require './partials/_db.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Display</title>
  </head>
  <body>
    <?php require './partials/_nav.php' ?>

    <div class="container my-2">
        <a href="/CRUD/create.php"><button class="btn btn-outline-primary">Add Data</button></a>
        <table class="table text-center mt-3">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Details</th>
                </tr>
            </thead>

            <?php

            $sql = "select * from `datas`";
            $result = mysqli_query($conn, $sql);
            

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['ID'];
                    $name = $row['Name'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile_No'];

                    echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td>
                                <a href="/CRUD/edit.php?edit='.$id.'"><button class="btn btn-warning mx-2">Edit</button></a>
                                <a href="/CRUD/delete.php?delete='.$id.'"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    ';
                }
            }

            ?>

            <tbody>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
