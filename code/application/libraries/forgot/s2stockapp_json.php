<?php


function checkVerification($id)
{
	
	$url = 'https://hypertechonline.com/923874293874/api/v1/verify';
	$fields = array(
		'user_id' => urlencode($id),
		'status' => urlencode('1')
	);
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