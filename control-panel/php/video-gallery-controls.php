<?php 
    require ("db-connect.php");
    require ("db-functions.php");
    require ("hack-proof.php");
	require ("modified.php");

    // add new videos
    if (!empty ($_POST["videoUpload"])) {
        SqlConnection ();
        for ($i = 0; $i < count ($_POST["videoDescription"]); $i++) {
            $v_url = hackProof ($_POST["videoURL"][$i]);
            $video_descrip = hackProof ($_POST["videoDescription"][$i]); 
            preg_match ("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $v_url, $matches);
            $video_url = $matches[1]; 
            $video_year = hackProof($_POST["videoYear"][$i]);
            $sql = "INSERT INTO video_collection (video_id,year, video_description) 
                    VALUES ('$video_url','$video_year', '$video_descrip')";
            InsertIntoDB ($connect_db, $sql);
        }
        echo json_encode (["opType" => "videUpload", "opStatus" => "success", "data" => "Videos added"]);
    }

    // get videos
    if (!empty ($_POST["getVideo"])) {
        SqlConnection ();
        $sql = "SELECT video_id, video_description FROM video_collection";
        $resp = SelectFromDB ($connect_db, $sql); 
        echo json_encode (["opType" => "getVideo", "opStatus" => "success", "data" => $resp]);
    }
    if (!empty ($_POST["getVideo2"])) {
        SqlConnection ();
		$year = isset($_POST['year'])?$_POST['year']:'';
        $sql = "SELECT video_id, video_description FROM video_collection";
		if($year !=="all"){
			$sql.= " WHERE year='$year'";
		}
        $resp = SelectFromDB ($connect_db, $sql); 
        echo json_encode (["opType" => "getVideo", "opStatus" => "success", "data" => $resp, "year" => $year]);
      }

    // del video 
    if (!empty ($_POST["delVideo"])) {
        SqlConnection ();
        $video_id = $_POST["videoID"];
        $sql = "DELETE FROM video_collection WHERE video_id = '$video_id'";
        DeleteFromDB ($connect_db, $sql);
        echo json_encode (["opType" => "delVideo", "opStatus" => "success", "data" => "Video deleted successfully!"]);
    }