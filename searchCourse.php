<?
    include 'model/model.php';

    $page = 'search_course';

    if (isset($_POST['course']))
        $courses = searchCourse((isset($_POST['course_criteria']))? $_POST['course_criteria'] : '');

    include 'template/master.php';
?>