<!-- Footer -->
<footer class="main">

    &copy; 2018 <strong>iBrand</strong> Admin.

</footer>
</div>
</div>

<!-- Sample Modal (Default skin) -->
<div class="modal fade" id="sample-modal-dialog-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Default Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Sample Modal (Skin inverted) -->
<div class="modal invert fade" id="sample-modal-dialog-2">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Sample Modal (Skin gray) -->
<div class="modal gray fade" id="sample-modal-dialog-3">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Imported scripts on this page -->
<script src="<?php echo ASSETS; ?>js/datatables/datatables.js"></script>
<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo ASSETS; ?>js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo ASSETS; ?>js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo ASSETS; ?>js/gsap/TweenMax.min.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo ASSETS; ?>js/bootstrap.js"></script>
<script src="<?php echo ASSETS; ?>js/joinable.js"></script>
<script src="<?php echo ASSETS; ?>js/resizeable.js"></script>
<script src="<?php echo ASSETS; ?>js/neon-api.js"></script>
<script src="<?php echo ASSETS; ?>js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="assets/js/bootstrap-switch.min.js"></script>
<script src="<?php echo ASSETS; ?>js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo ASSETS; ?>js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo ASSETS; ?>js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo ASSETS; ?>js/raphael-min.js"></script>
<script src="<?php echo ASSETS; ?>js/morris.min.js"></script>
<script src="<?php echo ASSETS; ?>js/toastr.js"></script>
<script src="<?php echo ASSETS; ?>js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo ASSETS; ?>js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?php echo ASSETS; ?>js/neon-demo.js"></script>

<script type="text/javascript">
//		jQuery(document).ready(function($)
//		{
//			// Sample Toastr Notification
//			setTimeout(function()
//			{
//				var opts = {
//					"closeButton": true,
//					"debug": false,
//					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
//					"toastClass": "black",
//					"onclick": null,
//					"showDuration": "300",
//					"hideDuration": "1000",
//					"timeOut": "5000",
//					"extendedTimeOut": "1000",
//					"showEasing": "swing",
//					"hideEasing": "linear",
//					"showMethod": "fadeIn",
//					"hideMethod": "fadeOut"
//				};
//		
//				toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
//			}, 3000);
//			
//			
//		
//		});		
</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var $table4 = jQuery("#table-4");

        $table4.DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>

<script>
    jQuery(document).ready(function ($) {                      
        $('#categories').on('change', function () {           
            var urlReq = '<?php echo MASTER_ADMIN_GET_SUBCATEGORIES_BY_ID_INSERT_LIINK ?>';
            var id = this.value;           
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        // alert(_returnData)
                        $('#subcategories option').remove();
                        $('#subcategories').append('<option value=0>Select Sub Category</option>');
                        $.each(_returnData.subcategory, function (key, value) {                            
                            $('#subcategories').append($("<option></option>").attr("value", value['subcategories_id']).text(value['subcategories_name']));
                        });
                    }
                }
            });
        });                
        $('#subcategories').on('change', function () {           
            var urlReq = '<?php echo MASTER_ADMIN_GET_SUB1CATEGORIES_BY_ID_INSERT_LIINK ?>';
            var id = this.value;           
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        // alert(_returnData)
                        $('#sub1categories option').remove();
                        $('#sub1categories').append('<option value=0>Select Under Sub Category</option>');
                        $.each(_returnData.sub1category, function (key, value) {                             
                            $('#sub1categories').append($("<option></option>").attr("value", value['sub1categories_id']).text(value['sub1categories_name']));
                        });
                    }
                }
            });
        });
        
        
        
           $(document).on('click', '.orderChangeStatus', function (e) {
            var id = $(this).data('id');
            var table = $(this).data('table');
            var status = $(this).data('status');           
            var urlReq = '<?php echo MASTER_ADMIN_CHANGE_ORDER_STATUS_LIINK; ?>';
            $.ajax({type: "POST",
                dataType: "json", 
                data: {id: id, table: table, status: status},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.success == 'success')                        
                        setTimeout(function () {
                            location.reload();
                        },100);
                }
            });
            return false;
        });
       
 

       
       
if ('<?php if (isset($_SESSION['changeOrderStatus'])) {echo $_SESSION['changeOrderStatus'];}?>' == '1') {   
                var ordersts = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                        "toastClass": "success",
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                };
           
        toastr.success('Order Status Change',"Successfully", ordersts);
        '<?php echo $_SESSION['changeOrderStatus'] = 0; ?>';
    } 
        
        
        
        
        
        
        
        $(document).on('click', '.changeStatus', function (e) {
            var id = $(this).data('id');
            var table = $(this).data('table');
            var status = $(this).data('status');           
            var urlReq = '<?php echo MASTER_ADMIN_CHANGE_STATUS_LIINK; ?>';
            $.ajax({type: "POST",
                dataType: "json", 
                data: {id: id, table: table, status: status},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.success == 'success')                        
                        setTimeout(function () {                           
                           var stschanged='';                            
                           $('.btn'+id).remove(); 
                           if(status===1){  
                            stschanged='Activated';
                            var htmldata='<button class="btn btn-danger btn-sm btn-icon icon-left changeStatus btn'+id+'" data-id="'+id+'" data-table="'+table+'" data-status="0"><i class="entypo-check"></i>InActive</button>';
                            $("#td"+id).append(htmldata);                                                        
                           }
                           else{
                            stschanged='InActivated';
                            var htmldata='<button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn'+id+'" data-id="'+id+'" data-table="'+table+'" data-status="1"><i class="entypo-check"></i>Active</button>';
                            $("#td"+id).append(htmldata);
                           }                          
                           var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "success",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};		
                            toastr.success(stschanged,"Successfully", opts);
                           
                        },100);
                }
            });
            return false;
        });
         $("#imageadd").change(function () {
         $("#changeImage").remove();
            var length = document.getElementById('imageadd').files.length;
            var htmldata = '';
            
            for (var i = 0; i < length; i++) {
                var ele = URL.createObjectURL(event.target.files[i]);
                htmldata = '<img src="' + ele + '" class="col-xs-2 img-responsive productImage">' + htmldata;
            }
            htmldata = ' <div class="form-group" id="changeImage"><div class="col-md-offset-3 col-sm-offset-3 col-md-9 col-sm-9 col-xs-12">' + htmldata + '</div></div>';
            $("#imgAdd").after(htmldata);
        });
    }); 
</script>

</body>
</html>