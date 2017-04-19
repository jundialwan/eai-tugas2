<?
    include 'model/model.php';

    $page = 'student_credit';

    $programs = search('studyprogram');

    include 'template/master.php';
?>