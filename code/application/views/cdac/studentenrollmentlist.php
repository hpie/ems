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
  url:'<?php echo $base_url.'index.php/cdac/enrolledCourseData'?>',
  mtype : "post", 
  datatype: "json",
  height: 'auto',
  rowNum: 9,
  rowList: [3,6,9],
   colNames:['Enroll ID', 'Student ID', 'Course Name','Description','Category', 'Category Description','Start Date','End Date','Enrollment Type', 'Status','Created By', 'Created Date','Modified By', 'Modified Date'],
    colModel:[
      {name:'enrollment_id',index:'enrolment_id', width:60, sorttype:"int"},
      {name:'student_id',index:'student_id', width:90, sorttype:"text", formatter:"text"},
      //{name:'course_code',index:'course_code', width:100},
      {name:'course_name',index:'course_name', width:100},
      {name:'course_description',index:'course_description', width:80, align:"right"},   
      {name:'course_category',index:'course_category', width:80,align:"right",formatter:"text"},    
      {name:'course_category_description',index:'course_category_description', width:100}, 

      {name:'start_dt',index:'start_dt', width:80, align:"right", formatter:"date"},
      {name:'end_dt',index:'end_dt', width:80, align:"right",formatter:"date"},    
      {name:'enrollment_type',index:'enrollment_type', width:80,align:"right",sorttype:"text"},   
      
      {name:'status',index:'status', width:100, editable:true, edittype:"select",editoptions: {value:"ong:On Going; completed:Completed; upgraded:Upgraded;dropped:Dropped"}},
      {name:'created_by',index:'created_by', width:80, align:"right"},   
      {name:'created_dt',index:'created_dt', width:80,align:"right",formatter:"date"},    
      {name:'modified_by',index:'modified_by', width:100, sorttype:"date", formatter:"date"},
      {name:'modified_dt',index:'modified_dt', width:100, sorttype:"date", formatter:"date"},       
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
    editurl: "<?php echo $base_url.'index.php/cdac/enrollment_update'?>",
    postData:{q:1},
    pager: "#plisttable",
    viewrecords: true,
    sortname: 'enrolment_id',
    grouping:true,
    groupingView : {
      groupField : ['student_id'],
      groupColumnShow : [true],
      groupText : ['<b>{0} - {1} Item(s)</b>'],
    groupOrder: ['desc']      
    },
    multiselect: true,
    caption: "Student Course Enrollments List"
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