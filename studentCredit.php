<?
    include 'model/model.php';

    $page = 'student_credit';

    $programs = search('studyprogram');
    $i = 0;
    
    if (isset($_POST['credit']))
        $students = searchStudentsWithCredit($_POST['study_program'], $_POST['semester']); 

    include 'template/master.php';
?>