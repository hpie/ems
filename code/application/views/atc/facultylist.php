<style>
    body.modal-open{
        width:100%!important;
        padding-right:0!important;
        overflow-y:scroll!important;
        position:fixed!important;
    }
    .modal {
        z-index: 1000;
    }

    .modal-dialog {
        top: 157px;
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        /*margin-top: -50px;*/
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 16px;
        border-radius: 3px 0 0 3px;
    }
    .prev {
        left: 16px;
        /*border-radius: 3px 0 0 3px;*/
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    #studentData .ui-jqgrid-hbox {
        display : none;
    }
</style>
<?php
$ci = & get_instance();
$base_url = base_url();
?>
<table id="list1"></table> <!--Grid table-->
<div id="pager1"></div>  <!--pagination div-->
<br /><br />
<br /><br />
<script type="text/javascript">
    $(document).ready(function () {
        var lastsel;
        $("#list1").jqGrid({
            url: '<?php echo $base_url . 'index.php/atc/loadFacultyData' ?>', //another controller function for generating data
            mtype: "post", //Ajax request type. It also could be GET
            datatype: "json", //supported formats XML, JSON or Arrray
            colNames: ['Faculty ID', 'Faculty Name', 'Center Code', 'Documents', 'Registered Email', 'Joining Date'], //Grid column headings
            colModel: [
                {name: 'faculty_code', index: 'faculty_code', width: 30, align: "left"},
                {name: 'first_name', index: 'first_name', width: 20, align: "left", editable: true},
                {name: 'center_code', index: 'center_code', width: 20, align: "left"},
                {name: 'docs', index: 'docs', width: 20, align: "left", formatter: viewDocs},
                /*{name:'student_status',index:'student_status', width:30, align:"left"},*/
                {name: 'email_id', index: 'email_id', width: 20, align: "left", editable: true},
                {name: 'joining_dt', index: 'joining_dt', width: 20, align: "right"},
            ],
            rowNum: 10,
            width: 1150,
            rowList: [10, 20, 30],
            pager: '#pager1',
            sortname: 'faculty_code',
            viewrecords: true,
            rownumbers: true,
            gridview: true,
            caption: "Registran List",
            onCellSelect: function (rowid, iCol, cellcontent, e) {
                if (rowid && iCol == 1) {
                    //--------------------------------------------------------------
                    try {
                        $("#listSingle").jqGrid('GridUnload');
                    } catch (e) {
                        alert(e.message);
                    }
                    $("#listSingle").jqGrid({
                        url: '<?php echo $base_url . 'index.php/atc/loadFacultyDataSingle/' ?>' + rowid, //another controller function for generating data
                        mtype: "post", //Ajax request type. It also could be GET
                        postData: {faculty_id: cellcontent},
                        datatype: "json", //supported formats XML, JSON or Arrray
                        colNames: ['1_label', '2_label', '3_label', '4_label', '5_label', '6_label'], //Grid column headings
                        colModel: [
                            {name: '1_label', index: '1_label', width: 10, align: "left"},
                            {name: '1_val', index: '1_val', width: 10, align: "left", editable: true},
                            {name: '2_label', index: '2_label', width: 10, align: "left"},
                            {name: '2_val', index: '2_val', width: 10, align: "left", editable: true},
                            {name: '3_label', index: '3_label', width: 10, align: "left"},
                            {name: '3_val', index: '3_val', width: 10, align: "left", editable: true},
                        ],
                        onSelectRow: function (id) {
                            if (id && id !== lastsel) {
                                jQuery('#listSingle').jqGrid('restoreRow', lastsel);

                                var row_idArr = id.split('_');

                                // Applied the edit type and values according to the column names using row number 
                                switch (row_idArr[1]) {
                                    case '0' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: false});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;
                                    case '1' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;
                                    case '2' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;

                                    case '3' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: false, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true, pickdates);
                                        lastsel = id;
                                        break;

                                    case '4' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "select", editoptions: {value: "male:MALE;female:Female;other:Other"}});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;

                                    case '5' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "select", editoptions: {value: "pending:Pending;approved:Approved;other:Other"}});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "textarea", editoptions: {rows: "2", cols: "10"}});
                                        $('#listSingle').jqGrid('editRow', id, true, birthdate);
                                        lastsel = id;
                                        break;

                                    case '6' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "textarea", editoptions: {rows: "2", cols: "10"}});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;

                                    case '7' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "textarea", editoptions: {rows: "2", cols: "10"}});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;
                                    case '8' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "textarea", editoptions: {rows: "2", cols: "10"}});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;
                                    case '9' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true);
                                        lastsel = id;
                                        break;
                                    case '10' :
                                        $("#listSingle").jqGrid('setColProp', '1_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '2_val', {editable: true, edittype: "text"});
                                        $("#listSingle").jqGrid('setColProp', '3_val', {editable: true, edittype: "text"});
                                        $('#listSingle').jqGrid('editRow', id, true, createdate);
                                        lastsel = id;
                                        break;
                                }
                            }
                        },
                        editurl: "<?php echo $base_url . 'index.php/atc/updateFacultyDataSingle' ?>",
                        width: 850,
                        loadComplete: function () {
                            var ids = $("#listSingle").jqGrid('getDataIDs');
                            if (ids) {
                                for (var i = 0; i < ids.length; i++) {
                                    $("#listSingle").jqGrid('setCell', ids[i], '1_label', '', '', {style: 'background:aqua;'});
                                    $("#listSingle").jqGrid('setCell', ids[i], '2_label', '', '', {style: 'background:aqua;'});
                                    $("#listSingle").jqGrid('setCell', ids[i], '3_label', '', '', {style: 'background:aqua;'});
                                }
                            }
                        },
                        caption: "Faculty Details"
                    }).navGrid('#pagerSingle', {edit: false, add: false, del: false});
                    //-----------------------------------------------------------------
                    $("#studentModal").modal('show');

                } else if (rowid && iCol == 4) {
                    $.ajax({
                        url: "<?php echo $base_url . 'index.php/atc/getStudentDocs' ?>",
                        type: "POST",
                        data: {'student_id': rowid},
                        dataType: 'html',
                        success: function (resultdata) {
                            $("#studentDocData").html(resultdata);
                            //showSlides(1);
                            $("#studentDocModal").modal('show');
                        }
                    });
                } else {
                    //alert("hi");
                }
            }
        }).navGrid('#pager1', {edit: false, add: false, del: false});
    });

    function pickdates(id) {
        jQuery("#" + id + "_3_val", "#listSingle").datepicker({format: "YYYY-m-d"}).on('click', function () {
            if ($(e.target).is(".datepicker-container.datepicker-dropdown.datepicker-top-left") === false && $(e.target).is(".editable") === false) {
                $('.datepicker-container.datepicker-dropdown.datepicker-top-left').hide();
            }
            //$('.datepicker-container.datepicker-dropdown.datepicker-top-left').show();
        });
        /*
         .on('change', function(){
         $('.datepicker-container.datepicker-dropdown.datepicker-top-left').hide();
         }).on('click', function(){
         $('.datepicker-container.datepicker-dropdown.datepicker-top-left').show();
         });
         */
    }

    function birthdate(id) {
        jQuery("#" + id + "_1_val", "#listSingle").datepicker({format: "YYYY-m-d"});
    }

    function createdate(id) {
        jQuery("#" + id + "_1_val", "#listSingle").datepicker({format: "YYYY-m-d"});
        jQuery("#" + id + "_3_val", "#listSingle").datepicker({format: "YYYY-m-d"});
    }

    function viewDocs(cellvalue, options, rowObject)
    {
        return 'View Document';
    }

    function startEdit() {
        var grid = $("#list1");
        var ids = grid.jqGrid('getDataIDs');

        for (var i = 0; i < ids.length; i++) {
            grid.jqGrid('editRow', ids[i]);
        }
    }
    ;

    function saveRows() {
        var grid = $("#list1");
        var ids = grid.jqGrid('getDataIDs');

        for (var i = 0; i < ids.length; i++) {
            grid.jqGrid('saveRow', ids[i]);
        }
    }

    function refreshdata() {
        $("#list1").trigger("reloadGrid");
    }

    function showImg(img) {
        $('#studentDocTitle').html("Hello");
        $('#studentDocSrc').attr('src', img);
        $("#studentImgModal").modal('show');
    }
</script>

<!-- Modal -->
<div class="modal fade" id="studentModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" onclick="refreshdata()" class="close" data-dismiss="modal">&times;</button>	
                <h4 class="modal-title">Faculty Information</h4>				
            </div>
            <div id="studentData" class="modal-body">
                <table id="listSingle"></table> <!--Grid table-->
                <div id="pagerSingle"></div>  <!--pagination div-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="studentDocModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>	
                <h4 class="modal-title">Faculty Document Listing</h4>				
            </div>
            <div id="studentDocData" class="modal-body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="studentImgModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>	
                <!-- <h4 id="studentDocTitle" class="modal-title">Student Document Image</h4>	 -->			
            </div>
            <div class="modal-body">
                <img id="studentDocSrc" src="https://www.w3schools.com/howto/img_fjords.jpg" style="width:100%">
            </div>
        </div>
    </div>
</div>




