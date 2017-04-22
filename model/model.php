<?php


function search($service)
{    
    $uri = 'http://103.200.7.153/restws/rs_rest_services.php/'.$service.'/';
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