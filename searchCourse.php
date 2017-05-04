<?php
    include './model/model.php';

    $page = 'search_course';

    if (isset($_POST['course']))
    {
        $criteria = (isset($_POST['course_criteria']))? $_POST['course_criteria'] : '';
        $courses = searchWithCriteria(search('courses'), ($criteria === '' ? [] : [$criteria]), ['name', 'coursesID']);
    }

    include './template/master.php';
?>