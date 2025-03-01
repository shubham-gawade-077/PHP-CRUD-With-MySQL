<?php
include_once("./Config.php");
class Demo 
{
    public $DBname;
    function __construct($conn)
    {
        $this->DBname=$conn;
    }
    // insert and view
    function insert()
    {
        $query="insert into users (`id`,`name`,`age`,`city`)values
                (null,'Sunil',26,'Mumbai')";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();   
        echo "inserted successfully<br>";
//////////////////////////////////////////////////////
        $query="select * from users";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        // echo "<pre>";
        // print_r($result);
        echo "<table border=1 cellpadding='10' cellspacing='0'> ";
        echo "<tr><td>ID</td><td>NAME</td><td>AGE</td><td>CITY</td></tr>";
       foreach($result as $r)
       {
        echo "<tr>";
        echo("<td>$r[id]</td>");
        echo("<td>$r[name]</td>");
        echo("<td>$r[age]</td>");
        echo("<td>$r[city]</td>");
        echo "</tr>";
       }
    
        echo "</table>";
    }
    // update and view-
    function update()
    {
        $query="update users set name='Ram',age=20,city='delhi' where id=3";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        echo "updated successfully<br>";

        //////////////////////////////////////////

        
    
        $query="select * from users";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        // echo "<pre>";
        // print_r($result);
        echo "<table border=1 cellpadding='10' cellspacing='0'> ";
        echo "<tr><td>ID</td><td>NAME</td><td>AGE</td><td>CITY</td></tr>";
       foreach($result as $r)
       {
        echo "<tr>";
        echo("<td>$r[id]</td>");
        echo("<td>$r[name]</td>");
        echo("<td>$r[age]</td>");
        echo("<td>$r[city]</td>");
        echo "</tr>";
       }
    
        echo "</table>";
    
    
    }
    // delete and view-
    function delete()
    {
        $query="delete from users where id=1";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        echo "Deleted successfully<br>";
        ////////////////////////////////////////
        $query="select * from users";
        $stmt=$this->DBname->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        // echo "<pre>";
        // print_r($result);
        echo "<table border=1 cellpadding='10' cellspacing='0'> ";
        echo "<tr><td>ID</td><td>NAME</td><td>AGE</td><td>CITY</td></tr>";
       foreach($result as $r)
       {
        echo "<tr>";
        echo("<td>$r[id]</td>");
        echo("<td>$r[name]</td>");
        echo("<td>$r[age]</td>");
        echo("<td>$r[city]</td>");
        echo "</tr>";
       }
    
        echo "</table>";
    
    
    }
}
$demo=new Demo($conn);
// $demo->insert();
// $demo->update();
$demo->delete();
?>