<?php

    include 'd_b.php' ;

    $db = new first("classtable");
    
    if(isset($_GET['d_id'])) 
    {    
            $d_id = $_GET['d_id'];  
        	$db->delete("ctable", "id=$d_id");
    		header("location:form_view.php");
    }

    $sql = "SELECT * FROM ctable";
    $res = mysqli_query($db->con, $sql);

?>
    <table border="2">
    	<tr>
    		<th>Id</th>
    		<th>Name</th>
            <th>Email</th>
    		<th>Password</th>
            <th>Delete</th>
    		<th>Edit</th>
    	</tr>
    <?php while ($data = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><?php echo $data['id'] ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['password'] ?></td>
            <td><a href="form_view.php?d_id=<?php echo $data['id']; ?>" class="btn bg-gradient-primary">Delete</a></td>
            <td><a href="form.php?id=<?php echo $data['id']; ?>" class="btn bg-gradient-danger">Edit</a></td>
        </tr>
    <?php } ?>
    </table>
    <td><a href="form.php">register</a></td>

    
<?php ?>
