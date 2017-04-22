<div role="tabpanel" class="tab-pane active" id="credit">
  <form action="#" method="POST" class="form-horizontal">
    <input type="hidden" name="credit" value="1">
    <div class="form-group">
      <label for="study_program" class="col-md-2 control-label">Study Program</label>
      <div class="col-md-10">
        <select name="study_program" id="study_program" class="form-control" required>                  
          <option value="" selected disabled>-- Select study program below --</option>
          <? foreach ($programs as $p): ?>
          <option value="<? echo $p['studyprogramID']; ?>"><? echo $p['name']; ?></option>
          <? endforeach; ?>
        </select>                  
      </div>
    </div>
    <div class="form-group">
      <label for="semester" class="col-md-2 control-label">Semester</label>
      <div class="col-md-10">
        <select name="semester" id="semester" class="form-control" required>                  
          <option value="" selected disabled>-- Select semester below --</option>
          <option value="1">2016/2017 - 1</option>
          <option value="2">2016/2017 - 2</option>
        </select>                  
      </div>
    </div>
    <button class="btn btn-primary btn-block">Search</button>
  </form>
  <br>

  <? if (isset($_POST['credit'])): ?>
    <div class="alert alert-info" role="alert">Found <? echo count($accumulated_payments) ?> student(s) for <? echo $programs_assoc[$_POST['study_program']]['name']; ?> study program on 2016/2017 - <? echo $_POST['semester']; ?> term</div>  
  <? endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Total Payment</th>
        <th>Maximum Credit</th>                    
      </tr>
    </thead>
    <tbody>
      <? if (isset($_POST['credit'])): ?>        
        <? if (count($accumulated_payments) > 0): ?>
          <? $i = 0; ?>
          <? foreach ($accumulated_payments as $k => $v): ?>

            <tr>
              <td><? echo $i+1; ?></td>
              <td><? echo $v['studentID']; ?></td>
              <td><? echo $v['name']; ?></td>
              <td><? echo $v['amount']; ?></td>
              <td><? echo $v['credit']; ?></td>
            </tr>

            <? $i++; ?>
          <? endforeach; ?>
        <? else: ?>
          <tr>
            <td colspan="4" class="text-center">No students found in given criteria</td>
          </tr>
        <? endif; ?> 
      <? else: ?>
        <tr>
          <td colspan="4" class="text-center">No data to display</td>
        </tr>
      <? endif; ?>
    </tbody>
  </table>
</div>