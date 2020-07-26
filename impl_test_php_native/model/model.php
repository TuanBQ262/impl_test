<?php

class model {

    public function get_all($sql) {
        include_once 'config.php';
        $result = mysqli_query($db,$sql) or die("Không thực hiện được truy vấn");
        $arr = array();
        while ($rows = mysqli_fetch_object($result)) {
            $arr[] = $rows;
        }
        return $arr;
    }

    public function get_a_record($sql) {
        include 'config.php';
        $result = mysqli_query($db,$sql) or die("Không thực hiện được truy vấn");
        $rows = mysqli_fetch_object($result);
        return $rows;
    }

    public function execute($sql) {
        include_once '../config.php';
        mysqli_query($db,$sql) or die("Không thực hiện được truy vấn");
        $get_insert_id = mysqli_insert_id($db);
        return $get_insert_id;
    }

    public function num_rows($sql) {
        include_once '../config.php';
        $result = mysqli_query($db,$sql) or die("Không thực hiện được truy vấn");
        return mysqli_num_rows($result);
    }

    public function count_data($sql) {
        include '../config.php';
        $result = mysqli_query($db,$sql) or die("Không thực hiện được truy vấn") ;
        return mysqli_fetch_assoc($result);
    }
}
?>