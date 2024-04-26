<?php 

	include 'd_b.php';

	$db= new first("classtable");


	if(isset($_GET['id'])) 
	{
   		$id = $_GET['id'];
	   	$result = $db->select("ctable", "id=$id");
	    $data = mysqli_fetch_assoc($result);
	} 
	else 
	{
	    $data = array('name' => '', 'email' => '', 'password' => '');
	}

	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		if(isset($_GET['id'])) 
		{
    		$id = $_GET['id'];
    		$update=array('name'=>$name,'email'=>$email,'password'=>$password);
    		$db->update("ctable",$update, "id=$id");
			header("location:form_view.php");
    	}
    	else
    	{
			$insert=array('name'=>$name,'email'=>$email,'password'=>$password);
			$db->insert("ctable",$insert);
			header("location:form_view.php");
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post">
		<table border="2">
			<tr>
				<td>Name:</td>			
				<td><input type="text" name="name" value="<?php echo @$data['name'] ?>"></td>
			</tr>
			<tr>
				<td>Email:</td>			
				<td><input type="email" name="email" value="<?php echo @$data['email'] ?>"></td>
			</tr>
			<tr>
				<td>Password:</td>			
				<td><input type="password" name="password" value="<?php echo @$data['password'] ?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"></td>			
			</tr>
			<tr>
				<td><a href="form_view.php">View Data</a></td>			
			</tr>
		</table>
	</form>

</body>
</html>