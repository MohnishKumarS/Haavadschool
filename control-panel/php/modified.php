 <?php
	if (!empty ($_POST["getFilters"])) {
        SqlConnection ();
        $sql = $connect_db->query ("SELECT * FROM years_cat ORDER BY years DESC");
        if ($sql->num_rows > 0) {
            $i = 0;
            while ($result = $sql->fetch_assoc ()) {
                $resp[$i]["id"] = $result ["id"];
                $resp[$i]["years"] = $result ["years"];
                $i++;
				$sqlsub = $connect_db->query("SELECT * FROM image_catg WHERE year=".$result["years"] ." AND catg_hidden='0'");
				if($sqlsub->num_rows>0){
					
					$temp=array();
					while($re = $sqlsub->fetch_assoc()){
						$cat=array($re["catg_name"],$re["catg_id"]);
						array_push($temp,$cat);
					}
					$subdata[$result["years"]] = $temp;
				}
            }
            echo json_encode (["opType" => "getFilters", "opStatus" => "success", "data" => $resp,"subdata" => $subdata]);
            exit ();
        } else {
            echo "no results";
            exit ();
        }
    }
	if(!empty ($_POST["getImages"])){
		$cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:'';
		SqlConnection();
		if($cat_id==="all"){
			
			$sql = $connect_db->query ("SELECT * FROM image_collection WHERE catg_id IN (SELECT catg_id FROM image_catg WHERE catg_hidden = '0')  ORDER BY date_added DESC LIMIT ".$limit);
			$bread="<span class='bread image-filters__item'>Recent Images</span>";
		}
		else{
			$sql = $connect_db->query ("SELECT img_loc FROM image_collection WHERE catg_id='".$cat_id."' ORDER BY date_added DESC LIMIT ".$limit);
			$sql1 = $connect_db->query ("SELECT * FROM image_catg WHERE catg_id='".$cat_id."'");
			
			if($sql1->num_rows>0){
				$row=$sql1->fetch_assoc();
				$bread = "<span class='bread image-filters__item'>".$row['year']."</span><span class='bread image-filters__item'>".$row['catg_name']."</span";
			}
		}
		$temp=array();
		if($sql->num_rows>0){
			while($row = $sql->fetch_assoc()){
				array_push($temp,$row['img_loc']);
			}
		}
		echo json_encode(["opType" => "getImages", "opStatus" => "success", "data" => $temp,"breadcrumbs" => $bread]);
	}
	
	if(!empty($_POST["getFilter"])){
		SqlConnection();
		$sql = $connect_db->query("SELECT * FROM years_cat ORDER BY years DESC");
		if($sql->num_rows>0){
			$years=array();
			while($row=$sql->fetch_assoc()){
                array_push($years,$row["years"]);
			}
		}
		echo json_encode(["opType" => "getFilter", "opStatus" => "success" ,"data" => $years]);
		
	}
	
	if(!empty($_POST['deleteImg'])){
		SqlConnection();
		$id=isset($_POST['id'])?$_POST['id']:'';
		$name=isset($_POST['name'])?$_POST['name']:'';
		$sql = $connect_db->query("DELETE FROM image_collection WHERE id='$id'");
		if($sql){
			unlink('.'.$name);
			echo json_encode(["opType" => "getFilter", "opStatus" => "success" ,"data" => "Success"]);
		}
		else{
			echo json_encode(["opType" => "getFilter", "opStatus" => "danger" ,"data" => "Failed"]);
		}
	}
	
	if(!empty($_POST['setLimit'])){
		SqlConnection();
		$l = isset($_POST['limit'])?$_POST['limit']:'';
		$sql = $connect_db->query("UPDATE limitop SET lim='$l' WHERE id='1'");
		if($sql){
			echo json_encode(["opType" => "setLimit", "opStatus" => "success", "data" => "Limit set Successfully"]);
		}
		else{
			echo json_encode(["opType" => "setLimit", "opStatus" => "danger", "data" => "Failed"]);	
		}
	}
	
	if(!empty($_POST['setFlash'])){
		SqlConnection();
		$l = isset($_POST['flashNews'])?$_POST['flashNews']:'';
		$sql = $connect_db->query("UPDATE flash SET news='$l' WHERE id='1'");
		if($sql){
			echo '<script>alert("News Updated Successfully");location.href="../index.php";</script>';
		}
		else{
			echo json_encode(["opType" => "setFlash", "opStatus" => "danger", "data" => "Failed"]);	
		}
	}
?>