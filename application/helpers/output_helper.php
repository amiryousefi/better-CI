<?php defined('BASEPATH') OR exit('No direct script access allowed');

function output($json_array, $redirect = FALSE)
{
    $CI = &get_instance();

    if ($redirect == FALSE) {
        echo json_encode($json_array);
        die();
    } else {
        $CI->session->set_flashdata($json_array);

        if ($CI->input->get("redirect")) {
            redirect($CI->input->get("redirect"));
        } else {
            redirect($redirect);
        }

    }
}