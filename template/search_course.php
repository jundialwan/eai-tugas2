<div role="tabpanel" class="tab-pane active" id="course">
  <form action="#" method="POST" class="form-horizontal">
    <input type="hidden" name="course" value="1">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
      </div>
      <input type="text" class="form-control" name="course_criteria" id="course_criteria" placeholder="Type course ID or course name and press ENTER" />
    </div>                                
  </form>
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Semester</th>                    
      </tr>
    </thead>
    <tbody>                  
      <? if(isset($_POST['course'])): ?>        
        <? if (count($courses) > 0): ?>
          <? for($i=0; $i<count($courses); $i++): ?>

            <tr>
              <td><? echo $i+1; ?></td>                            
              <td><? echo $courses[$i]['coursesID']; ?></td>
              <td><? echo $courses[$i]['name']; ?></td>                            
              <td><? echo $courses[$i]['semester']; ?></td>
            </tr>

          <? endfor; ?>
        <? else: ?>
          <tr>
            <td colspan="6" class="text-center">No course found in given criteria</td>
          </tr>
        <? endif; ?> 
      <? else: ?>
        <tr>
          <td colspan="6" class="text-center">No data to display</td>
        </tr>
      <? endif; ?>                                                         
    </tbody>
  </table>
</div>