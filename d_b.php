<?php 
class first{


	public $con;
	function __construct($db)
	{
		$this->con=mysqli_connect('localhost','root','',$db);
	}


	function insert($tbname,$array)
	{
		$key=array_keys($array);
		$key1=implode(',', $key);

		$val=array_values($array);
		$val2="'".implode("','",$val)."'";

		$query="insert into $tbname ($key1) values ($val2)";
		mysqli_query($this->con,$query);
	}

	function update($tbname,$array,$condition)
	{
		$update = [];

        foreach ($array as $key => $value) {
            $update[] = "$key='$value'";
        }

        $u_string = implode(', ', $update);

		$query="update $tbname set $u_string where $condition";
		mysqli_query($this->con,$query);

	}

	function delete($tbname, $d_id) {
        $query = "delete from $tbname where $d_id";
        mysqli_query($this->con, $query);
    }

    function select($tbname,$id)
    {
    	 $query =  "select * from $tbname where $id";
        return mysqli_query($this->con, $query);	
    }


}

 ?>