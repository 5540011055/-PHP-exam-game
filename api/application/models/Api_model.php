<?php

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function random_number() {

        $numbers = range(1, 6);
        shuffle($numbers);
        $num = 1;
        foreach ($numbers as $key => $number) {
//    echo $num." : ".$number."<br/>";
            $data1[$num] = $number;
            $num += 1;
        }


        $num = 1;
        $numbers = range(1, 6);
        foreach ($numbers as $key => $number) {
            $data2[$num] = $number;
            $num += 1;
        }

        $data3 = array_merge($data1, $data2);
        $num = 1;
        foreach ($data3 as $key => $val) {
            $res[$num] = $val;
            $num += 1;
        }
        $return[number] = $res;
        $return[win] = 0;
        $return[score] = 0;
        return $return;
    }

    public function get_num_file() {
        $dir = "files/";
        $b = scandir($dir, 0);

        foreach ($b as $key => $val) {
//            $txt = explode(".", $val);
//            $data[$key] = $txt[0];
            $data[$key] = $val;
        }
        foreach ($data as $val) {
            if (is_numeric($val)) {
                $array[] = $val;
            }
        }
        sort($array);
        $return = intval(end($array)) + 1;
        return $return;
    }

    public function write_file($array, $id, $game) {
        if (!is_dir("files/" . $id)) {
            mkdir("files/" . $id, 0777);
        }
        $myfile = fopen("files/" . $id . "/game_" . $game . ".json", "w") or die("Unable to open file!");
        $txt = json_encode($array);
        $res = fwrite($myfile, $txt);
        fclose($myfile);

        return $res;
    }

    public function get_id() {

        $id = $this->get_num_file();
        $array = array();
        $res = $this->write_file($array, $id);

        return $res;
    }

    public function get_globle_best() {
        $path = "files/globle.json";
        if (file_exists($path)) {

            $myfile = fopen($path, "r") or die("Unable to open file!");
            $content = fread($myfile, filesize($path));
            $content = json_decode($content);
            fclose($myfile);
            $chk = 1;
        } else {
            $myfile = fopen($path, "w") or die("Unable to open file!");
            $data[score] = "";
            fwrite($myfile, json_encode($data));
            $content = $data;
            fclose($myfile);
            $chk = 0;
        }
        return $content;
    }

    public function get_my_best($id, $game) {
        $path = "files/" . $id . "/" . "my_best.json";
        if (file_exists($path)) {

            $myfile = fopen($path, "r") or die("Unable to open file!");
            $content = fread($myfile, filesize($path));
            $content = json_decode($content);
            fclose($myfile);
            $chk = 1;
        } else {
            $myfile = fopen($path, "w") or die("Unable to open file!");
            $data[score] = "";
            $data[date] = date('Y-m-d h:i:s');
            fwrite($myfile, json_encode($data));
            $content = $data;
            fclose($myfile);
            $chk = 0;
        }

        return $content;
    }

    public function first_card($param) {
        $click = $param[click];
        $index = $param[index];
        $path = "files/" . $param[app_id] . "/game_" . $param[game] . ".json";
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($path));
        fclose($myfile);
        $obj_num = json_decode($content);
        $array1 = (array) $obj_num;
        $array_num = $obj_num->number;

        $w2[click] = $click;
        $w2[index] = $index;
        $w2[number] = $array_num->{$index};
        $array1[score] = $click;
//        $array1['c'.$click] = $w2;
        $array1[data][] = $w2;
        $fh = fopen($path, 'w');
        $ww = fwrite($fh, json_encode($array1));

        fclose($fh);

//        $x = $index." = ".$array_num->{$index};
        $return[match] = 0;
        $return[index] = $index;
        $return[number] = $array_num->{$index};
        return $return;
    }

    public function second_card($param) {
        $click = $param[click];
        $index = $param[index];
        $path = "files/" . $param[app_id] . "/game_" . $param[game] . ".json";
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($path));
        fclose($myfile);
        $obj_num = json_decode($content);
        $array1 = (array) $obj_num;
        $array_num = $obj_num->number;
        $num_select = $array_num->{$index};
//        $obj_last = end($obj_num);
        $obj_last = end($obj_num->data);
        if ($obj_last->number == $num_select) {
            $match = 1;
            $win = intval($obj_num->win) + 1;
//            $return[match]
        } else {
            $match = 0;
            $win = $obj_num->win;
        }
        $w2[click] = $click;
        $w2[index] = $index;
        $w2[number] = $array_num->{$index};
//        
//        $array1['c'.$click] = $w2;
//        $array1[data]['c2'] = $w2;
        $array1[win] = $win;
        $array1[score] = $click;

//        $obj_num->data->c2 = 1;
        $array1[data][] = $w2;
        $fh = fopen($path, 'w');
        $ww = fwrite($fh, json_encode($array1));

        fclose($fh);
        $return[match] = $match;
        $return[number] = $array_num->{$index};
        $return[old_index] = $obj_last->index;
        $return[index] = $index;
//        $return[my_best] = $my_best;
        $return[win] = $win;

        return $return;
    }

    public function check_double($param) {

        $click = $param[click];
        $index = $param[index];
        $path = "files/" . $param[app_id] . ".json";
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($path));
        fclose($myfile);
        $obj_num = json_decode($content);
        $obj_last = end($obj_num->data);
        if ($index != $obj_last->index) {
            $return = true;
        } else {
            $return = false; // fasle = double click
        }
        return $return;
    }

//    public function update_my_best($param) {
//        $current_score = $param[click];
//        $old_game = intval($param[game]) - 1;
//        $path = "files/" . $param[app_id] . "/game_" . $old_game . ".json";
//        if (file_exists($path)) {
//            $myfile = fopen($path, "r") or die("Unable to open file!");
//            $content = fread($myfile, filesize($path));
//            $obj_num = json_decode($content);
//            fclose($myfile);
//            if ($current_score < $obj_num->score) {
//                $best_score = $current_score;
//                $data[game] = $param[game];
//            } else {
//                $best_score = $obj_num->score;
//                $data[game] = $old_game;
//            }
//        } else {
//            $best_score = $current_score;
//        }
//
//        $path_best = "files/" . $param[app_id] . "/my_best" . ".json";
//        $myfile = fopen($path_best, "w") or die("Unable to open file!");
//        $data[score] = $best_score;
//        $data[date] = date('Y-m-d h:i:s');
//
//        $res[write] = fwrite($myfile, json_encode($data));
////        $content = $data;
//        fclose($myfile);
//        $data[path] = $path;
//        return $data;
//    }

    public function update_my_best($param) {
        $current_score = $param[click];
        $path = "files/" . $param[app_id] . "/my_best.json";
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($path));
        $obj_num = json_decode($content);
        fclose($myfile);
       
        if ($obj_num->score == "") {
            $obj_num->score = MAX_SCORE;
        }
         $old_score = intval($obj_num->score);
        if ($current_score < $old_score) {
            $path_best = "files/" . $param[app_id] . "/my_best" . ".json";
            $myfile = fopen($path_best, "w") or die("Unable to open file!");
            $data[score] = $current_score;
            $data[date] = date('Y-m-d h:i:s');
            $data[write] = fwrite($myfile, json_encode($data));
            $data[game] = $param[game];
            fclose($myfile);
        }else{
            $data[score] = $obj_num->score;
            $data[write] = 'no update';
        }

        return $data;
    }

    public function update_globle_best($param) {
        $path = "files/globle.json";
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($path));
        fclose($myfile);
        $obj_num = json_decode($content);
        $current_score = $param[click];
        if ($obj_num->score == "") {
            $obj_num->score = MAX_SCORE;
        }
        $old_score = intval($obj_num->score);
        if ($current_score < $old_score) {
            $myfile = fopen($path, "w") or die("Unable to open file!");
            $data[score] = $current_score;
            $data[date] = date('Y-m-d h:i:s');
            $data[app_id] = $param[app_id];
            $data[game] = $param[game];
            $data[write] = fwrite($myfile, json_encode($data));
        } else {
            $data[score] = $obj_num->score;
            $data[write] = 'no update';
        }
        $data[old_score] = $old_score;
        return $data;
    }

    //////////////////////// END CLASS
}
