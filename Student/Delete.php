<?php
include("./Config.php");
class Delete 
{
    public $DBname;
    function __construct($conn)
    {
        $this->DBname=$conn;
    }
function delete()
{
  if(isset($_GET['id']))
    {
        
     $id=$_GET['id'];
    $q="DELETE FROM `students` WHERE id='$id'";
    $s=$this->DBname->prepare($q);
    if($s->execute())
    {
      header('location:View.php');
    }
    }
  }

}
$a=new Delete($conn);
$a->delete();
?>