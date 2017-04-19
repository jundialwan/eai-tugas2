<?php


function search($service)
{
    $base_uri = 'http://103.200.7.153/restws/rs_rest_services.php/';
    $uri = $base_uri.$service.'/';
    $result = file_get_contents($uri);
    $result_decoded = json_decode($result, true);

    return $result_decoded['success']['result'];
}

function searchWithCriteria($arr, $criterias, $attributes)
{    
    if (count($criterias) != 0)    
    {
        $result = [];        
        
        foreach ($arr as $a)
        {         
            foreach ($criterias as $c)              
            {
                foreach ($attributes as $att)                         
                {
                    if (stripos($a[$att], $c) !== false)
                    {
                        array_push($result, $a);
                        break;
                    }
                }        
            }
        }        
       
        return $result;
    }
    else
    {
        return $arr;
    }
}

function searchStudent($criteria)
{
    $all = search('student');
    return searchWithCriteria($all, ($criteria === '' ? [] : [$criteria]), ['name', 'studentID']);
}

function searchCourse($criteria)
{    
    $all = search('courses');
    return searchWithCriteria($all, ($criteria === '' ? [] : [$criteria]), ['name', 'coursesID']);
}

function searchStudentsWithCredit($program, $semester)
{
    $payments = search('payment');
    $payments = searchWithCriteria($payments, [$program], ['studentID']);

    $criterias = $semester == '2' ? ['-02-', '-03-', '-04-', '-05-', '-06-', '-07-'] : ['-01-', '-08-', '-09-', '-10-', '-11-', '-12-'];
    $payments = searchWithCriteria($payments, $criterias, ['dateofPayment']);
    
    // accumulate the payment
    $accumulated_payments = [];

    foreach ($payments as $p)
    {
        if (isset($accumulated_payments[$p['studentID']]))        
            $accumulated_payments[$p['studentID']]['amount'] = (intval($accumulated_payments[$p['studentID']]['amount']) + intval($p['amount'])).'';        
        else        
            $accumulated_payments[$p['studentID']] = $p;        
    }    

    // identify max credit
    foreach ($accumulated_payments as &$a)
    {
        $amount = intval($a['amount']);
        $credit = ($amount > 2000000) ? (($amount - 2000000)/200000 ): 0;
        $a['credit'] = $credit;
    }

    unset($a);

    return $accumulated_payments;
}