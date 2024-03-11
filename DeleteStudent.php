<?php
include('C:\wamp64\www\Student registration\Config\Constants.php');
$SITEURL = 'http://localhost/Student%20registration/';

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql= "DELETE FROM stdetails WHERE StudentNo=$id;";

$res=mysqli_query($conn,$sql);
 if($res==true){
   
    $_SESSION['delete']="<b><p style='color:green'>User Deleted Successfully</p></b>";
    header('location:' . $SITEURL . 'registeredStudent.php');
 } 
 }
else
{

}
?>