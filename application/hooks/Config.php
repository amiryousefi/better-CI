<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function set_configs()
    {
        reload_config();
    }
}