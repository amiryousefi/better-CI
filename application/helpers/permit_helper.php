<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function noPermit($json_array = null, $redirect = "user/index")
{
    $CI = &get_instance();
    if ($json_array === null)
        $json_array = array(
            'code' => "3",
            'message' => "دسترسی شما به صفحه یا عملکرد قبلی محدود شده است"
        );
    if ($redirect == FALSE) {
        echo json_encode($json_array);
    } else {
        $CI->session->set_flashdata($json_array);
        redirect($redirect);
    }
    die();
    return FALSE;
}

function noActive($json_array = null, $redirect = "user/login")
{
    $CI = &get_instance();
    if ($json_array === null)
        $json_array = array(
            'code' => "3",
            'message' => "حساب کاربری شما غیرفعال شده است"
        );
    if ($redirect == FALSE) {
        echo json_encode($json_array);
    } else {
        $CI->session->set_flashdata($json_array);
        redirect($redirect);
    }
    die();
    return FALSE;
}

function noSession($json_array = null, $redirect = "user/login")
{
    $CI = &get_instance();
    if ($json_array === null)
        $json_array = array(
            'code' => "0",
            'message' => "برای دسترسی به این عملکرد ابتدا وارد شوید."
        );
    if ($redirect == FALSE) {
        echo json_encode($json_array);
    } else {
        $CI->session->set_flashdata($json_array);
        redirect($redirect);
    }
    die();
    return FALSE;
}

function is_api_call()
{
    $CI = &get_instance();
    if ($CI->uri->segment(1) == "api") {
        return TRUE;
    }
    return FALSE;
}

function get_api_session()
{
    $CI = &get_instance();
    return $CI->input->get_request_header("api_session") ? $CI->input->get_request_header("api_session") : $CI->input->get_request_header("api-session");

}