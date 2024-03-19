<?<php
$First_Name=$_POST['First Name'];
$Middle_Name=$_POST['Middle Name'];
$Last_Name=$_POST['Last Name'];
$ID_Number=$_POST['ID.Number'];
$Sex=$_POST['Sex'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$con=new mysqli("localhost","root","","test");
if($con->connect_error){
    die("Failed to connect : "$con->connect_error);
}
else{
    $stmt=$con->prepare("select * from registration where email=?");
$stmt->bind_param('s',$Email);
$stmt->execute();
$stmt_result = $stmt->get_result();
if($stmt_result->num_rows>0) {
    $data=$stmt_result->fetch_assoc();
    if($data['password']===$password) {
    echo"<h2>Login Successfully</h2>";
    }

else{
    echo"<h2>Invalid Email or Password</h2>";
}
}
else{
    echo"<h2>Invalid Email or Password</h2>";
}
}
?>