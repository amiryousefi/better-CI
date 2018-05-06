<?php defined('BASEPATH') OR exit('No direct script access allowed');

function reload_config()
{
    $CI = &get_instance();

    $CI->load->model("DefaultEntity", "DE");
    $CI->DE->init("options");
    $options = $CI->DE->get();
    foreach ($options as $option) {
        $CI->config->set_item($option['key'], $option['value']);
    }
}