<?php


////////////////// Two way password hashing /////////////////////////


function Encrypt($data,$password="SocialFindAHome2016infotecH")
{

   $min = 1000000000;
	$max = 9999999999;
	
	$startrandom = mt_rand($min,$max);
	$endrandom = mt_rand($min,$max);
	$data = $startrandom.$data.$endrandom;
	

    $result = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $char    = substr($data, $i, 1);
        $keychar = substr($password, ($i % strlen($password)) - 1, 1);
        $char    = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    $result = base64_encode($result);
    //return encrypt_random($result, $password);
    return $result;
}


function Decrypt($data,$password="SocialFindAHome2016infotecH")
{
    //$data = decrypt_random($data, $password);
    $result = '';
    $data = base64_decode($data);
    for ($i = 0; $i < strlen($data); $i++) {
        $char    = substr($data, $i, 1);
        $keychar = substr($password, ($i % strlen($password)) - 1, 1);
        $char    = chr(ord($char) - ord($keychar));
        $result .= $char;
    }

	$result = substr($result, 10);
	$result = substr($result, 0, -10);
	
    return $result;
}


?>

