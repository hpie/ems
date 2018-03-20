
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

<input type="button" value="Edit in Batch Mode" onclick="startEdit()" />
<input type="button" value="Save All Rows" onclick="saveRows()" />
<input type="button" value="Cancel Edit" onclick="cancelEdit()" />

<script type="text/javascript">
       $(document).ready(function () {


var lastsel2; 
jQuery("#listtable").jqGrid({
  url:'<?php echo $base_url.'index.php/arc/loadBookIssueData'?>',
  mtype : "post", 
  datatype: "json",
  height: 'auto',
  rowNum: 9,
  rowList: [3,6,9],
    colNames:['Book Issue ID','Stdent ID', 'Entity', 'Course','Module','Book','Issue Status', 'Issue Date','Created By','Created Date','Modified By','Modified Date'],
    colModel:[
      {name:'row_id',index:'row_id', width:60, sorttype:"int"},
      {name:'student_id',index:'student_id', width:90, sorttype:"text", formatter:"text"},
      {name:'entity_code',index:'entity_code', width:100},
      {name:'course_code',index:'course_code', width:80, align:"right",sorttype:"text", formatter:"text"},
      {name:'module_code',index:'module_code', width:80, align:"right",sorttype:"text"},    
      {name:'book_code',index:'book_code', width:80,align:"right",sorttype:"text"},   
      {name:'issue_status',index:'issue_status', width:150, editable:true, edittype:"checkbox",editoptions: {value:"Issued:P"}},
      {name:'book_issue_dt',index:'book_issue_dt', width:80, align:"right", sorttype:"date", formatter:"date"},   
      {name:'created_by',index:'created_by', width:80,align:"right",formatter:"text"},    
      {name:'created_dt',index:'created_dt', width:150, sorttype:"date", formatter:"date"},
      {name:'modified_by',index:'modified_by', width:80,align:"right",formatter:"text"},    
      {name:'modified_dt',index:'modified_dt', width:150, sorttype:"date", formatter:"date"}    
    ],
    /*
    onSelectRow: function(id) {
      var s;
      s = jQuery("#listtable").jqGrid('getGridParam','selarrrow');
      alert('------------' + s);
      if(id && id!==lastsel2){
        jQuery('#listtable').jqGrid('restoreRow',lastsel2);
        jQuery('#listtable').jqGrid('editRow',id,true);
        lastsel2=id;
      }
    },
    */
    editurl: "<?php echo $base_url.'index.php/arc/book_issue_update'?>",
    postData:{q:1},
    pager: "#plisttable",
    viewrecords: true,
    sortname: 'row_id',
    grouping:true,
    groupingView : {
      groupField : ['student_id'],
      groupColumnShow : [true],
      groupText : ['<b>{0} - {1} Item(s)</b>'],
    groupOrder: ['desc']      
    },
    multiselect: true,
    caption: "Initially hidden data"
});
jQuery("#listtable").jqGrid('navGrid','#plisttable',{add:true,edit:true,del:true});



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
          <h4 class="modal-title">Student Information</h4>        
        </div>
        <div id="studentData" class="modal-body">
          
        </div>
      </div>
    </div>
  </div