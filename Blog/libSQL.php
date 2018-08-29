<?

	//setup db connection
	$link = mysqli_connect("localhost","wjwickha_admin","Oceanic815");
	mysqli_select_db($link, "wjwickha_blog");
	
	//executes a given sql query with the params and returns an array as result
	function query() {
		global $link;
		$debug = false;
		
		//get the sql query
		$args = func_get_args();
		$sql = array_shift($args);
	
		//secure the input
		for ($i=0;$i<count($args);$i++) {
			$args[$i] = urldecode($args[$i]);
			$args[$i] = mysqli_real_escape_string($link, $args[$i]);
		}
		
		//build the final query
		$sql = vsprintf($sql, $args);
		
		if ($debug) print $sql;
		
		//execute and fetch the results
		$result = mysqli_query($link, $sql);
		if (mysqli_errno($link) == 0 && $result) {
			
			$rows = array();
	
			if ($result!==true)
			while ($d = mysqli_fetch_assoc($result)) {
				array_push($rows,$d);
			}
			
			return array('result'=>$rows);
					
		} else {
		
			//error
			return array('error'=>'Invalid query');
		}
	}
	
?>