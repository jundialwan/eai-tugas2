<div role="tabpanel" class="tab-pane active" id="credit">
  <form action="#" method="POST" class="form-horizontal">
    <input type="hidden" name="credit" value="1">
    <div class="form-group">
      <label for="study_program" class="col-md-2 control-label">Study Program</label>
      <div class="col-md-10">
        <select name="study_program" id="study_program" class="form-control" required>                  
          <option value="" selected disabled>-- Select study program below --</option>
          <?php foreach ($programs as $p): ?>
          <option value="<?php echo $p['studyprogramID']; ?>"><?php echo $p['name']; ?></option>
          <?php endforeach; ?>
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

  <?php if (isset($_POST['credit'])): ?>
    <div class="alert alert-info" role="alert">Found <?php echo count($accumulated_payments) ?> student(s) for <?php echo $programs_assoc[$_POST['study_program']]['name']; ?> study program on 2016/2017 - <?php echo $_POST['semester']; ?> term</div>  
  <?php endif; ?>

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
      <?php if (isset($_POST['credit'])): ?>        
        <?php if (count($accumulated_payments) > 0): ?>
          <?php $i = 0; ?>
          <?php foreach ($accumulated_payments as $k => $v): ?>

            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $v['studentID']; ?></td>
              <td><?php echo $v['name']; ?></td>
              <td><?php echo $v['amount']; ?></td>
              <td><?php echo $v['credit']; ?></td>
            </tr>

            <?php $i++; ?>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center">No students found in given criteria</td>
          </tr>
        <?php endif; ?> 
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center">No data to display</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>