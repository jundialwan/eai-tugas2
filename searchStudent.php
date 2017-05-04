<?php
    include './model/model.php';

    $page = 'search_student';

    if (isset($_POST['student']))
    {
        $criteria = (isset($_POST['student_criteria'])) ? $_POST['student_criteria'] : '';
        $students = searchWithCriteria(search('student'), ($criteria === '' ? [] : [$criteria]), ['name', 'studentID']);        
    }

    include './template/master.php';
?>