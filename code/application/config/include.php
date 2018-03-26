<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



/*
 * ---------------------------------------------------------------
 * Library Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */



//Library for image resizing
//require_once('../Libraries/php-image-magician/php_image_magician.php');
//require_once('libs/image-resize/ImageResize.php'); 
//echo "1";die;
//Library for email sending
//include_once('Libraries/smtp_mail/smtp_send.php');
//Class for PushNotification
//include_once("Libraries/android_push/android_notification.php");
//include_once("Libraries/iphone_push/iphone_notification.php");

require_once(APP_INCLUDE_Library.'image-resize/ImageResize.php');
require_once(APP_INCLUDE_Library.'smtp_mail/smtp_send.php'); 
//require_once(APP_INCLUDE_Library.'way2sms/way2sms-api.php');
//require_once(APP_INCLUDE_Library.'google-api-php-client-master/src/Google/autoload.php');

?>
