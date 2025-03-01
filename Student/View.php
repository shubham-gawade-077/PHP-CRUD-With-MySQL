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
    <h2><nav class="text-success">This is Student's Information  : </nav></h2><br>
</div>
<?php
include("./Config.php");
class View 
{
    public $DBname;
    function __construct($conn)
    {
        $this->DBname=$conn;
    }
    function view()
    {
        $query="select * from students";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        // echo "<pre>";
        // print_r($result);
        echo "<table class=' table table-striped table-bordered col-4'> ";
        echo "<tr><th>ID</th><th>NAME</th><th>AGE</th><th>CITY</th><th>MARKS</th><th>ACTION</th><th>ACTION</th></tr>";
       foreach($result as $r)
       {
        echo "<tr>";
        echo("<td>$r[id]</td>");
        echo("<td>$r[name]</td>");
        echo("<td>$r[age]</td>");
        echo("<td>$r[city]</td>");
        echo("<td>$r[marks]</td>");
        echo"<td><form method='post'><button type='submit' class='btn btn-warning'>
        <a class='text-dark text-decoration-none'href='./Update.php? id=".$r['id']."'>Edit</a></button></form></td>";

        echo"<td><form method='post'><button type='submit' class='btn btn-danger' name='delete' >
        <a class='text-light text-decoration-none'href='./Delete.php? id=".$r['id']."'>delete</a></button></form></td>";
        
        echo "</tr>";
       }
    
        echo "</table>";
        
}
}
$a=new View($conn);
$a->view();
?>
 <form method="post" action="">
    
 <button type="submit" class="btn btn-dark" name="home"><a class="text-light text-decoration-none" href='./Index.php'>HOME</a></button>

 </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
