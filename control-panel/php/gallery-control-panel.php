<?php 
    require ("db-connect.php");
    require ("db-functions.php");
    require ("hack-proof.php");
	
	SqlConnection();
	$lim = $connect_db->query("SELECT lim FROM limitop WHERE id='1' LIMIT 1");
	$an = $lim->fetch_assoc();
	$limit = $an["lim"];
	require ("modified.php");
	//new lines
    // Create catgory
    if (!empty ($_POST["createCatg"])) {
        SqlConnection ();
        $catg_name = hackProof ($_POST["catgName"]);
        $catg_id_prefix = preg_replace('/\s+/', '', $catg_name);
        $catg_id = substr ($catg_id_prefix, 0, 3) . date ("ymdhis");
        $catg_id = strtolower ($catg_id);
        $catg_filter = $_POST["catgFilter"];
        $sql_insert_catg = "INSERT INTO image_catg (filter_id, catg_id, catg_name) VALUES ('$catg_filter', '$catg_id', '$catg_name')";
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
    ////////////////
    // Send catgs
	

	
    if (!empty ($_POST["getCatgList"])) {
        SqlConnection ();
		$cat = isset($_POST['cat'])?$_POST['cat']:'';
		$q = "SELECT * FROM image_collection";
		if($cat !== "all"){
			$q.=" WHERE catg_id='$cat' ORDER BY id DESC LIMIT ".$limit;
		}
		else{
			$q.=" ORDER BY id DESC LIMIT ".$limit;
		}
        $sql = $connect_db->query ($q);
        if ($sql->num_rows > 0) {
            $i = 0;
            while ($result = $sql->fetch_assoc ()) {
                $resp[$i]["catg_id"] = $result ["catg_id"];
                $resp[$i]["img_loc"] = $result ["img_loc"];
                $resp[$i]["id"] = $result ["id"];
                $i++;
            }
            echo json_encode (["opType" => "getCatgList", "opStatus" => "success", "data" => $resp]);
            exit ();
        } else {
            echo json_encode (["opType" => "getCatgList", "opStatus" => "success", "data" => "0"]);
            exit ();
        }
    }
    // Delete catg 
    /* if (!empty ($_POST["deleteCatg"])) {
        $catg_ID = $_POST["catgID"];
        SqlConnection ();
        $sql_del_catg = "DELETE FROM image_catg WHERE catg_id = '$catg_ID'";
        $resp1 = DeleteFromDB ($connect_db, $sql_del_catg);
        echo json_encode (["opType" => "deleteCatg", "opStatus" => "success", "data" => "Album deleted successfullty!"]);
    } */
    // Edit catg name
    if (!empty ($_POST["editCatgName"])) {
        $catg_ID = $_POST["catgID"];
        $new_catg_name = $_POST["catgName"];
        SqlConnection ();
        $sql_rename = "UPDATE image_catg SET catg_name = '$new_catg_name' WHERE catg_id = '$catg_ID'";
        $resp1 = UpdateInDB ($connect_db, $sql_rename);
        echo json_encode (["opType" => "renameCatg", "opStatus" => "success", "data" => "Name of the Category has been changed!"]);
    }
     // Edit catg filter
     if (!empty ($_POST["editCatgFilter"])) {
        $catg_ID = $_POST["catgID"];
        $filter_ID = $_POST["filterID"];
        SqlConnection ();
        $sql_rename = "UPDATE image_catg SET filter_id = '$filter_ID ' WHERE catg_id = '$catg_ID'";
        $resp1 = UpdateInDB ($connect_db, $sql_rename);
        echo json_encode (["opType" => "changeCatgFilter", "opStatus" => "success", "data" => "Category for this album has been changed!"]);
    }
    // Hide and Show Catg
    if (!empty ($_POST["hideShowCatg"])) {
        SqlConnection ();
        $catg_ID = $_POST["catgID"];
        if ($_POST["hide"] === "true") {
            $sql_hide = "UPDATE image_catg SET catg_hidden = 1 WHERE catg_id = '$catg_ID'";
            $resp = UpdateInDB ($connect_db, $sql_hide);
            echo json_encode (["opType" => "hideShowCatg", "opStatus" => "success", "data" => "Category has been hidden sucessfully!"]);
        } else {
            $sql_hide = "UPDATE image_catg SET catg_hidden = 0 WHERE catg_id = '$catg_ID'";
            $resp = UpdateInDB ($connect_db, $sql_hide);
            echo json_encode (["opType" => "hideShowCatg", "opStatus" => "success", "data" => "Category is visible now!"]);
        }
    }
    /////////////////

    // Create filter 
    SqlConnection ();
    $sql_default = "SELECT filter_id, filter_name FROM image_filter WHERE default_filter = 1";
    $resp_data = SelectFromDB ($connect_db, $sql_default);
    $def_filter_name = $resp_data[0]["filter_name"];
    $def_filter_ID = $resp_data[0]["filter_id"];
    if (!empty ($_POST["createFilter"])) {
        global $def_filter_name, $def_filter_ID;
        $filter_name = hackProof ($_POST["filterName"]);
        $filter_id_prefix = preg_replace('/\s+/', '', $filter_name);
        $filter_id = "f_" . substr ($filter_id_prefix, 0, 3) . date ("ymdhis");
        $filter_id = strtolower ($filter_id);
		
		$catg_id_prefix = preg_replace('/\s+/', '', $filter_name);
        $catg_id = substr ($catg_id_prefix, 0, 3) . date ("ymdhis");
        $catg_id = strtolower ($catg_id);
		   
		$year = isset($_POST['catYear'])?$_POST['catYear']:'';
        if ($filter_name !== $def_filter_name) {
            SqlConnection ();
            $sql_insert_filter = "INSERT INTO image_catg (filter_id,catg_id, catg_name,year) VALUES ('$filter_id','$catg_id', '$filter_name','$year')";
            InsertIntoDB ($connect_db, $sql_insert_filter);

                // --- insert cat  years
                $sql_years = "SELECT DISTINCT year FROM image_catg  WHERE NOT year = '' AND year NOT IN (SELECT  years FROM years_cat)";
                $res = $connect_db->query($sql_years);
        
                if ($res->num_rows > 0) {
               
                while ($row = $res->fetch_assoc()) {         
                    $year_insert = $connect_db->query("INSERT INTO years_cat (years) VALUES ('" . $row['year'] . "')");          
                }     
                
                }
            echo json_encode (["opType" => "createFilter", "opStatus" => "success", "data" => "New category created"]);
        } else {
            echo json_encode (["opType" => "createFilter", "opStatus" => "danger", "data" => "New category name cannot be same as the default category name \"Uncatgorized\""]);
        }
    }
    // Send filters
    if (!empty ($_POST["getFilters2"])) {
        SqlConnection ();
        $sql = $connect_db->query ("SELECT filter_id, catg_name, num_of_imgs, catg_hidden FROM image_catg");
        if ($sql->num_rows > 0) {
            $i = 0;
            while ($result = $sql->fetch_assoc ()) {
                $resp[$i]["filterId"] = $result ["filter_id"];
                $resp[$i]["filterName"] = $result ["catg_name"];
                $resp[$i]["numOfAlbums"] = $result ["num_of_imgs"];
                $resp[$i]["filterHidden"] = $result ["catg_hidden"];
                $i++;
            }
            echo json_encode (["opType" => "getFilters2", "opStatus" => "success", "data" => $resp]);
            exit ();
        } else {
            echo "no results";
            exit ();
        }
    }
    // Delete filter 
    if (!empty ($_POST["deleteFilter"])) {
        global $def_filter_name, $def_filter_ID;
        $filter_ID = $_POST["filterID"];
        if ($filter_ID !== $def_filter_ID) {
            SqlConnection ();
            $sql_del_filter = "DELETE FROM image_filter WHERE filter_id = '$filter_ID'";
            $sql_del_filter1 = "DELETE FROM image_catg WHERE filter_id = '$filter_ID'";
            $resp1 = DeleteFromDB ($connect_db, $sql_del_filter);
            $resp2 = DeleteFromDB ($connect_db, $sql_del_filter1);
            echo json_encode (["opType" => "deleteFilter", "opStatus" => "success", "data" => "Category deleted successfullty!"]);
        } else {
            echo json_encode (["opType" => "deleteFilter", "opStatus" => "danger", "data" => "You cannot delete the default category"]);
        }
    }
    // Edit filter name
    if (!empty ($_POST["editFilterName"])) {
        global $def_filter_name, $def_filter_ID;
        $filter_ID = $_POST["filterID"];
        $new_filter_name = $_POST["filterName"];
        if ($filter_ID !== $def_filter_ID) {
            SqlConnection ();
            $sql_rename = "UPDATE image_catg SET catg_name = '$new_filter_name' WHERE filter_id = '$filter_ID'";
            $resp1 = UpdateInDB ($connect_db, $sql_rename);
            echo json_encode (["opType" => "renameFilter", "opStatus" => "success", "data" => "Name of the Category has been changed!"]);
        } else {
            echo json_encode (["opType" => "renameFilter", "opStatus" => "danger", "data" => "You cannot change name of the default category"]);
        }
    }
    // Hide and Show filter
    if (!empty ($_POST["hideShowFilter"])) {
        SqlConnection ();
        $filter_ID = $_POST["filterID"];
        if ($_POST["hide"] === "true") {
            $sql_hide = "UPDATE image_catg SET catg_hidden = 1 WHERE filter_id = '$filter_ID'";
            $resp = UpdateInDB ($connect_db, $sql_hide);
            echo json_encode (["opType" => "hideShowFilter", "opStatus" => "success", "data" => "Category has been hidden sucessfully!"]);
        } else {
            $sql_hide = "UPDATE image_catg SET catg_hidden = 0 WHERE filter_id = '$filter_ID'";
            $resp = UpdateInDB ($connect_db, $sql_hide);
            echo json_encode (["opType" => "hideShowFilter", "opStatus" => "success", "data" => "Category is visible now!"]);
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
                $sql_catg_name = "SELECT filter_id, catg_name, catg_hidden FROM image_catg WHERE catg_id = '$v'";
                $res = SelectFromDB ($connect_db, $sql_get_thumb);
                $res2 = SelectFromDB ($connect_db, $sql_catg_name);
                $catg_and_thumb[$i]["catgID"] = $v;
                $catg_and_thumb[$i]["filterID"] = $res2[0]["filter_id"];
                $catg_and_thumb[$i]["catgName"] = $res2[0]["catg_name"];
                $catg_and_thumb[$i]["imgLoc"] = $res[0]["img_loc"];
                $catg_and_thumb[$i]["catgHidden"] = $res2[0]["catg_hidden"];
                $i++;
            }
        }

        echo json_encode (["opType" => "catgThumb", data => $catg_and_thumb]);
        exit ();
    }
    // img gallery get images
/*  if (!empty ($_POST["getCatgImgs"])) {
        $catgID = $_POST["catgID"];
        SqlConnection ();
        $sql_get_imgs = "SELECT img_loc, img_description FROM image_collection WHERE catg_id = '$catgID'";
        $results = SelectFromDB ($connect_db, $sql_get_imgs);
        echo json_encode (["opType" => "catgImgs", "opStatus" => "success", "catgID" => $catgID, data => $results]);
        exit ();
    }
	*/
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