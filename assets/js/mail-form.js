"use strict";

$(document).ready(function () {
    function ajaxSend (data, phpFile) {
        var ajaxReq = new XMLHttpRequest();
        ajaxReq.open("POST", phpFile, true);

        ajaxReq.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                try {
                    $("#Uploading-data").css ("display", "none");
                    var resp = this.response;
                    setTimeout(function() {
                        alert (resp);
                    }, 500); 
                } catch (error) {
                    console.log (this.response);
                }
                    
            } else {
                var data = "We reached our target server, but it returned an error";
            }
        };
        ajaxReq.upload.addEventListener('progress', function(e) {
            // While sending and loading data.
            $("#Uploading-data").css ("display", "block");
        });
        ajaxReq.send(data);
    }

    var formData = new FormData ();

    $("#Admission-form").submit (function (e) { 
        e.preventDefault();
        var $input = $("#Admission-form input"); 
        var $textArea =  $("#Admission-form textarea");
        inputVal ($input);
        inputVal ($textArea);
        /* for (var key of formData.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }  */
        ajaxSend (formData, "../../control-panel/php/mail-form.php");
        document.getElementById ("Admission-form").reset ();
    });

    $("#Job-application-form").submit (function (e) { 
        e.preventDefault();
        var $input1 = $("#Job-application-form .form-group-1 input"); 
        var $textArea1 =  $("#Job-application-form .form-group-1 textarea");
        inputVal ($input1);
        inputVal ($textArea1);
        var $input2 = $("#Job-application-form .form-group-2 input"); 
        var $textArea2 =  $("#Job-application-form .form-group-2 textarea");
        inputVal ($input2);
        inputVal ($textArea2);
        var $input3 = $("#Job-application-form .form-group-3 input"); 
        var $textArea3 =  $("#Job-application-form .form-group-3 textarea");
        inputVal ($input3);
        inputVal ($textArea3);
        /* for (var key of formData.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }  */
        ajaxSend (formData, "../../control-panel/php/mail-form.php");
        document.getElementById ("Job-application-form").reset ();
    });
    function inputVal ($inp) {
        var radioCheckName = "";
        for (var i = 0; i < $inp.length; i++) {
            if ($($inp[i]).attr ("data-field-name")) {
                if ($($inp[i]).attr ("type") !== "radio" && $($inp[i]).attr ("type") !== "checkbox") {        
                    formData.append ($($inp[i]).attr ("data-field-name"), $($inp[i]).val ()); 
                } else {
                    if (radioCheckName !== $($inp[i]).attr ("name")) {
                        var name = $($inp[i]).attr ("name");
                        var radioCheckBtns = $("[name=" + name + "]");
                        var value = "";
                        for (var j = 0; j < radioCheckBtns.length; j++) {
                            if ($(radioCheckBtns[j]).is (":checked")) {
                                value += $(radioCheckBtns[j]).val ();
                            }
                        }
                        formData.append ($($inp[i]).attr ("data-field-name"), value); 
                        radioCheckName = $($inp[i]).attr ("name");
                    }
                }  
            }
        } 
    }
    function textareaVal ($textar) {
        for (var i = 0; i < $textar.length; i++) {
            if ($($textar[i]).attr ("data-field-name")) {
                formData.append ($($textar[i]).attr ("data-field-name"), $($textar[i]).val ());
            }
        }  
    }
});