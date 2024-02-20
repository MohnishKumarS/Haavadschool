<?php 
    function InsertIntoDB ($conn_db, $sql) {
        if ($conn_db->query($sql) === TRUE) {
            // echo json_encode( "Updated Successfully" );
            return ;
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
            exit ();
        }
    }
    function DeleteFromDB ($conn_db, $sql) {
        if ($conn_db->query ($sql) === TRUE) {
            // echo "Record deleted successfully";
            return;
        } else {
            echo "Error deleting record: " . $conn_db->error;
            exit ();
        }
    }