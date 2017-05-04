<?php
    include './model/model.php';

    $page = 'student_credit';

    $programs = search('studyprogram');

    $programs_assoc = [];

    
    if (isset($_POST['credit']))
    {               
        $payments = searchWithCriteria(search('payment'), [$_POST['study_program']], ['studentID']);
        $criterias = $_POST['semester'] == '2' ? ['-02-', '-03-', '-04-', '-05-', '-06-', '-07-'] : ['-01-', '-08-', '-09-', '-10-', '-11-', '-12-'];
        $payments = searchWithCriteria($payments, $criterias, ['dateofPayment']);

        // accumulate the payment
        $accumulated_payments = [];

        foreach ($payments as $p)
        {
            if (isset($accumulated_payments[$p['studentID']]))        
                $accumulated_payments[$p['studentID']]['amount'] = (intval($accumulated_payments[$p['studentID']]['amount']) + intval($p['amount'])).'';        
            else        
                $accumulated_payments[$p['studentID']] = $p;  
            
            $amount = intval($accumulated_payments[$p['studentID']]['amount']);
            $credit = ($amount > 2000000) ? (($amount - 2000000)/200000 ): 0;
            $accumulated_payments[$p['studentID']]['credit'] = $credit;      
        }    

         foreach ($programs as $p)
            $programs_assoc[$p['studyprogramID']] = $p;    
    }

    include './template/master.php';
?>