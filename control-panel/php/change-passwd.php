<?php
    require ("db-connect.php");
    require ("db-functions.php");

    if ($_POST["changePasswd"]) {
        $connect_db = SqlConnection ();

        $currentPass = $_POST['currentPasswd'];
        $sql_cur_passwd = "SELECT passwd FROM control_panel_pass";
        $res = SelectFromDB ($connect_db, $sql_cur_passwd);
        $passwd = $res[0]["passwd"];
        if (password_verify($currentPass, $passwd)) {
            $newPass = password_hash ($_POST['newPasswd'], PASSWORD_DEFAULT);
            $sql_change_passwd = "UPDATE control_panel_pass SET passwd = '$newPass' WHERE type='panel password'";
            UpdateInDB ($connect_db, $sql_change_passwd);
            echo json_encode (["opType" => "changePasswd", "opStatus" => "success", "data" => "Password has been changed successfully!"]);
        } else {
            echo json_encode (["opType" => "changePasswd", "opStatus" => "danger", "data" => "Current password is incorrect."]);
        }
    }
?>