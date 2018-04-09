<?php
class DB {
public $connect;
	public function getConnection()
	{
		if($_SERVER['HTTP_HOST']=='localhost')
                    $con=mysqli_connect("localhost","root","hpie@edu","cdac_ems");
                else 
                    $con=mysqli_connect("localhost","username","password","dbname"); 
		// Check connection
		if (mysqli_connect_errno())                                        
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		return $con;
	}	
	public function closeConnection($con)
	{
		//mysql_close($con);
		mysqli_close($con);
	}
}
?>