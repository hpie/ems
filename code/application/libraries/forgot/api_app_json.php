<?php


function checkVerification($id,$password)
{
	
	$url = 'http://findahomeaustralia.com/api/v1/forgotpassword';
	$fields = array(
		'id' => urlencode($id),
		'password' => urlencode($password)
	);
        
        //echo "<pre>";print_r($fields);die;
        
	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	//execute post
	$result = curl_exec($ch);
	$status = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($result, true);
}

function checkData($key) {
	if(isset($_REQUEST[$key]) && trim($_REQUEST[$key])!='')
		return $_REQUEST[$key];
	return false;
}
	
?>