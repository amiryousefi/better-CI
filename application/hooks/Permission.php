<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission
{
    // A CI instance so we could use CI features we need
    private $CI;

    //Contains permission as explained
    private $permissions;

    // user called Class
    private $called_class;

    // user called method
    private $called_method;

    // Contains user session data
    private $userData;

    // to have permission check on API calls
    private $api_session;

    public function __construct()
    {
        $this->CI =& get_instance();

        // You can have any levels of permission you need;
        // Generally I assume there is three type of users: Guest, User, Administrator

        $this->permissions = array(
            array(// level 0; Guest Permissions
                "ControllerA" => array("method1", "method2"),
                "ControllerB" => array("method1", "method2"),
            ),
            array(// level 1; User Permissions
                "ControllerA" => array("method1", "method2"),
                "ControllerB" => array("method1", "method2"),
            ),
            array(// level 2; Administrative Permissions
                "ControllerA" => array("method1", "method2"),
                "ControllerB" => array("method1", "method2"),
            ),
        );

        $this->userData = $this->CI->session->userdata('logged_in');

        $this->called_class = $this->CI->router->class;
        $this->called_method = $this->CI->router->method;
        $this->api_session = get_api_session();
    }

    public function check()
    {
        $type = 0;
        if (is_api_call()) {
            if (isset($this->api_session)) {
                // check if api_session is valid
                $this->CI->load->model("UserEntity");
                $this->CI->UserEntity->get_criteria = array();
                $user = $this->CI->UserEntity->get_by_column("api_session", $this->api_session);
                if (count($user) == 1) {
                    if ($user[0]['status'] == 1) {
                        $type = $user[0]['type'];
                    } else {
                        noActive(null, FALSE);
                    }

                } else {
                    $type = 0;
                }
            } else {
                // no api session, go to api auth
                $type = 0;
            }
        }

        $CC = $this->called_class;
        $CM = $this->called_method;
        $P = $this->permissions;

        $level = is_numeric($this->userData['type']) ? $this->userData['type'] : $type;

        if (array_key_exists($CC, $P[$level]) && (in_array($CM, $P[$level][$CC]) || count($P[$level][$CC]) == 0)) {
            return TRUE;
        } else {
            if ($level == 0) {
                noSession(null, (is_api_call() ? FALSE : "user/login"));
            } elseif ($level == 2) {
                noPermit(null, (is_api_call() ? FALSE : "user/index"));
            } elseif ($level == 1) {
                noPermit(null, (is_api_call() ? FALSE : "page/index"));
            } else {
                noPermit(null, (is_api_call() ? FALSE : "user/index"));
            }
        }
    }

}