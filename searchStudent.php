<?
    include 'model/model.php';

    $page = 'search_student';

    if (isset($_POST['student']))
        $students = searchStudent((isset($_POST['student_criteria'])) ? $_POST['student_criteria'] : '');

    include 'template/master.php';
?>