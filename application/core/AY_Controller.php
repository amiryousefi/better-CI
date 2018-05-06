<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AY_Controller extends CI_Controller
{
    public $name;
    public $modelName;
    public $libraryName;
    public $model;
    public $library;
    public $fields;

    public $pre_title;
    public $title;
    public $pre_form_add;
    public $pre_form_edit;
    public $pre_list;
    public $pre_search;
    public $singular_label;
    public $plural_label;

    public $form_view;
    public $list_view;

    public $data;
    public $extra_data;
    public $right_data;
    public $left_data;
    public $flash_data;
    public $view_type;

    public $pagination_config;

    public function __construct()
    {
        parent::__construct();

        $this->name = isset($this->name) ? $this->name : $this->router->class;

        $modelName = isset($this->modelName) ? $this->modelName : ucfirst($this->name) . "Entity";

        $libraryName = isset($this->libraryName) ? $this->libraryName : ucfirst($this->name) . "Library";

        if (file_exists(APPPATH . "models/" . $modelName . ".php")) {
            $this->load->model($modelName);
        } else {
            $modelName = "DefaultEntity";
            $this->load->model($modelName);
        }

        $this->model = $this->$modelName;
        $this->model->fields = $this->fields;

        if (file_exists(APPPATH . "libraries/" . $libraryName . ".php")) {
            $this->load->library($libraryName, $this->fields);
        } else {
            $libraryName = "DefaultLibrary";
            $this->load->library($libraryName, $this->fields);
        }

        $libraryName = strtolower($libraryName);
        $this->library = $this->$libraryName;

        $this->singular_label = isset($this->singular_label) ? $this->singular_label : $this->name;
        $this->plural_label = isset($this->plural_label) ? $this->plural_label : $this->name . "s";
        $this->pre_title = isset($this->pre_title) ? $this->pre_title : "مدیریت ";
        $this->title = isset($this->title) ? $this->title : $this->pre_title . $this->plural_label;
        $this->pre_form_add = isset($this->pre_form_add) ? $this->pre_form_add : "اضافه کردن ";
        $this->pre_form_edit = isset($this->pre_form_edit) ? $this->pre_form_edit : "ویرایش ";
        $this->pre_list = isset($this->pre_list) ? $this->pre_list : "لیست ";
        $this->pre_search = isset($this->pre_search) ? $this->pre_search : "جست‌وجوی ";

        $this->form_view = isset($this->form_view) ? $this->form_view : $this->name;
        $this->list_view = isset($this->list_view) ? $this->list_view : $this->name;

        $this->extra_data = isset($this->extra_data) ? $this->extra_data : array();
        $this->right_data = isset($this->right_data) ? $this->right_data : array();
        $this->left_data = isset($this->left_data) ? $this->left_data : array();
        @$this->flash_data = $this->session->flashdata();
        $this->view_type = $this->view_type();

        $this->pagination_config = array(
            'per_page' => 20,
            'prev_link' => '&lt; قبلی',
            'prev_tag_open' => '<li class="paginate_button previous" aria-controls="datatable-editable" tabindex="0">',
            'prev_tag_close' => '</li>',
            'next_link' => 'بعدی &gt;',
            'next_tag_open' => '<li class="paginate_button next" aria-controls="datatable-editable" tabindex="0">',
            'next_tag_close' => '</li>',
            'first_tag_open' => '<li class="paginate_button " aria-controls="datatable-editable" tabindex="0">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="paginate_button " aria-controls="datatable-editable" tabindex="0">',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="paginate_button active" aria-controls="datatable-editable" tabindex="0"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="paginate_button " aria-controls="datatable-editable" tabindex="0">',
            'num_tag_close' => '</li>',
        );
    }

    private function view_type()
    {
        if (!isset($this->view_type)) {
            if ($this->input->post("html")) {
                $this->view_type = "html";
            } elseif ($this->uri->segment(1) == "api") {
                $this->view_type = "json";
            }
        }
        return $this->view_type;
    }

    public function index($page = 0, $limit = 20)
    {
        $id = NULL;
        if ($this->view_type() == "json") {
            $page = $this->input->post("page") ? $this->input->post("page") : NULL;
            $limit = $this->input->post("limit") ? $this->input->post("limit") : NULL;
            $id = $this->input->post("id") ? $this->input->post("id") : NULL;
        }

        if (!isset($this->data)) {
            $data_list = $this->model->get($id, $limit, $page);
        } else {
            $data_list = $this->data;
        }

        if (method_exists($this->library, "list_prep")) {
            $this->data = $this->library->list_prep($data_list);
        } else {
            $this->data = $data_list;
        }


        if ($this->view_type() == "json") {
            if (count($this->data) > 0) {
                output(array(
                    "code" => 1,
                    "message" => "دریافت داده موفقیت آمیز بود",
                    "data" => $this->data
                ));
            } else {
                output(array(
                    "code" => 0,
                    "message" => "داده‌ای برای نمایش وجود ندارد",
                    "data" => $this->data
                ));
            }

            return;
        }

        $data_count = $this->model->count();

        $this->load->library('pagination');

        $this->pagination_config['base_url'] = base_url() . $this->name . '/index/';
        $this->pagination_config['total_rows'] = $data_count;
        if (count($_GET) > 0) $this->pagination_config['suffix'] = '?' . http_build_query($_GET, '', "&");

        $this->pagination->initialize($this->pagination_config);
        $pagination = $this->pagination->create_links();

        $this->set_extra();
        $this->pre_view($this->data, "index");
        $this->load->view('template', array(
            "data" => $this->data,
            "extra" => $this->extra_data,
            'header' => array("title" => $this->title, "sub_title" => $this->pre_list . $this->plural_label),
            'right_side' => $this->right_data,
            'left_side' => $this->left_data,
            'fields' => $this->fields,
            'list' => $this->list_view,
            'result' => $this->flash_data,
            "pagination" => $pagination,
        ));
    }

    public function search($page = 0)
    {
        $term = $this->input->get('s');

        $data_list = $this->model->search($term, 10, $page);
        $data_count = $this->model->search($term, FALSE);

        $this->load->library('pagination');

        $this->pagination_config['base_url'] = base_url() . $this->name . '/search/';
        $this->pagination_config['total_rows'] = $data_count;
        if (count($_GET) > 0) $this->pagination_config['suffix'] = '?' . http_build_query($_GET, '', "&");

        $this->pagination->initialize($this->pagination_config);
        $pagination = $this->pagination->create_links();

        if (method_exists($this->library, "list_prep")) {
            $this->data = $this->library->list_prep($data_list);
        } else {
            $this->data = $data_list;
        }

        $this->set_extra();
        $this->pre_view($this->data, "search");
        $this->load->view('template', array(
            'list' => $this->list_view,
            "data" => $this->data,
            "extra" => $this->extra_data,
            'header' => array("title" => $this->title, "sub_title" => $this->pre_search . $this->plural_label),
            'right_side' => $this->right_data,
            'left_side' => $this->left_data,
            'fields' => $this->fields,
            'result' => $this->flash_data,
            "pagination" => $pagination,
        ));
    }

    public function add()
    {
        $this->pre_add();
        if ($this->input->post()) {
            $result = $this->_create();
            if ($this->view_type() == "json") {
                output($result);
            } else {
                $this->flash_data = $result;
            }
        } else {
            if ($this->view_type() == "json") {
                output(array(
                        "code" => 0,
                        "message" => "هیچ داده ای برای ثبت ارسال نشده است"
                    )
                );
            }
        }

        $this->set_extra();

        $this->pre_view($this->data, "add");

        $this->load->view("template", array(
            "form" => $this->form_view,
            "form_url" => $this->name . "/add",
            "data" => $this->data,
            "extra" => $this->extra_data,
            'fields' => $this->fields,
            'header' => array("title" => $this->title, "sub_title" => $this->pre_form_add . $this->singular_label),
            'right_side' => $this->right_data,
            'left_side' => $this->left_data,
            "result" => $this->flash_data
        ));
    }

    public function edit($id)
    {
        $data = $this->model->get($id);

        if ($data && count($data) == 1) $this->data = $data[0];

        if ($this->input->post()) {
            $posted_id = $this->input->post("id");
            if (is_null($posted_id)) {
                $_POST['id'] = $id;
            }
            $result = $this->_edit();
            if ($this->view_type() == "json") {
                output($result);
            } else {
                $this->flash_data = $result;
            }
        } else {
            if ($this->view_type() == "json") {
                output(array(
                        "code" => 0,
                        "message" => "هیچ داده ای برای ثبت ارسال نشده است"
                    )
                );
            }
        }

        $this->set_extra();
        $this->pre_view($this->data, "edit");
        $this->load->view("template", array(
            "form" => $this->form_view,
            "form_url" => $this->name . "/edit/" . $id,
            "data" => $this->data,
            "extra" => $this->extra_data,
            'fields' => $this->fields,
            'header' => array("title" => $this->title, "sub_title" => $this->pre_form_edit . $this->singular_label),
            'right_side' => $this->right_data,
            'left_side' => $this->left_data,
            "result" => $this->flash_data
        ));
    }

    public function delete($id, $html = FALSE)
    {
        $this->pre_delete($id, $html);

        $this->view_type = "json";

        if ($this->model->delete($id)) {
            output(array(
                'code' => 1,
                'message' => $this->singular_label . " با موفقیت حذف شد."
            ), ($this->view_type != "json" ? $this->name . "/index" : FALSE)
            );
        } else {
            output(array(
                'code' => 0,
                'message' => "مشکلی در حذف " . $this->singular_label . " به وجود آمده است"
            ), ($this->view_type != "json" ? $this->name . "/index" : FALSE)
            );
        }
    }

    public function _create()
    {
        $form_data = $this->populate_form_data();

        if (method_exists($this->library, "data_prep")) {
            $data_prep = $this->library->data_prep($form_data, "add");
        } else {
            $data_prep = array("status" => TRUE, "data" => $form_data);
        }

        if ($data_prep['status'] === TRUE) {
            $add_result = $this->model->add($data_prep['data']);
            if ($add_result !== FALSE) {
                $this->post_create($data_prep['data'], $add_result);
                output(array(
                    'code' => 1,
                    'message' => $this->singular_label . " ایجاد شد",
                    'data' => array("id" => $add_result),
                ), ($this->view_type != "json" ? $this->name . '/index' : FALSE));
            } else {
                return array(
                    'code' => 3,
                    'message' => "داده‌ها معتبر به نظر می‌آیند اما مشکلی در ثبت اطلاعات وجود دارد",
                    'data' => $form_data
                );
            }
        } else {
            return array(
                'code' => 0,
                'message' => "داده‌های فرم نامعتبر هستند : " . $data_prep['message'],
                'data' => $form_data
            );
        }
    }

    public function _edit()
    {

        $form_data = $this->populate_form_data();

        $form_data['id'] = $this->input->post("id");

        $result = $this->pre_edit($form_data, $form_data['id']);
        if (is_array($result)) {
            $form_data = element("data", $result, $form_data);
        }
        if (method_exists($this->library, "data_prep")) {
            $data_prep = $this->library->data_prep($form_data, "edit");
        } else {
            $data_prep = array("status" => TRUE, "data" => $form_data);
        }

        if ($data_prep['status'] === TRUE) {
            $edit_result = $this->model->edit($data_prep['data']);
            if ($edit_result !== FALSE) {
                $this->post_edit($data_prep['data'], $edit_result);
                output(array(
                    'code' => 1,
                    'message' => $this->singular_label . " ویرایش شد",
                    'data' => array("id" => $edit_result),
                ), ($this->view_type != "json" ? $this->name . '/index' : FALSE));
            } else {
                return array(
                    'code' => 3,
                    'message' => "داده‌ها معتبر به نظر می‌آیند اما مشکلی در ثبت اطلاعات وجود دارد",
                    'data' => $form_data
                );
            }
        } else {
            return array(
                'code' => 0,
                'message' => "داده‌های فرم نامعتبر هستند : " . $data_prep['message'],
                'data' => $form_data
            );
        }
    }

    public function set_extra($data = array())
    {
        $this->extra_data = $data;
    }

    public function populate_form_data($redirect_url = "add")
    {
        $form_data = array();
        foreach ($this->fields as $field => $attr) {
            if ($attr['type'] == "image" || $attr['type'] == "file") {
                $file = $this->library->upload_file($field, $attr['config']);
                if ($file['code'] == 0) {
                    output(array(
                        'code' => "7",
                        'message' => "مشکلی در بارگذاری فایل به وجود آمده است" . $file['message'],
                        'data' => $this->input->post()
                    ), ($this->view_type != "json" ? $this->name . '/' . $redirect_url : FALSE));
                } else if ($file['code'] == 1) {
                    $form_data[$field] = $file['data'];
                }
            } elseif ($attr['type'] == "repeatable") {
                $repeating_fields = array_keys(element("fields", $attr, array()));
                foreach ($repeating_fields as $repeating_field) {
                    if ($this->input->post($repeating_field) != null) {
                        $repeating_field_datas = $this->input->post($repeating_field);
                        $temp_data = array();
                        if (is_array($repeating_field_datas)) {
                            foreach ($repeating_field_datas as $repeating_field_data) {
                                if ($repeating_field_data != "") {
                                    $temp_data[] = $repeating_field_data;
                                }
                            }
                        }
                        if (count($temp_data) > 0) {
                            $form_data[$repeating_field] = $temp_data;
                        }
                    } else {
                        unset($form_data[$repeating_field]);
                        break;
                    }
                }
            } else {
                if ($this->input->post($field) != null) {
                    $form_data[$field] = $this->input->post($field);
                }
            }
        }

        return $form_data;
    }

    public function pre_view($data, $method)
    {

    }

    public function post_create($data, $insert_id)
    {
    }

    public function pre_add()
    {
    }

    public function pre_edit($data, $updated_id)
    {
    }

    public function post_edit($data, $updated_id)
    {
    }

    public function pre_delete($id, $html, $extra_data = array())
    {
    }
}