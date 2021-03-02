<?php

class Api_model extends CI_Model {

    //public $name;
    //public $description;

    public function __construct() {
        parent::__construct();
    }

    /*
     * 
     * 	Function Main use multi pages
     * 
     * @return
     */

    // ==============================================================================================
    public function new_game() {
        $url = base_other_url('api')."api/new_game";

        $ch = curl_init($url);
        $data = array(
            'app_id' => $_POST[id],
            'post_date' => date('Y-m-d H:i:s'),
            'game' => $_POST[game]
        );
        $fields = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4',
            'Api-Key: start_game'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $res = json_decode($result);
        curl_close($ch);

        return $res;
    }

    public function start_game() {
        $url = base_other_url('api')."api/start_game";

        $ch = curl_init($url);
        $data = array(
            'post_date' => date('Y-m-d H:i:s'),
            'game' => $_POST[game]
        );
        $fields = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4',
            'Api-Key: start_game'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $res = json_decode($result);
        curl_close($ch);

        return $res;
    }

    public function select_card() {

        $url = base_other_url('api')."api/select_card";

        $ch = curl_init($url);
        $data = array(
            'app_id' => $_POST[id],
            'post_date' => date('Y-m-d H:i:s'),
            'index' => $_POST[index],
            'click' => $_POST[click],
            'couple' => $_POST[couple],
            'game' => $_POST[game]
        );
        $fields = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4',
            'Api-Key: select_card'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $res = json_decode($result);
        curl_close($ch);

        return $res;
    }

    /*
     * 
     * 	Function
     * 
     * @return
     */
}
