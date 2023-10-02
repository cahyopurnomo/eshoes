<?php

if (!function_exists('send_email')) {
    function send_email($data) { 
        $email = \Config\Services::email();
        $email->setTo($data['to']);
        $email->setFrom('michelle@mioranetwork.com', 'Michelle Angela');
        
        $email->setSubject($data['subject']);
        $email->setMessage($data['message']);

        if ($email->send()) {
            return true;
        } else {
            $data = $email->printDebugger(['headers']);
            // print_r($data);
        }
    }
}