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
  url:'<?php echo $base_url.'index.php/arc/atcData'?>',
  mtype : "post", 
  datatype: "json",
  height: 'auto',
  rowNum: 9,
  rowList: [3,6,9],
    colNames:['Atc Code','Atc Name','Grade', 'Arc', 'Status', 'Address 1', 'Address 2', 'City', 'Postcode', 'Contact', 'Email', 'Created By'],
    colModel:[
      {name:'entity_code',index:'entity_code', width:60, sorttype:"text"},
      {name:'entity_name',index:'entity_name', width:200, sorttype:"text", formatter:"text"},
      {name:'entity_grade',index:'entity_grade', width:60, sorttype:"text", formatter:"text"},
      {name:'entity_parent_code',index:'entity_parent_code', width:60}, 
      {name:'entity_status',index:'entity_status', width:60},         
      {name:'entity_address_line1',index:'entity_address_line1', width:200},   
      {name:'entity_address_line2',index:'entity_address_line2', width:200, sorttype:"text", formatter:"text"},
      {name:'entity_address_city',index:'entity_address_city', width:60, sorttype:"text", formatter:"text"},
      {name:'entity_address_postcode',index:'entity_address_postcode', width:60}, 
      {name:'entity_contact_number',index:'entity_contact_number', width:60},         
      {name:'entity_contact_email',index:'entity_contact_email', width:80},   
      {name:'created_by',index:'created_by', width:60,align:"right",formatter:"text"}
    ],

    //editurl: "<?php echo $base_url.'index.php/cdac/centers'?>",
    postData:{q:1},
    pager: "#plisttable",
    viewrecords: true,
    sortname: 'entity_code',
    grouping:true,
    /*groupingView : {
      groupField : ['module_code'],
      groupColumnShow : [true],
      groupText : ['<b>{0} - {1} Item(s)</b>'],
    groupOrder: ['desc']      
    },
    */
    //multiselect: true,
    caption: "ATC Listing"
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
  <div class="modal fade" id="studentModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title">Course Information</h4>        
        </div>
        <div id="studentData" class="modal-body">
          
        </div>
      </div>
    </div>
  </div