
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
include("./Config.php");

    if(isset($_GET['id']))
    {
    $id=$_GET['id']; 
    $que=" SELECT * FROM `students` WHERE `id`='$id'";
    $st=$conn->prepare($que);
    $st->execute();
    $result=$st->fetchAll();
    $name=$result[0]['name'];
    $age=$result[0]['age'];
    $city=$result[0]['city'];
    $marks=$result[0]['marks'];
    }
  

    ?>
    <br>
<div class="container col-6">
    <h2><nav class="text-success">Edit  Student's Information  : </nav></h2><br>
</div>
<div class="container col-6">
        <form method="post" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Enter Name</label>
                <input type="text" class="form-control" 
                value="<?php echo "$name"?>" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Enter Age</label>
                 <input type="text" class="form-control" 
                 value="<?php echo "$age"?>" name="age" id="age">
                 </div>
            <div class="mb-3">
                <label for="city" class="form-label">Enter City</label>
                 <input type="text" class="form-control" 
                 value="<?php  echo "$city"?>"  name="city" id="city" >
            </div>
            <div class="mb-3">
                <label for="marks" class="form-label">Enter Marks</label>
                 <input type="text" class="form-control"
                 value="<?php  echo "$marks"?>" name="marks" id="marks" >
             </div>
            <button type="submit" class="btn btn-success" 
            value="<?php echo "$id"?>" name="update">Update data</button>
           

         </form>
    </div>

    <?php

    if(isset($_POST['update']))
    {
        $id=$_POST['update'];
        $name=$_POST['name'];
        $age=$_POST['age'];
        $city=$_POST['city'];
        $marks=$_POST['marks'];
        $q=" UPDATE `students` SET name ='$name',`age`='$age', `city`='$city', `marks`='$marks' WHERE `id`='$id'";
        $update=$conn->prepare($q);
        if($update->execute())
         {
             header('location:View.php');
         }
      
    
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>


