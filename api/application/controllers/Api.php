<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function new_game() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
       /* echo json_encode(123);
        exit();*/
        $headers = getallheaders();
        $auth = explode(" ", $headers[Authorization]);
        $res_auth = check_auth($auth[1]);
        if ($res_auth) {
            if (isset($params)) {
                $res[id] = $params[app_id];
                $number = $this->Api_model->random_number();
                $res[write_file] = $this->Api_model->write_file($number, $res[id], $params[game]);
                $res[globle_best] = $this->Api_model->get_globle_best();
                $res[my_best] = $this->Api_model->get_my_best($res[id], $params[game]);
                echo json_encode($res);
            } else {
                $return[err] = "Please check your json from";
                echo json_encode($return);
            }
        } else {
            $return[err] = "Please check your Authorization";
            echo json_encode($return);
        }
    }

    public function start_game() {

        $params = json_decode(file_get_contents('php://input'), TRUE);
//        echo json_encode($params);
//        return;
        $headers = getallheaders();
        $auth = explode(" ", $headers[Authorization]);
        $res_auth = check_auth($auth[1]);
        if ($res_auth) {
            if (isset($params)) {
                $res[id] = $this->Api_model->get_num_file();
                $number = $this->Api_model->random_number();
                $res[write_file] = $this->Api_model->write_file($number, $res[id], $params[game]);
                $res[globle_best] = $this->Api_model->get_globle_best();
                $res[my_best] = $this->Api_model->get_my_best($res[id], $params[game]);
                
                echo json_encode($res);
            } else {
                $return[err] = "Please check your json from";
                echo json_encode($return);
            }
        } else {
            $return[err] = "Please check your Authorization";
            echo json_encode($return);
        }
    }

    public function select_card() {

        $params = json_decode(file_get_contents('php://input'), TRUE);
//        echo json_encode($params);
//        exit();
        $headers = getallheaders();
        $auth = explode(" ", $headers[Authorization]);
        $res_auth = check_auth($auth[1]);
        if ($res_auth) {
            if (isset($params)) {

                if ($params[couple] == 1) {
                    $res[data] = $this->Api_model->first_card($params);
                    $res[chk_coup] = 2;
                    echo json_encode($res);
                } else {
                    $res[data] = $this->Api_model->second_card($params);
                    $my_best[res] = false;
                    $globle[res] = false;
//                    $res[data][win] = 6;
                    if ($res[data][win] == MAX_WIN) {
                        $res_my_best = $this->Api_model->update_my_best($params);
                        $my_best[data] = $res_my_best;
                        $my_best[res] = true;
                        
                        $res_globle_best = $this->Api_model->update_globle_best($params);
                        $globle[data] = $res_globle_best;
                        $globle[res] = true;
                    }
                    $res[my_best] = $my_best;
                    $res[globle] = $globle;
                    $res[chk_coup] = 1;
                    echo json_encode($res);
                }
            } else {
                $return[err] = "Please check your json from";
                echo json_encode($return);
            }
        } else {
            $return[err] = "Please check your Authorization";
            echo json_encode($return);
        }
    }

    public function test() {
//        $res[id] = $this->Api_model->get_num_file();
//        $number = $this->Api_model->random_number();
//        $a = $this->Api_model->write_file($number, $res[id]);
//
//        $res[globle_best] = $this->Api_model->get_globle_best();
        $params[app_id] = 1;
        $params[game] = 2;
        $params[click] = 25;
//        $params[score] = 25;
        $res = $this->Api_model->update_globle_best($params);
        echo json_encode($res);
    }

}
