<?php


function search($service)
{
    $base_uri = 'http://103.200.7.153/restws/rs_rest_services.php/';
    $uri = $base_uri.$service;
    $result = file_get_contents($uri);
    $result_decoded = json_decode($result, true);

    return $result_decoded['success']['result'];
}

function searchWithCriteria($service, $criteria, $attributes) 
{
    $all = search($service, '');
    $result = [];
    
    foreach ($all as $a)
    {
        $match = false;

        foreach ($attributes as $att)        
            if (!strpos(strtoupper($a[$att]), strtoupper($criteria)))
                $match = true; break;
        
        if ($match)
            array_push($result, $a);        
    }

    return $result;
}

function searchStudent($criteria)
{
    return searchWithCriteria('student', $criteria, ['name', 'studentID']);
}

function searchCourse($criteria)
{
    return searchWithCriteria('course', $criteria, ['name', 'courseID']);
}