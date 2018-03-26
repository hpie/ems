<?php include 'Security.php'; ?>
<?php include 'api_app_json.php'; ?>

<?php

//echo $id;
if (isset($_POST) && !empty($_POST) && isset($_POST['password'])) {
    $password = $_POST['password'];
    $datas = $_POST['data'];
	$security = new Security();
   	$id = $security->decrypt_string($datas);
    
    
    
    $result = checkVerification(intval($id),$password);
    //echo "<pre>";print_r($result) ;die;
    if ($result['error']==false) {
        $contents = file_get_contents('forgot_template_thankyou.php');
        echo $contents;
        die;
    }
    //echo 1;die;
}
//echo $_SERVER[REQUEST_URI];echo "<br />";
//echo $_SERVER[HTTP_HOST];
/* if(checkData('datas'))
  {
  //for 1 id key=eYOhlZ2Tn3aan8uasd3Z1WSHn2ni1NTfypjIfrjY0cDR2Z/Az8t3faefmWlkaWef
  //u/iuYdM/kPVuJsoTKVX2AcH/5JAnaXGBjSPOMaH+t/Fh7XAFY6IA0jbq91qigMLOXwvvm5ShYz60/MA0syrfU2IT+v6eYO3vWqRH15Bez5KgdLWRWfmSQu1V9oPmx7OIrgS2MUzonjyTuhYHSoZyu2Q==
  $data = checkData('datas');

  if($key = Encrypt($data))
  {
  echo "key=".$key;exit;
  }
  }
  else */
if (checkData('datas')) {

    /* $uri = $_SERVER[REQUEST_URI];
      $uridata = '';
      if (strpos($uri, '/find_a_home_bkp/forgot/') !== false) {
      $uridata = ltrim($uri, '/find_a_home_bkp/forgot/');
      }
      else{
      $uridata = ltrim($uri, '/');
      }
      $uridata = ltrim($uri, '/'); */
	$uridata = checkData('datas');
	$security = new Security();
   	$id = $security->decrypt_string($uridata);
    
    //echo $id;die;
    if (is_numeric($id)) {

        //$result = checkVerification($id, $password)
        include_once("forgot_template.php");
        exit;
    }
}

echo '<html>
		<body>
			<h1>HTTP Status 403 - Access is denied</h1>
			
		</div><h2> Hello, you do not have permission to access this page! </h2>
		</body>
		</html>';
?>