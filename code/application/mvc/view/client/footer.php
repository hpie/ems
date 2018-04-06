<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title"><img src="<?php echo CLIENT_ASSETS; ?>img/logo.png" class="img-responsive" alt="Footer Logo"></h3>
                        <div class="textwidget">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum. Sed ex est, consectetur eget facilisis sed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">License</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Trending Jobs</h3>
                        <ul class="menu">
                            <li><a href="#">Android Developer</a></li>
                            <li><a href="#">Senior Accountant</a></li>
                            <li><a href="#">Frontend Developer</a></li>
                            <li><a href="#">Junior Tester</a></li>
                            <li><a href="#">Project Manager</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Follow Us</h3>
                        <div class="bottom-social-icons social-icon">  
                            <a class="twitter" href="https://twitter.com/GrayGrids"><i class="ti-twitter-alt"></i></a>
                            <a class="facebook" href="https://web.facebook.com/GrayGrids"><i class="ti-facebook"></i></a>                   
                            <a class="youtube" href="https://youtube.com"><i class="ti-youtube"></i></a>
                            <a class="dribble" href="https://dribbble.com/GrayGrids"><i class="ti-dribbble"></i></a>
                            <a class="linkedin" href="https://www.linkedin.com/GrayGrids"><i class="ti-linkedin"></i></a>
                        </div>	
                        <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
                        <form class="subscribe-box">
                            <input type="text" placeholder="Your email">
                            <input type="submit" class="btn-system" value="Send">
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" href="http://graygrids.com">GrayGrids</a></p>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

</footer>
<!-- Footer Section End -->  

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="ti-arrow-up"></i>
</a>

<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
            <div class="object" id="object_five"></div>
            <div class="object" id="object_six"></div>
            <div class="object" id="object_seven"></div>
            <div class="object" id="object_eight"></div>
        </div>
    </div>
</div>        
<!-- Main JS  -->
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery-min.js"></script>      
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/bootstrap.min.js"></script>    
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/material.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/material-kit.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/main.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/form-validator.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/contact-form-script.js"></script>    
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo CLIENT_ASSETS; ?>js/summernote.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifyAdmin.js"></script>
<script>
    $(document).ready(function () {        
        $("#<?php echo $offset.'joblist'; ?>").addClass( "activeLiA" );
        if ('<?php
if (isset($_SESSION['loginsuccess'])) {
    echo $_SESSION['loginsuccess'];
}
?>' == '1') {
            var d = new PNotify({
                title: 'Login successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['loginsuccess'] = 0; ?>';
        }
   
if ('<?php
if (isset($_SESSION['jobAddedSuccessfully'])) {
    echo $_SESSION['jobAddedSuccessfully'];
}
?>' == '1') {
            var d = new PNotify({
                title: 'Job added successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['jobAddedSuccessfully'] = 0; ?>';
        }
        
        if ('<?php
if (isset($_SESSION['AppllySuccessfully'])) {
    echo $_SESSION['AppllySuccessfully'];
}
?>' == '1') {
            var d = new PNotify({
                title: 'Job apply successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['AppllySuccessfully'] = 0; ?>';
        }else if('<?php
if (isset($_SESSION['AppllySuccessfully'])) {
    echo $_SESSION['AppllySuccessfully'];
}
?>' == '2'){
            var d = new PNotify({
                title: 'You have allready apply on this job',
                type: 'info',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['AppllySuccessfully'] = 0; ?>';
        }
 
    });   
    
    
 
  
</script>
<script>
    $(document).ready(function () {
       
        $('#summernote').summernote({
            height: 200,
            toolbar: [
              // [groupName, [list of button]]
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strikethrough', 'superscript', 'subscript']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],              
            ],
            disableDragAndDrop: true            
          });
          
           $('.note-group-select-from-files').remove();
        
    });
    
    
    
$(".add-fav").click(function(){
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var data = {};
    data['type'] =type;
     var urlreq = '<?php echo BASE_URL; ?>' + 'user_add_fav_job/' + id;
                $.ajax({type: "POST",
                    dataType: "json",
                    url: urlreq,
                    data:data,
                    success: function (_returnData) {
                        if (_returnData.success = "success"){
                            if(type == 'fav'){
                            $(".addfav"+id).hide();
                            $(".removefav"+id).show();
                        }else{
                            $(".removefav"+id).hide();
                            $(".addfav"+id).show();
                        }
                            return false;
                        }
                           
                    }
                });
});
</script>
</body>
</html>