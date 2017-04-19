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
      <? if (isset($_POST['student'])): ?>        
        <? if (count($students) > 0): ?>
          <? for($i=0; $i<count($students); $i++): ?>

            <tr>
              <td><? echo $i+1; ?></td>
              <td><? echo $students[$i]['studentID']; ?></td>
              <td><? echo $students[$i]['name']; ?></td>
              <td><? echo ($students[$i]['gender'] === 'F') ? 'Female' : 'Male'; ?></td>
              <td><? echo $students[$i]['birthdate']; ?></td>
              <td><? echo $students[$i]['acceptedYear']; ?></td>
            </tr>

          <? endfor; ?>
        <? else: ?>
          <tr>
            <td colspan="6" class="text-center">No student found in given criteria</td>
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