<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefaultEntity extends AY_Model
{
    public function __construct()
    {
        $this->DB = isset($this->DB) ? $this->DB : $this->router->class;

        $this->fields = array();

        $this->search_in_fields = array();

        $this->get_criteria = array();
        $this->search_criteria = array();
        $this->count_criteria = array();

        $this->get_related = FALSE;
        $this->order = FALSE;
        parent::__construct();
    }

    public function init($DB = NULL)
    {
        $this->DB = $DB;

        $this->fields = array();
        $this->select = "*";
        $this->search_in_fields = array();

        $this->get_criteria = array();
        $this->search_criteria = array();
        $this->count_criteria = array();

        $this->get_related = FALSE;
        $this->order = FALSE;

        $this->like_criteria = NULL;
        $this->where_in_criteria = NULL;
    }

}