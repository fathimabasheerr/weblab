<html>
<head>
<title>boom info</title>
</head>
<body bgcolor="yellow">
    <form name="myform" method="POST">
        <table border="0" align="center">
            <tr>
                <th>BOOK DETAILS</th>
                
            </tr>
            <tr>
                <td>Accession Number</td>
                <td><input type="Number" name="b1"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="b2"></td>
            </tr>
            <tr>
                <td>Authors</td>
                <td><input type="text" name="b3"></td>
            </tr>
            <tr>
                <td>Edition</td>
                <td><input type="text" name="b4"></td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td><input type="text" name="b5"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit"></td>
            </tr>
            
        </table>
    </form>
    <div class="container">
<form name="f2" method="POST">
    <h3 align="center"><u>Search a Book</u></h3>
  <table align="center">
<tr>
  <td>Enter the Title:</td>
  <td><input type="text" name="titles"/></td>
</tr>
<tr>
<td><input type="submit" name="search" value="Search"></td>
</tr>
</table>
</form>
</span>
</div>
<?php
if(isset($_POST['submit']))
{
    $accessno=$_POST['b1'];
    $tittle=$_POST['b2'];
    $authors=$_POST['b3'];
    $edition=$_POST['b4'];
    $publisher=$_POST['b5'];
  
    $number=preg_match('@[0-9]@',$accessno);
    $uppercase=preg_match('@[A-Z]@',$tittle);
    $lowercase=preg_match('@[a-z]@',$tittle);
    $number2=preg_match('@[0-9]@',$edition);
    $upper=preg_match('@[A-Z]@',$publisher);
    $lower=preg_match('@[a-z]@',$publisher);
    $lowercase2=preg_match('@[a-z]@',$authors);
    $conn=mysqli_connect("localhost","root","","library"); 
    if($conn)
    {
        echo("Successfully connected");
        echo "<br>";
    }
    else{
        echo("error");
    }
    if($accessno=="")
    {
        echo("Please Enter the accession number!")."<br>";
    }
    elseif(!$number)
    {
    echo("Only numbers are allwed")."<br>";
    }
    if($tittle=="")
    {
        echo("Please Enter the tittle!")."<br>";       
    }
    else if(!$lowercase && !$uppercase)
    {
        echo("please enter book tittle!")."<br>";
    }
    if($authors=="")
    {
        echo("please enter authors name!")."<br>";
    }
    if($edition=="")
    {
        echo("please enter edition!")."<br>";       
    }
    if($publisher=="")
    {
        echo("please enter publisher!")."<br>";
    }

    $sql="INSERT INTO book VALUES($accessno,'$tittle','$authors','$edition','$publisher')";
if(mysqli_query($conn,$sql))
{
    echo("successfully inserted");
    echo "<br>";
}
else
{
    echo("insertion failed");
}
}

if(isset($_POST['search']))
 {
  $conn=mysqli_connect("localhost","root","","Library");
  $titles=$_POST['titles'];
    ?>
<table border="1" align="center">
<tr>
<th>Accession Number</th>
<th>Title</th>
<th>Authors</th>
<th>Edition</th>
<th>Publisher</th>
</tr>
<?php
$s="SELECT * FROM book WHERE tittle LIKE '%$titles%'";
$data=mysqli_query($conn,$s);
 while($res=mysqli_fetch_assoc($data))
            {
                ?>

   <tr>
    <td><?php echo $res['accessno'];?></td>
    <td><?php echo $res['tittle'];?></td>
    <td><?php echo $res['authors'];?></td>
    <td><?php echo $res['edition'];?></td>
    <td><?php echo $res['publisher'];?></td>
</tr>
<?php

}
}
?>
</table>
</body>
</html>