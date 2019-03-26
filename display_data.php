<?php
session_start();

if(!isset($_SESSION['loggedIN']))
{
 header("Location: login.html");
}

include_once 'dbconfig.php';

$rows= array();
$stmt = $db_con->prepare("SELECT * FROM users WHERE email=:email");
$stmt->execute(array(":email"=>$_SESSION['email']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$data = array($row['name'], $row['email'], $row['gender'], $row['college'], $row['degree'], $row['rollno']);
echo "Profile -  ";
echo "<br>";
echo "'Name' 'Email' 'Gender' 'College'  'Degree' 'Rollno'";
echo "<br>";
echo "<br>";
echo json_encode($data);
echo "<br>";
?>
<body background="images/bgimage.jpg"><br>
<a href="after_log.html"> Go Back </a>
</body>

