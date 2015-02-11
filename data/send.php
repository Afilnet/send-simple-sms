<?php
	$email = $_POST['email'];
    $password = $_POST['password']; 
    $mobile = $_POST['mobile'];
    $sender = $_POST['sender'];
    $prefix = $_POST['prefix'];
    $sms = $_POST['sms'];
	
	// request url
    $url = "http://www.afilnet.com/http/sms/?email=".$email."&pass=".$password."&mobile=".$mobile."&id=".urlencode($sender)."&country=".$prefix."&sms=".urlencode($sms); 
	
	// http request
    $response = file_get_contents($url); 
    if($response) { 
        switch($response) { 
            case "OK": 
                $message = "SMS sent successfully";  
                break; 
            case "-1":  
                $message = "Error in login, email or password is wrong"; 
                break; 
            case "Sin creditos":  
                $message = "You have no credits for sending"; 
                break; 
            default: 
                $message = $response; 
        } 
    } else { 
        $message = "Error in request"; 
    } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Simple SMS</title>
</head>

<body>
<p><?=$message?></p>
</body>
</html>