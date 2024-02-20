<?php 
    function SqlConnection () {
        global $connect_db;
        $connect_db = new mysqli ("localhost", "root", "", "image_gallery");
        if ($connect_db->connect_error) {
            echo "connection failed:" . $connect_db->connect_error;
            exit ();
        } else {
            return $connect_db;
        }
    }

    // Create catgory
    if (!empty ($_POST["createCatg"])) {
        SqlConnection ();
        $catg_name = $_POST["catgName"];
        $catg_id_prefix = preg_replace('/\s+/', '', $catg_name);
        $catg_id = substr ($catg_id_prefix, 0, 3) . date ("ymdhis");
        $catg_id = strtolower ($catg_id);
        $sql_insert_catg = "INSERT INTO image_catg (catg_id, catg_name) VALUES ('$catg_id', '$catg_name')";
        InsertIntoDB ($connect_db, $sql_insert_catg);
        echo json_encode (["opType" => "createCatg", "opStatus" => "success", "data" => "New album created"]);
    }

    // Send catogeries
    if (!empty ($_POST["getCatg"])) {
        SqlConnection ();
        $sql = $connect_db->query ("SELECT catg_id, catg_name FROM image_catg");
        if ($sql->num_rows > 0) {
            $i = 0;
            while ($result = $sql->fetch_assoc ()) {
                $resp[$i]["catgId"] = $result ["catg_id"];
                $resp[$i]["catgName"] = $result ["catg_name"];
                $i++;
            }
            echo json_encode (["opType" => "getCatg", "opStatus" => "success", "data" => $resp]);
            exit ();
        } else {
            echo "no results";
            exit ();
        }
    }

    // Initialize images 
    if (!empty ($_POST["imgUpload"])) {
        $img_catg = $_POST["imgCatg"];
        
        $img_descrip = []; 
        $img_files_name = [];
        $img_files_loc = [];
        $img_files_size = [];
        $img_files_type = [];

        $i = 0;
        foreach ($_POST["imgDescrip"] as $value) {  
            $img_descrip[$i] = $value;
            $i++;
        }
        foreach ($_FILES["img"] as $key => $value) {
            if ($key == "name") {
                $img_files_name = $value;
            } else if ($key == "tmp_name") {
                $img_files_loc = $value;
            } else if ($key == "size") {
                $img_files_size = $value;
            } else if ($key == "type") {
                $img_files_type = $value;
            }
        }
        MoveImgToGallery ($img_catg, $img_descrip, $img_files_name, $img_files_loc, $img_files_size, $img_files_type);
    }
    // Move images into file system and add details in DB
    function MoveImgToGallery ($img_c, $img_d, $img_f_name, $img_f_loc, $img_f_size, $img_f_type) {
        $file_arr = [];
        for ($i = 0; $i < count($img_f_name); $i++) {
            $file_ext = explode (".", $img_f_name[$i]);
            $file_actual_ext = strtolower (end ($file_ext));
            $file_name = uniqid ("", true) . "." . $file_actual_ext;
            $upOne = realpath (__DIR__ . '/..');            
            $file_loc = $upOne . "/gallery/" . $file_name;
            $file_loc_relative = "./gallery/" . $file_name;
            move_uploaded_file ($img_f_loc[$i], $file_loc);

            date_default_timezone_set("UTC");
            $upload_time = json_encode (date ("y-m-d h:i:s"));

            $connect_db = SqlConnection ();
            $catg = $connect_db->real_escape_string ($img_c);
            $file_loc_rel = $connect_db->real_escape_string ($file_loc_relative);
            $file_act_ext = $connect_db->real_escape_string ($file_actual_ext);
            $descrip = $connect_db->real_escape_string ($img_d[$i]);
            $sql_insert_img = "INSERT INTO image_collection (catg_id, img_loc, img_extension, img_description)
                    VALUES ('$catg', '$file_loc_rel', '$file_act_ext', '$descrip')";
            InsertIntoDB ($connect_db, $sql_insert_img);
            
            $sql_select = "SELECT catg_id, num_of_imgs FROM image_catg";
            $results = SelectFromDB ($connect_db, $sql_select);
            foreach ($results as $key => $value) {
                if ($value["catg_id"] === $img_c) {
                    $num = $value["num_of_imgs"];
                }
            }
            $num += 1;
            $sql_update_img_num = "UPDATE image_catg SET num_of_imgs = '$num' WHERE catg_id = '$img_c'";
            UpdateInDB ($connect_db, $sql_update_img_num); 
        }   
        echo json_encode (["opType" => "imgAdded", "opStatus" => "success", data => "Images uploaded successfully!"]);
        exit ();
    }

    // img gallery thumbnail
    if (!empty ($_POST["getCatgThumb"])) {
        SqlConnection ();
        $catg_and_thumb = [];
        $sql_catg_id = "SELECT catg_id FROM image_catg";
        $sql_catg_name = "SELECT catg_name FROM image_catg";
        $list_of_catg_name = SelectFromDB ($connect_db, $sql_catg_name);
        $list_of_catg = SelectFromDB ($connect_db, $sql_catg_id);
        $i = 0;
        foreach ($list_of_catg as $value) { 
            foreach ($value as $k => $v) {  
                $sql_get_thumb = "SELECT img_loc FROM image_collection WHERE catg_id = '$v' ORDER BY rand () LIMIT 1";
                $sql_catg_name = "SELECT catg_name FROM image_catg WHERE catg_id = '$v'";
                $res = SelectFromDB ($connect_db, $sql_get_thumb);
                $res2 = SelectFromDB ($connect_db, $sql_catg_name);
                $catg_and_thumb[$i]["catgID"] = $v;
                $catg_and_thumb[$i]["catgName"] = $res2[0]["catg_name"];
                $catg_and_thumb[$i]["imgLoc"] = $res[0]["img_loc"];
                $i++;
            }
        }

        echo json_encode (["opType" => "catgThumb", data => $catg_and_thumb]);
        exit ();
    }
    // img gallery get images
    if (!empty ($_POST["getCatgImgs"])) {
        $catgID = $_POST["catgID"];
        SqlConnection ();
        $sql_get_imgs = "SELECT img_loc, img_description FROM image_collection WHERE catg_id = '$catgID'";
        $results = SelectFromDB ($connect_db, $sql_get_imgs);
        echo json_encode (["opType" => "catgImgs", "opStatus" => "success", "catgID" => $catgID, data => $results]);
        exit ();
    }
    // Delete catg
    if (!empty ($_POST["deleteCatg"])) {
        SqlConnection ();
        $catgID = $_POST["catgID"];

        $sql_select_imgs = "SELECT img_loc FROM image_collection WHERE catg_id = '$catgID'";
        $imgs_to_del = SelectFromDB ($connect_db, $sql_select_imgs);
        foreach ($imgs_to_del as $key => $value) {
            foreach ($value as $k => $v) {    
                $upOne = realpath (__DIR__ . '/..');            
                $file_loc = $upOne . $v;
                unlink ($file_loc);
            }
        }

        $sql_del_catg = "DELETE FROM image_catg WHERE catg_id = '$catgID'";
        $sql_del_imgs = "DELETE FROM image_collection WHERE catg_id = '$catgID'";
        DeleteFromDB ($connect_db, $sql_del_catg);
        DeleteFromDB ($connect_db, $sql_del_imgs);
        echo json_encode (["opType" => "delCatg", "opStatus" => "success", data => "Album deleted successfully"]);
        exit ();
    }
    // Delete selected imgs
    if (!empty ($_POST["delSelectedImgs"])) {
        $catg_id = $_POST["catgID"];
        $img_loc = json_decode ($_POST["imgLoc"]);
        SqlConnection ();
        foreach ($img_loc as $key => $value) {
            $sql_del_imgs = "DELETE FROM image_collection WHERE img_loc = '$value'";
            DeleteFromDB ($connect_db, $sql_del_imgs);
            $sql_num_imgs = "SELECT num_of_imgs FROM image_catg WHERE catg_id = '$catg_id'";
            $nums = SelectFromDB ($connect_db, $sql_num_imgs);
            $n = $nums[0]["num_of_imgs"] - 1;
            $sql_update_num = "UPDATE image_catg SET num_of_imgs = '$n' WHERE catg_id = '$catg_id'";
            UpdateInDB ($connect_db, $sql_update_num);

            $upOne = realpath (__DIR__ . '/..');            
            $file_loc = $upOne . $value;
            unlink ($file_loc);
        }
        echo json_encode (["opType" => "delSelecImgs", "opStatus" => "success", data => "Images deleted successfully"]);
        exit ();
    }

    function InsertIntoDB ($conn_db, $sql) {
        if ($conn_db->query($sql) === TRUE) {
            // echo json_encode( "Updated Successfully" );
            return;
        } else {
            echo "ERROR Insert: " . $sql . "<br>" . $conn_db->error ;
            exit ();
        }
    }
    function SelectFromDB ($conn_db, $sql) {
        $row_of_data = $conn_db->query ($sql);
        $result = [];
        if ($row_of_data->num_rows > 0) {
            // output data of each row
            while ($row = $row_of_data->fetch_assoc()) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function UpdateInDB ($conn_db, $sql) {
        
        if ($conn_db->query ($sql) === TRUE) {
            // echo "Record updated successfully";
            return;
        } else {
            echo "Error updating record: " . $conn_db->error;
        }
    }
    function DeleteFromDB ($conn_db, $sql) {
        if ($conn_db->query ($sql) === TRUE) {
            // echo "Record deleted successfully";
            return;
        } else {
            echo "Error deleting record: " . $conn_db->error;
        }
    }