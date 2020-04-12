<?php
include("dbconnect.php");
$db = mysql_select_db("employee",$con);

if(isset($_GET['upd']))
{
 $id = $_GET['upd'];
 $record = mysql_query("SELECT * from `emp` WHERE `id`=$id");
 if(count($record) == 1)
 {
  $n = mysql_fetch_array($record);
  $name = $n['name'];
  $task = $n['task'];
  $pri = $n['prior'];
  $sdat = $n['sdate'];
  $edat = $n['edate'];
 } 
}
?>
<html
<head>
<title>Admin Page</title>
</head>
<body>
<form action="list.php" method="post" name="addf" id="addf">
<p><input type="hidden" name="id" value="<?php if(isset($_GET['upd'])){echo $id;}?>"></p>
<p><label>Employee Name : </label><input type="text" name="ename" id="ename" value="<?php if(isset($_GET['upd'])){echo $name;}?>"></p>
<p><label>Task : </label><textarea name="task" rows="4" cols="40" placeholder="Enter the text...." form="addf"><?php if(isset($_GET['upd'])){echo $task;}?></textarea></p>
<p><label>Priorities : </label><select type="dropdown" name="prior" id="prior">
<option value="High" <?php if(isset($_GET['upd'])){if($pri == "High") echo 'selected="selected"';}?>>High</option>
<option value="Medium" <?php if(isset($_GET['upd'])){if($pri == "Medium") echo 'selected="selected"';}?>>Medium</option>
<option value="Low" <?php if(isset($_GET['upd'])){if($pri == "Low") echo 'selected="selected"';}?>>Low</option>
</select></p>
<p><label>Start Date : </label><input type="date" id="sdate" name="sdate" value="<?php if(isset($_GET['upd'])){echo $sdat;}?>"></p>
<p><label>End Date : </label><input type="date" id="edate" name="edate" value="<?php if(isset($_GET['upd'])){echo $edat;}?>"></p>
<?php
if(isset($_GET['upd']))
{ ?>
<input type="submit" value="Update" name="update" id="update">
<?php
}
else
{ ?>
<input type="submit" value="Add" name="add" id="add">
<?php
}
?>
</form>
</body>
</html>