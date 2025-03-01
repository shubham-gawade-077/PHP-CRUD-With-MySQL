<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <br>
<div class="container col-6">
    <h2><nav class="text-success">This is Student's Information Form : </nav></h2><br>
</div>
<div class="container col-6">
        <form method="post" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Enter Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Enter Age</label>
                <input type="text" class="form-control" name="age" id="age">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Enter City</label>
                <input type="text" class="form-control" name="city" id="city" requied>
            </div>
            <div class="mb-3">
                <label for="marks" class="form-label">Enter Marks</label>
                <input type="text" class="form-control" name="marks" id="marks" requied>
            </div>
           
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <button type="submit" class="btn btn-dark" name="view"><a class="text-light text-decoration-none"href='./View.php'>VIEW</a></button>
        </form>
    </div>
<?php
include("./Config.php");
class Student 
{
    
public $DBname;

function __construct($conn)
{
    $this->DBname=$conn;
}

function insert()
{
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $age=$_POST['age'];
        $city=$_POST['city'];
        $marks=$_POST['marks'];

    $query="insert into students(`id`,`name`,`age`,`city`,`marks`)
    values(null,'$name','$age','$city','$marks')";
    $stmt=$this->DBname->prepare($query);
    $stmt->execute();
    echo "<br><pre>";
    echo "               Data inserted successfully!!!<br>";
    }
}

}
$data=new Student($conn);
$data->insert();


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
