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
  url:'<?php echo $base_url.'index.php/arc/courierData'?>',
  mtype : "post", 
  datatype: "json",
  height: 'auto',
  rowNum: 9,
  rowList: [3,6,9],
    colNames:['Courier ID','Docket Code','Carrier Name', 'Url', 'Requesting Entity', 'Requested Entity', 'Status', 'Package Sent Date', 'Details', 'Comment', 'Receive Date', 'Created By'],
    
    colModel:[
      {name:'row_id',index:'row_id', width:50, sorttype:"text"},
      {name:'docket_code',index:'docket_code', width:100, sorttype:"text", formatter:"text"},
      //{name:'carrier_code',index:'carrier_code', width:50}, 

      {name:'carrier_name',index:'carrier_name', width:100}, 
      {name:'url',index:'url', width:100}, 

      //{name:'requesting_entity_type',index:'requesting_entity_type', width:50},         
      {name:'requesting_entity_code',index:'requesting_entity_code', width:100},   
      //{name:'requested_entity_type',index:'requested_entity_type', width:50,align:"right",formatter:"text"},
      {name:'requested_entity_code',index:'requested_entity_code', width:100,align:"right",formatter:"text"},

      {name:'courier_status',index:'courier_status', width:100, sorttype:"text"},
      {name:'package_sent_dt',index:'package_sent_dt', width:100, sorttype:"text", formatter:"text"},
      {name:'package_content_details',index:'package_content_details', width:100}, 
      {name:'comments',index:'comments', width:100},         
      {name:'package_received_dt',index:'package_received_dt', width:100}, 

      {name:'created_by',index:'created_by', width:100, sorttype:"text"},
      //{name:'created_dt',index:'created_dt', width:50, sorttype:"text", formatter:"text"},
      //{name:'modified_by',index:'modified_by', width:50}, 
      //{name:'modified_dt',index:'modified_dt', width:50}, 
    ],
    //editurl: "<?php echo $base_url.'index.php/arc/centers'?>",
    postData:{q:1},
    pager: "#plisttable",
    viewrecords: true,
    sortname: 'row_id',
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