<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Reset Password Form  Responsive Widget Template | Home :: w3layouts</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="keywords" content="Reset Password Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <!--google fonts-->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        <style type="text/css">
            .pass{
                font-size: 1em;
                color: #000;
                padding: 1em 0.5em;
                display: block;
                width: 95%;
                outline: none;
                margin-bottom: 1em;
                text-align: center;
                border: 1px solid #B9B9B9;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#confirm_password').on('keyup', function () {
                    if ($(this).val() == $('#password').val()) {
                        $('#message').html('Password matched.').css('color', 'green');
                    } else $('#message').html('Confirm Password did not match with password.').css('color', 'red');
                }); 
            });
            function myFunction() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var ok = true;
                if (password != confirm_password || password=='' || password==null) {
                    //alert("Passwords Do not match");
                    document.getElementById("password").style.borderColor = "#E34234";
                    document.getElementById("confirm_password").style.borderColor = "#E34234";
                    
                    ok = false;
                }
                else {
                    //alert("Passwords Match!!!");
                }
                return ok;
            }
        </script>
    </head>

    <body>
        <!--element start here-->
        <div class="elelment">
            <h2>VCR INDIA</h2>
            <div class="element-main">

                <div style="/* padding:0; */text-align:left;vertical-align:top;" align="left">
                    <div style="border-collapse:collapse!important;color:#222222;font-family:'Helvetica','Arial',sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;word-break:break-word" align="left" valign="top">

                        <div style="color:#333333;font-size:14px;font-weight:normal;line-height:20px;margin:20px">
                            <div class="row">
                                <div class="col-xs-12"><p style="color:#222222;font-family:'Helvetica','Arial',sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0 0 10px;padding:0;text-align:left" align="left">
                                        Hello<strong>,</strong>
                                    </p>
                                </div>
                            </div><br><hr style="background:#d9d9d9;border:none;color:#d9d9d9;min-height:1px;margin:10px 0 10px">
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p style="color:#222222;font-family:'Helvetica','Arial',sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0 0 10px;padding:0;text-align:left" align="left">
                                        Thank you to help us to secure your VCR account by updating your password.
                                        This will let you receive notifications and password <span class="il">resets</span> from VCR.
                                    </p>
                                </div>
                            </div><br>

                            <h4>Thank you.</h4>





                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="copy-right">
            <p>© 2016 All rights reserved | by  <a href="#" target="_blank"> VCR India </a></p>
        </div>

        <!--element end here-->
    </body>
</html>