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
            <li role="presentation" class="<?php echo $page === 'about' ? 'active' : ''; ?>">
              <a href="index.php" role="tab">About</a>
            </li>
            <li role="presentation" class="<?php echo $page === 'search_student' ? 'active' : ''; ?>">
              <a href="searchStudent.php" role="tab">Search Student</a>
            </li>
            <li role="presentation" class="<?php echo $page === 'search_course' ? 'active' : ''; ?>">
              <a href="searchCourse.php" role="tab">Search Course</a>
            </li>
            <li role="presentation" class="<?php echo $page === 'student_credit' ? 'active' : ''; ?>">
              <a href="studentCredit.php" role="tab">Student Credit</a>
            </li>         
          </ul>

          <div class="tab-content">
            <?php include 'template/'.$page.'.php'; ?>                        
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.2.1.min.js" defer></script>
    <script src="js/bootstrap.min.js" defer></script>    
</body>
</html>