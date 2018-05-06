<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefaultLibrary
{
    public $CI;
    public $fields;
    public $add_data;
    public $edit_data;

    public $error_delimiter;

    public function __construct($params = array())
    {
        $this->CI = &get_instance();
        $this->fields = $params;

        $this->add_data = isset($this->add_data) ? $this->add_data : array();
        $this->edit_data = isset($this->edit_data) ? $this->edit_data : array();

        $this->error_delimiter = isset($this->error_delimiter) ? $this->error_delimiter : array("<p>", "</p>");
    }

    public function init($params)
    {
        $this->fields = $params;
    }

    public function data_prep($data, $type = "add")
    {
        if ($type == "add") {
            $data_with_meta = $this->add_metadata($data);
        } else if ($type == "edit") {
            $data_with_meta = $this->edit_metadata($data);
        }
        $prepped_data = $this->data_validator($data_with_meta);
        return $prepped_data;
    }

    public function list_prep($data, $type = "index")
    {
        return $data;
    }

    public function add_metadata($data)
    {
        foreach ($this->add_data as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

    public function edit_metadata($data)
    {
        foreach ($this->edit_data as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

    public function upload_file($field_name = "image", $config = array("upload_path" => "./upload", "allowed_types" => "jpg|png", "max_size" => 200))
    {
        $upload_config = array(
            "upload_path" => $config['upload_path'],
            "allowed_types" => $config['allowed_types'],
            "max_size" => $config['max_size']
        );

        $file_name = element('file_name', $config, FALSE);
        if ($file_name !== FALSE) {
            $upload_config['file_name'] = $file_name;
        }
        $upload_config['overwrite'] = element('overwrite', $config, FALSE);

        $this->CI->load->library('upload', $upload_config);
        if (@$_FILES[$field_name]['name'] != "") {
            if (!$this->CI->upload->do_upload($field_name)) {
                $error = $this->CI->upload->display_errors();
                return array("code" => 0, "message" => $error, "data" => FALSE);
            } else {
                $data = $this->CI->upload->data();

                $name = $data['file_name'];
            }
        } else {
            return array("code" => 3, "message" => "فایلی ارسال نشده است", "data" => NULL);
        }

        return array("code" => 1, "message" => "فایل با موفقیت آپلود شد", "data" => $name);
    }

    public function prep_file_url($file, $upload_path)
    {
        //for consistency $upload_path should contain slash(/)
        return base_url() . "upload/" . $upload_path . $file;
    }

    public function data_validator($form_data)
    {
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_data($form_data);
        foreach ($this->fields as $field => $attr) {

            if (isset($attr['rules'])) {
                $rules = "trim|" . $attr['rules'];
            } else {
                $rules = "trim";
            }
            $field_name = $field;
            $config = element("config", $attr, FALSE);
            if ($config !== FALSE && element("multiple", $config, FALSE) !== FALSE) {
                $field_name .= "[]";
            }

            $rules_extra = element("rules_extra", $attr, array());

            if (element("label", $attr, FALSE) !== FALSE) {
                $this->CI->form_validation->set_rules($field_name, $attr['label'], $rules, $rules_extra);
            }
        }

        if ($this->CI->form_validation->run() == FALSE) {
            return (array(
                "status" => FALSE,
                "message" => validation_errors($this->error_delimiter[0], $this->error_delimiter[1]),
                "data" => $form_data
            ));
        } else {
            return (array(
                "status" => TRUE,
                "message" => "داده‌های فرم معتبر هستند",
                "data" => $form_data
            ));
        }
    }
}