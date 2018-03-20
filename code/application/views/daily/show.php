<h1>Daily Notes</h1>
<table >
 <tr >
 <th>No</th>
 <th>Student ID</th>
 <th>Course</th>
 <th>Book</th>
 <th>Issue Date</th>
 <th>Issue Status</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>
 <?php
 $i=0;
 foreach ($query as $row){
 $i++;
 echo "<tr class=\"record\">";
 echo    "<td>$i</td>";
 echo    "<td>$row->student_id</td>";
 echo    "<td>$row->course_code</td>";
 echo    "<td>$row->book_code</td>";
 echo    "<td>$row->book_issue_dt</td>";
 echo    "<td>$row->issue_status</td>";
 echo    "<td><a href=\"#\" class=\"edit\" id=\"$row->row_id\" date=\"$row->date\" name=\"$row->name\" amount=\"$row->amount\">Edit</a></td>";
 echo    "<td><a class=\"delbutton\" id=\"$row->row_id\" href=\"#\" >Delete</a></td>";
 echo  "</tr>";
 }
 ?>
</table>
