<?php //print_r($enquiries) //foreach ($enquiries as $enquiry): ?>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
<link type="text/css" href="<?php echo base_url()?>jqgrid/css/ui.jqgrid.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url()?>jqgrid/css/jquery.searchFilter.css" rel="stylesheet" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jqgrid/i18n/grid.locale-en.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jqgrid/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jqgrid/jquery.layout.js"></script>



<style>
body.modal-open{
    width:100%!important;
    padding-right:0!important;
    overflow-y:scroll!important;
    position:fixed!important;
}
</style>

<?php
  $ci =& get_instance();
  $base_url = base_url();
?>

<table id="listtable"></table>
<div id="plisttable"></div>
<br />

<!-- <input type="button" value="Edit in Batch Mode" onclick="startEdit()" />
<input type="button" value="Save All Rows" onclick="saveRows()" />
<input type="button" value="Cancel Edit" onclick="cancelEdit()" /> -->

<script type="text/javascript">
       $(document).ready(function () {


var lastsel2; 
jQuery("#listtable").jqGrid({
  url:'<?php echo $base_url.'index.php/atc/coursesData'?>',
  mtype : "post", 
  datatype: "json",
  height: 'auto',
  rowNum: 9,
  rowList: [3,6,9],
    colNames:['Course ID','Atc Code', 'Course Name', 'Course Description', 'Status', 'Category', 'Course Modules', 'Category Description'],
    colModel:[
      {name:'row_id',index:'row_id', width:60, sorttype:"int"},
      {name:'entity_code',index:'entity_code', width:100, sorttype:"int"},
      {name:'course_name',index:'course_name', width:200, sorttype:"int"},
      {name:'course_description',index:'course_description', width:200, sorttype:"text", formatter:"text"},
      {name:'course_status',index:'course_status', width:60},  
      {name:'course_category',index:'course_category', width:100},              
      {name:'module_code',index:'module_code', width:100},   
      {name:'course_category_description',index:'course_category_description', width:200,align:"right",formatter:"text"}
    ],
    onCellSelect: function(rowid, iCol, cellcontent, e) {

        if(rowid && iCol == 6) {
          //alert("=========" + iCol);
            $.ajax({
              url:"<?php echo $base_url.'index.php/atc/getCourseModules'?>",
              type: "POST",
              data: {'id': rowid},
              dataType: 'html',
              success: function(resultdata) {
                $("#studentDocData").html(resultdata);
                $("#studentDocModal").modal('show');
              }
           });
        }
    },
    //editurl: "<?php echo $base_url.'index.php/cdac/enrollment_update'?>",
    postData:{q:1},
    pager: "#plisttable",
    viewrecords: true,
    sortname: 'row_id',
    grouping:true,
    groupingView : {
      groupField : ['entity_code'],
      groupColumnShow : [true],
      groupText : ['<b>{0} - {1} Item(s)</b>'],
    groupOrder: ['desc']      
    },
          rownumbers: true,
          gridview: true,
    //multiselect: true,
    caption: "Course Listing"
});
jQuery("#listtable").jqGrid('navGrid','#plisttable',{add:false,edit:false,del:false});



      });

  function startEdit() {
      var grid = $("#listtable");
      var selectedRecords;
      selectedRecords = jQuery("#listtable").jqGrid('getGridParam','selarrrow');

      var ids = grid.jqGrid('getDataIDs');

      for (var i = 0; i < selectedRecords.length; i++) {
          grid.jqGrid('editRow',selectedRecords[i]);
      }
  };

  function saveRows() {
       var grid = $("#listtable");
      var ids = grid.jqGrid('getDataIDs');

      for (var i = 0; i < ids.length; i++) {
          grid.jqGrid('saveRow', ids[i]);
      }
  }

  function cancelEdit() {
      var grid = $("#listtable");
      var ids = grid.jqGrid('getDataIDs');

      for (var i = 0; i < ids.length; i++) {
          grid.jqGrid('restoreRow', ids[i]);
      }
  }
    </script>

    <!-- Modal -->
  <div class="modal fade" id="studentDocModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title">Course Module Listing</h4>        
        </div>
        <div id="studentDocData" class="modal-body">
          
        </div>
      </div>
    </div>
  </div>