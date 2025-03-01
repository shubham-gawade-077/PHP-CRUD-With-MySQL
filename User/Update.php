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
    $que="SELECT *FROM `users` WHERE id='$id'";
    $st=$conn->prepare($que);
    $st->execute();
    $result=$st->fetchAll();
    $name=$result[0]['name'];
    $city=$result[0]['city'];
    $age=$result[0]['age'];
}
?>
<div class="container col-6">
    <h2><nav class="text-success">Edit Information  : </nav></h2><br>
</div>
 <div class="container col-6">
         <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Enter Name</label>
                <input type="text" class="form-control" value="<?php echo "$name"?>"name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Enter City</label>
                <input type="text" class="form-control"value="<?php echo "$city"?>"  name="city" id="city" requied>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Enter Age</label>
                <input type="text" class="form-control" value="<?php echo "$age"?>"name="age" id="age">
            </div>
            <button type="submit" class="btn btn-success" value="<?php  echo "$id"?>" name="update">Update data</button>
            <button type="submit" class="btn btn-primary" name="view">view</button>
            <button type="submit" class="btn btn-dark" name="home"><a href='./Index.php'>HOME</a></button>

        </form>
    </div>
    
<?php
    if(isset($_POST['update']))
    {
        $id=$_POST['update'];
        $name=$_POST['name'];
        $city=$_POST['city'];
        $age=$_POST['age'];
        $q="UPDATE `users` SET name='$name' ,city='$city', age='$age' WHERE id='$id'";
        $update=$conn->prepare($q);
        $update->execute();
        echo "<br><pre>";
     echo "               Data updated successfully!!!<br>";
    
    }
    if(isset($_POST['view']))
    {
        $que="SELECT *FROM `users`";
        $st=$conn->prepare($que);
        $st->execute();
        $result=$st->fetchAll();
        echo"<br>";
        echo"<table class='table table-striped table-bordered'>";
        echo "<tr><th>ID</th><th>NAME</th><th>CITY</th><th>AGE</th><th>ACTION</th><th>ACTION</th></tr>";

        foreach($result as $r)
        {
            echo "<tr>
            <td>".$r['id']."</td>
            <td>".$r['name']."</td>
            <td>".$r['city']."</td>
            <td>".$r['age']."</td>
            <td><a href='./Update.php? id=".$r['id']."'>Edit</a></td>
            <td><form method='post'><button type='submit' class='btn btn-danger' value=".$r['id']." name='delete'>DELETE</button></form></td>
            </tr>";
        }
        echo"</table>";
        }
    if(isset($_POST['delete']))
{
    $id=$_POST['delete'];
    $qu="DELETE FROM `users` where id='$id'";
    $st=$conn->prepare($qu);

    if($st->execute())
    {  
    
    $que="SELECT *FROM `users`";
    $st=$conn->prepare($que);
    $st->execute();
    $result=$st->fetchAll();
    echo"<br>";
    echo"<table class='table table-striped table-bordered'>";
    echo "<tr><th>ID</th><th>NAME</th><th>CITY</th><th>AGE</th><th>ACTION</th><th>ACTION</th></tr>";

    foreach($result as $r)
    {
        echo "<tr>
        <td>".$r['id']."</td>
        <td>".$r['name']."</td>
        <td>".$r['city']."</td>
        <td>".$r['age']."</td>
        <td><a href='./Update.php? id=".$r['id']."'>Edit</a></td>
        <td><form method='post'><button type='submit' class='btn btn-danger' value=".$r['id']." name='delete'>DELETE</button></form></td>
         </tr>";
    }
    echo"</table>";
}
}

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
