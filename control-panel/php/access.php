<?php
    require ("db-connect.php");
    require ("db-functions.php");

    $connect_db = SqlConnection ();
    $sql_get_passwd = "SELECT passwd FROM control_panel_pass";
    $r = SelectFromDB ($connect_db, $sql_get_passwd);
    $userPass = $r[0]["passwd"];

	if (isset ($_POST["submitPass"])) {
        if (!password_verify($_POST["passwd"], $userPass)) {
            accessForm ("Wrong Password!");
            exit ();
        }
    } else {
        accessForm ("");
        exit ();
    }

    function accessForm ($error) {
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                .auth-form {
                    text-align: center;
                    margin-top: 25px;
                }
                .auth-form__wrapper {
                    display: inline-block;
                    background: #f6f6f6;
                    padding: 10px 15px;
                }
                .auth-form__title {
                    font-size: 18px;
                    font-family: "Arial";
                    margin-bottom: 5px;
                    text-align: left;
                }
                .auth-form__error {
                    font-size: 18px;
                    font-family: "Arial";
                    color: red;
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <div class="auth-form">
                <div class="auth-form__wrapper">
                    <div class="auth-form__error"><?php echo $error ?></div>
                    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                        <div class="auth-form__title">Enter password:</div>
                        <input type="password" name="passwd" value="" placeholder="" required>
                        <button type="submit" name="submitPass">Submit</button>
                    </form>
                </div>
            </div>
        </body>
    </html>

<?php 
    } 
?>