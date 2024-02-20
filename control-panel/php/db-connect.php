<?php
    function SqlConnection () {
        global $connect_db;
 //       $connect_db = new mysqli ("5.104.230.133", "harvardc_db1", "-rWc[ZQ*,pFn", "harvardc_image_gallery");
        $connect_db = new mysqli ("localhost", "root", "", "harvardc_image_gallery1");
    //    $connect_db = new mysqli ("localhost", "root", "", "image_gallery");
        if ($connect_db->connect_error) {
            echo "connection failed:" . $connect_db->connect_error;
            exit ();
        } else {
            return $connect_db;
        }
    }