<? require 'base.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Enterprise Application Integration - Assignment 2: Web Services</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-md-offset-2">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#student" aria-controls="student" role="tab" data-toggle="tab">Search Student</a>
            </li>
            <li role="presentation">
              <a href="#course" aria-controls="course" role="tab" data-toggle="tab">Search Course</a>
            </li>
            <li role="presentation">
              <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a>
            </li>         
          </ul>

          <div class="tab-content">
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
                    <? $students = searchStudent($_POST['student_criteria']); ?>
                    <? if (count($students) > 0): ?>
                      <? for($i=0; $i<count($students); $i++): ?>

                        <tr>
                          <td><? echo $i; ?></td>
                          <td><? echo $students[$i]['studentID']; ?></td>
                          <td><? echo $students[$i]['name']; ?></td>
                          <td><? echo ($students[$i]['gender'] === 'F') ? 'Female' : 'Male'; ?></td>
                          <td><? echo $students[$i]['birthdate']; ?></td>
                          <td><? echo $students[$i]['acceptedYear']; ?></td>
                        </tr>

                      <? endfor; ?>
                    <? else: ?>
                      <tr>
                        <td colspan="4">No student found in given criteria</td>
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

            <div role="tabpanel" class="tab-pane" id="course">
              <form action="" method="POST" class="form-horizontal">
                <input type="hidden" name="course" value="1">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" nama="course_criteria" id="course_criteria" placeholder="Type course ID or course name and press ENTER" />
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
                    <? $courses = searchCourse($_POST['course_criteria']); ?>
                    <? if (count($courses) > 0): ?>
                      <? for($i=0; $i<count($courses); $i++): ?>

                        <tr>
                          <td><? echo $i; ?></td>                            
                          <td><? echo $courses[$i]['courseID']; ?></td>
                          <td><? echo $courses[$i]['gender']; ?></td>                            
                          <td><? echo $courses[$i]['acceptedYear']; ?></td>
                        </tr>

                      <? endfor; ?>
                    <? else: ?>
                      <tr>
                        <td colspan="4">No student found in given criteria</td>
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
            <div role="tabpanel" class="tab-pane" id="messages">
              <!--DataTables Shit Here-->
              Whatever
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.2.1.min.js" defer></script>
    <script src="js/bootstrap.min.js" defer></script>    
</body>
</html>