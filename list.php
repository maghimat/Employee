<?php
//$connection = mysql_connect("localhost","root","");
include("dbconnect.php");
$db = mysql_select_db("employee",$con);

if(isset($_POST['add']))
{

$name = $_POST['ename'];
$tas = $_POST['task'];
$pri = $_POST['prior'];
$sdat = $_POST['sdate'];
$edat = $_POST['edate'];

if($name != "" || $tas !="" || $pri !="" || $sdat != "" || $edat !="")
{
  $db = "INSERT INTO `emp` (`id`, `name`, `task`, `prior`, `sdate`, `edate`) VALUES (NULL, '$name', '$tas', '$pri', '$sdat', '$edat')";

$query = mysql_query($db);
//echo "<br><p>Data inserted successfully</p>";
}
else
{
 echo "<p>Insertion Failed....</p>";
}

}

//delete
if(isset($_GET['del']))
{
 $id = $_GET['del']; 
 echo "the id u entered is ".$id;
 if($id != "")
 {
   $db = "DELETE FROM `emp` WHERE `id`=".$id;
   $query = mysql_query($db);
   echo "<br><p>Data Deleted Successfully....</p>";
 }
 else
 {
   echo "<br><p>Deletion Failed....</p>";
 }
}

//update
if(isset($_POST['update']))
{
  $id = $_POST['id'];
  $name = $_POST['ename'];
  $tas = $_POST['task'];
  $pri = $_POST['prior'];
  $sdat = $_POST['sdate'];
  $edat = $_POST['edate'];
  if($name !='' || $tas !='' || $pri !='' || $sdat !='' || $edat !='')
  {
    $db = "UPDATE `emp` SET `id`=$id,`name`='$name',`task`='$tas',`prior`='$pri',`sdate`='$sdat',`edate`='$edat' WHERE `id`=$id";
    $query = mysql_query($db);
    echo "<br><p>Data updated successfully...</p>";
  }
  else 
  {
    echo "<br><p>Updation failed....</p>";
  }
}
?>
<html>
<head>
<title>List</title>
</head>
<body>
<form method="post">
<button class="btn" type="submit" name="add" formaction="home.php">Add</button>
<table>
<tr>
<td>ID</td>
<td>Name</td>
<td>Task</td>
<td>Priority</td>
<td>Start Date</td>
<td>End Date</td>
<td>Action</td>
</tr>
<?php
$query = "SELECT * from `emp`";
$dbResult = mysql_query($query,$con);
while($row = mysql_fetch_assoc($dbResult))
{ ?>
  <tr>
  <td><?php echo $row['id'];?></td>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $row['task'];?></td>
  <td><?php echo $row['prior']; ?></td>
  <td><?php echo $row['sdate'];?></td>
  <td><?php echo $row['edate'];?></td>
  <td><input type="submit" name="update" id="update" formaction="home.php?upd=<?php echo $row['id'];?>" value="Update"><button class="btn" type="submit" name="delete" formaction="list.php?del=<?php echo $row['id'];?>">Delete</button></td>
  </tr>
<?php
}
?>
</table>
</form>
</body>
</html>