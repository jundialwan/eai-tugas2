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
  
  <?php if (isset($_POST['course'])): ?>
    <div class="alert alert-info" role="alert">Found <?php echo count($courses) ?> course(s) for terms '<?php echo $_POST['course_criteria']; ?>' on course ID and course name</div>  
  <?php endif; ?>

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
      <?php if(isset($_POST['course'])): ?>        
        <?php if (count($courses) > 0): ?>
          <?php for($i=0; $i<count($courses); $i++): ?>

            <tr>
              <td><?php echo $i+1; ?></td>                            
              <td><?php echo $courses[$i]['coursesID']; ?></td>
              <td><?php echo $courses[$i]['name']; ?></td>                            
              <td><?php echo $courses[$i]['semester']; ?></td>
            </tr>

          <?php endfor; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">No course found in given criteria</td>
          </tr>
        <?php endif; ?> 
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">No data to display</td>
        </tr>
      <?php endif; ?>                                                         
    </tbody>
  </table>
</div>