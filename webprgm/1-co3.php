<html>
<head>
<style>
.container 
{
  background-color: yellow;
  width: 500px;
  padding: 100px;
  margin: 50px;
}
</style>
</head>
<body>
<div class="container">
<form name="f1" method="POST">
    <h3 align="center"><u>REGISTER HERE</u></h3>
  <table align="center">
<tr>
  <td>User Name:</td>
  <td><input type="text" name="username" value=""/></td>
</tr>
<tr>
<td>Address:</td>
<td><input type="text" name="add" value=""></td>
</tr>
<tr>
<td>Age:</td>
<td><input type="number" name="age" value=""></td>
</tr>
<tr>
<td>Phone:</td>
<td><input type="number" name="ph" value=""></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="em" value=""></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" value=""></td>
</tr>
<tr>
<td><input type="submit" name="submit"></td>
</tr>
</table>
</div>
</form>
<table border="1">
<tr>
<th>Username</th>
<th>Address</th>
<th>Age</th>
<th>Phone</th>
<th>Email</th>
<th>Password</th>
</tr>


<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $address=$_POST['add'];
   
    $age=$_POST['age'];
    $phone=$_POST['ph'];
    $email=$_POST['em'];
    $password=$_POST['password'];
    $n1=preg_match('@[A-Z]@',$username);
    $n2=preg_match('@[a-z]@',$username);
    $uppercase=preg_match('@[A-Z]@',$password);
    $lowercase=preg_match('@[a-z]@',$password);
    $number=preg_match('@[0-9]@',$password);
    $p= preg_match('@[6-9]\d{9}@', $phone);
    $conn=mysqli_connect("localhost","root","","student");
    if($conn)
    {
        echo("Successfully connected");
        echo "<br>";
    }
    else{
        echo("error");
    }
    if($username=="")
    {
        echo("Please Enter the username!")."<br>";
    }
    elseif(!$n1 && !$n2)
    {
    echo("Only letters are allowed for the  Name Filed")."<br>";
    }
    if($password=="" && strlen($password)<8)
    {
        echo("please enter a password")."<br>";
    }
    elseif(!$uppercase || !$lowercase || !$number)
    {
        echo("please enter a valid password!")."<br>";
    }
    if($age=="")
    {
        echo("Please Enter your age!")."<br>";
    }
    if($phone=="")
    {
        echo("Please Enter a valid phone number!")."<br>";
    }
    elseif(!$p)
    {
        echo("phone number must contain 10 digits & only start with 6/7/8/9")."<br>";
    }
    if($email=="")
    {
        echo("Please Enter your mail id!")."<br>";
    }
    
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 echo("Invalid email format");
}
$query="INSERT INTO reg VALUES('$username','$address',$age,$phone,'$email','$password')";
 
if(mysqli_query($conn,$query))
{
    echo("successfully inserted");
    echo "<br>";
}
else
{
    echo("insertion failed");
}
 

$s="SELECT * FROM reg";
$data=mysqli_query($conn,$s);
while($res=mysqli_fetch_assoc($data))
{
    ?>
   <tr>
    <td><?php echo $res['Username'];?></td>
    <td><?php echo $res['Address'];?></td>
    <td><?php echo $res['Age'];?></td>
    <td><?php echo $res['Pnone'];?></td>
    <td><?php echo $res['Email'];?></td>
    <td><?php echo $res['Password'];?></td>
    
    
    
</tr>
<?php
}

}
?>
</table>
</body>
</html>