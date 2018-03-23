<?PHP
//ini_set("memory_limit",-1);


class Query {
	
	
	public $db;
	public function __construct()
	{
		$this->db = new DB();
		/*
		-select($q)
		-insert($q)
		-update($q)
		-delete($q)
		
		-num_rows($result)
		
		-fetch($result,$arrayRemoved=false)
		-fetch_array($result,$arrayRemoved=false)
		
		-fetch_withoutPrefix($result,$Prefix,$arrayRemoved=false)
		-fetch_array_withoutPrefix($result,$Prefix,$arrayRemoved=false)
		
		
		
		+getTypesOfResults($result,$isArray=false,$arrayRemoved=false)
		+getTypesOfResults_withoutPrefix($result,$Prefix,$isArray=false,$arrayRemoved=false)
		*/
	}
	public function get_connection()
	{	
		$con = $this->db->getConnection();
		return $con;
	}
	
	public function select($q)
	{	
			$con = $this->db->getConnection();
			//$res = mysql_query($q,$con);
			$res = mysqli_query($con,$q) ;
			if (!$res)
			{
				echo "Error Selecting: " . $q . "<br>" . mysqli_error($con);die;
			}
			$this->db->closeConnection($con);
			return $res;
	}
	
	public function insert($q)
	{	
			$con = $this->db->getConnection();
			$id = 0;
			//$res = mysql_query($q,$con);
			$res = mysqli_query($con,$q);
			if (!$res)
			{
				 echo "Error Inserting: " . $q . "<br>" . mysqli_error($con);die;
			}
			$id = mysqli_insert_id($con);
			$this->db->closeConnection($con);
			return $id;
	}
	
	public function update($q)
	{	
			$con = $this->db->getConnection();
			//$res = mysql_query($q,$con);
			$res = mysqli_query($con,$q) or die(mysqli_error());
			if (!$res)
			{
				 echo "Error Updating: " . $q . "<br>" . mysqli_error($con);die;
			}
			$this->db->closeConnection($con);
			return $res;
	}
	
	public function delete($q)
	{	
			$con = $this->db->getConnection();
			//$res = mysql_query($q,$con);
			$res = mysqli_query($con,$q);
			if (!$res)
			{
				 echo "Error Deleting: " . $q . "<br>" . mysqli_error($con);die;
			}
			$this->db->closeConnection($con);
			return $res;
	}
	
	/**************************Query**********************/
	
	public function num_rows($result)
	{	
		if($result)
		{
			if(mysqli_num_rows($result)>0)
				return mysqli_num_rows($result);
		}
		return false;
	}
	
	public function fetch($result,$arrayRemoved=false)
	{	
		if($this->num_rows($result))
		{
			//echo "<pre>";print_r($result);die;
			$row = $this->getTypesOfResults($result,false,$arrayRemoved);
			return $row;
		}
		return false;
	}
	
	public function fetch_array($result,$arrayRemoved=false)
	{	
		if($this->num_rows($result))
		{
			$data = $this->getTypesOfResults($result,true,$arrayRemoved);
			return $data;			
		}
		return false;
	}
	public function fetch_withoutPrefix($result,$Prefix,$arrayRemoved=false)
	{	
		if($this->num_rows($result))
		{
			$row = $this->getTypesOfResults_withoutPrefix($result,$Prefix,false,$arrayRemoved);
			return $row;
		}
		return false;
	}
	
	public function fetch_array_withoutPrefix($result,$Prefix,$arrayRemoved=false)
	{	
		if($this->num_rows($result))
		{
			$data = $this->getTypesOfResults_withoutPrefix($result,$Prefix,true,$arrayRemoved);
			return $data;			
		}
		return false;
	}
	
	
	
	public function getTypesOfResults($result,$isArray=false,$arrayRemoved=false)
	{
		$t_start = microtime(true);
	
		
			try {
				
				$types = array();
				 for ($i = 0; $i < mysqli_num_fields($result); $i++) {
					$meta = mysqli_fetch_field_direct($result, $i);
				
					
					switch($meta->type) {
						case 1:
							//$types[$meta->name] = 'boolean';
							$types[$meta->name] = 'integer';
							break;
						case 2:
							$types[$meta->name] = 'integer';
							break;
						case 3:
							$types[$meta->name] = 'integer';
							break;
						case 4:
							$types[$meta->name] = 'double';
							break;
						case 5:
							$types[$meta->name] = 'double';
							break;
						case 7:
							$types[$meta->name] = 'string';
							break;
						case 8:
							$types[$meta->name] = 'integer';
							break;
						case 9:
							$types[$meta->name] = 'integer';
							break;
						case 10:
							$types[$meta->name] = 'string';
							break;
						case 11:
							$types[$meta->name] = 'string';
							break;
						case 12:
							$types[$meta->name] = 'string';
							break;
						case 13:
							$types[$meta->name] = 'integer';
							break;
						case 16:
							$types[$meta->name] = 'double';
							break;
						case 253:
							$types[$meta->name] = 'string';
							break;
						case 254:
							$types[$meta->name] = 'string';
							break;
						case 246:
							$types[$meta->name] = 'double';
							break;
							
						default:
							$types[$meta->name] = 'string';
							break;
					}//end switch
					
				}//end for loop	
			
					
				
				if($isArray)
				{
					if($arrayRemoved)
					{
						$f_data = array();
						while($row=mysqli_fetch_assoc($result)) array_push($data,$row);
						for($i=0;$i<count($data);$i++) {
							$f_row = array();
							foreach($types as $name => $type) {
								settype($data[$i][$name], $type);
								//$f_name = str_replace($Prefix."_","",$name);
								$f_name = $name;
								//$type_array = array('update','datetime'); //add removable parameter
								$type_array = $arrayRemoved;
								if(!in_array($f_name,$type_array))
								{
									$f_row[$f_name] = $row[$name];
								}
							}
							array_push($f_data,$f_row);
						}	
						$t_stop = microtime(true);
						return $f_data;	
					}
					else{
						$data = array();
						while($row=mysqli_fetch_assoc($result)) array_push($data,$row);
						for($i=0;$i<count($data);$i++) {
							foreach($types as $name => $type) {
								settype($data[$i][$name], $type);
							}
						}
						$t_stop = microtime(true);
						return $data;		
					}
				}
				else
				{
					if($arrayRemoved)
					{
						$f_row = array();
						$row = mysqli_fetch_assoc($result);
						foreach($types as $name => $type) {
							settype($row[$name], $type);
							//$f_name = str_replace($Prefix."_","",$name);
							$f_name = $name;
							//$type_array = array('update','datetime');
							$type_array = $arrayRemoved;
							if(!in_array($f_name,$type_array))
							{
								$f_row[$f_name] = $row[$name];
							}
						}
						
						$t_stop = microtime(true);
						return $f_row;
					}
					else
					{
						$row = mysqli_fetch_assoc($result);
						foreach($types as $name => $type) {
							//echo gettype($row[$name]);
							settype($row[$name], $type);
						}
						
						$t_stop = microtime(true);
						return $row;
					}
				}
		
				
			} catch (Exception $e) {
				echo"<pre>";print_r($e->getMessage());die;
			}
		
		
			
		
		
	}//end function getTypesOfResults
	
	public function getTypesOfResults_withoutPrefix($result,$Prefix,$isArray=false,$arrayRemoved=false)
	{
		$t_start = microtime(true);
	
				
		
		 $types = array();
		 for ($i = 0; $i < mysqli_num_fields($result); $i++) {
			$meta = mysqli_fetch_field_direct($result, $i);
		
			
			switch($meta->type) {
				case 1:
					//$types[$meta->name] = 'boolean';
					$types[$meta->name] = 'integer';
					break;
				case 2:
					$types[$meta->name] = 'integer';
					break;
				case 3:
					$types[$meta->name] = 'integer';
					break;
				case 4:
					$types[$meta->name] = 'double';
					break;
				case 5:
					$types[$meta->name] = 'double';
					break;
				case 7:
					$types[$meta->name] = 'string';
					break;
				case 8:
					$types[$meta->name] = 'integer';
					break;
				case 9:
					$types[$meta->name] = 'integer';
					break;
				case 10:
					$types[$meta->name] = 'string';
					break;
				case 11:
					$types[$meta->name] = 'string';
					break;
				case 12:
					$types[$meta->name] = 'string';
					break;
				case 13:
					$types[$meta->name] = 'integer';
					break;
				case 16:
					$types[$meta->name] = 'double';
					break;
				case 253:
					$types[$meta->name] = 'string';
					break;
				case 254:
					$types[$meta->name] = 'string';
					break;
				case 246:
					$types[$meta->name] = 'double';
					break;
					
				default:
					$types[$meta->name] = 'string';
					break;
			}//end switch
			
		}//end for loop	
		
		if($isArray)
		{
			
			if($arrayRemoved)
			{
				$f_data = array();
				$data = array();
				while($row=mysqli_fetch_assoc($result)) array_push($data,$row);
				for($i=0;$i<count($data);$i++) {
					$f_row = array();
					$row = $data[$i];
					foreach($types as $name => $type) {
						settype($data[$i][$name], $type);
						$f_name = str_replace($Prefix."_","",$name);
						//$type_array = array('update','datetime'); //add removable parameter
						$type_array = $arrayRemoved;
						if(!in_array($f_name,$type_array) && !in_array($name,$type_array))
						{
							$f_row[$f_name] = $row[$name];
						}
					}
					array_push($f_data,$f_row);
				}	
				$t_stop = microtime(true);
				return $f_data;	
			}
			else{
				
				$data = array();
				$f_data = array();
				while($row=mysqli_fetch_assoc($result)) array_push($data,$row);
				
				for($i=0;$i<count($data);$i++) {
					$f_row = array();
					$row = $data[$i];
					foreach($types as $name => $type) {
						settype($data[$i][$name], $type);
						$f_name = str_replace($Prefix."_","",$name);
						//$type_array = array('update','datetime'); //add removable parameter
						$f_row[$f_name] = $row[$name];
						
					}
					array_push($f_data,$f_row);
				}
				//echo "<pre>1";print_r($f_data);echo "<pre>2";die;
				$t_stop = microtime(true);
				return $f_data;		
			}
		}
		else
		{
			if($arrayRemoved)
			{
				$f_row = array();
				$row = mysqli_fetch_assoc($result);
				foreach($types as $name => $type) {
					settype($row[$name], $type);
					$f_name = str_replace($Prefix."_","",$name);
					//$type_array = array('update','datetime');
					$type_array = $arrayRemoved;
					if(!in_array($f_name,$type_array) && !in_array($name,$type_array))
					{
						$f_row[$f_name] = $row[$name];
					}
				}
				
				$t_stop = microtime(true);
				return $f_row;
			}
			else
			{
				$f_row = array();
				$row = mysqli_fetch_assoc($result);
				foreach($types as $name => $type) {
					//echo gettype($row[$name]);
					settype($row[$name], $type);
					$f_name = str_replace($Prefix."_","",$name);
					//$type_array = array('update','datetime'); //add removable parameter
					$f_row[$f_name] = $row[$name];
				}
				
				$t_stop = microtime(true);
				return $f_row;
			}
		}
		
		
	}//end function getTypesOfResults_withoutPrefix
	
	
	/*
		$mysql_data_type_hash = array(
				1=>'tinyint',
				2=>'smallint',
				3=>'int',
				4=>'float',
				5=>'double',
				7=>'timestamp',
				8=>'bigint',
				9=>'mediumint',
				10=>'date',
				11=>'time',
				12=>'datetime',
				13=>'year',
				16=>'bit',
				//252 is currently mapped to all text and blob types (MySQL 5.0.51a)
				253=>'varchar',
				254=>'char',
				246=>'decimal'
			);
			
		 for ($i = 0; $i < mysqli_num_fields($result); $i++) {
			$meta = mysqli_fetch_field_direct($result, 1);
			
			$types[$meta->name] = $mysql_data_type_hash($meta->type);
							
		}	
		
		var_dump($types);
		
		*/
		/*$mysql_data_type_hash = array(
				1=>'tinyint',
				2=>'smallint',
				3=>'int',
				4=>'float',
				5=>'double',
				7=>'timestamp',
				8=>'bigint',
				9=>'mediumint',
				10=>'date',
				11=>'time',
				12=>'datetime',
				13=>'year',
				16=>'bit',
				//252 is currently mapped to all text and blob types (MySQL 5.0.51a)
				253=>'varchar',
				254=>'char',
				246=>'decimal'
			);*/
			
}

?>