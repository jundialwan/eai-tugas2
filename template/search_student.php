<div role="tabpanel" class="tab-pane active" id="student">              
  <form action="#" method="POST" class="form-horizontal">                                                
    <input type="hidden" name="student" value="1" />
    <div class="input-group">
      <div class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
      </div>
      <input type="text" class="form-control" name="student_criteria" id="student_criteria" placeholder="Type student ID or student name and press ENTER" />
    </div>                                
  </form>
  <br>

  <?php if (isset($_POST['student'])): ?>
    <div class="alert alert-info" role="alert">Found <?php echo count($students) ?> student(s) for terms '<?php echo $_POST['student_criteria']; ?>' on student ID and student name</div>  
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Gender</th>
        <th>Birthdate</th>
        <th>Accepted Year</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($_POST['student'])): ?>        
        <?php if (count($students) > 0): ?>
          <?php for($i=0; $i<count($students); $i++): ?>

            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $students[$i]['studentID']; ?></td>
              <td><?php echo $students[$i]['name']; ?></td>
              <td><?php echo ($students[$i]['gender'] === 'F') ? 'Female' : 'Male'; ?></td>
              <td><?php echo $students[$i]['birthdate']; ?></td>
              <td><?php echo $students[$i]['acceptedYear']; ?></td>
            </tr>

          <?php endfor; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">No student found in given criteria</td>
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