/**
 * Created by user on 6/15/17.
 */
$(document).ready(function() {


    var base_url = 'http://localhost/cpms/';





    $("#addPost").click(function() {
        page = $("#page").val();
        heading = $("#heading").val();
        body = $("#body").val();

        $.post(base_url + 'pes/home', {page: page, heading: heading, body: body}, function(result) {
            if (result == 'Data Populated Successfully') {
                $("#page").val("");
                $("#heading").val("");
                $("#body").val("");
                alert(result);
            }
        });
    });

    /**
     *
     * FORMS HANDLER ------------------------------------------------------------------------------------------------------------------------------
     * FORMS HANDLER ------------------------------------------------------------------------------------------------------------------------------
     * FORMS HANDLER ------------------------------------------------------------------------------------------------------------------------------
     *
     */


    $("#loginForm #login").click(function() {


        $("#loginForm #loginError").remove();

        var form_fields = $("#loginForm input");

        jsonData = '{ ';

        for (i = 0; i < form_fields.length; i++) {

            if ((i + 1) != form_fields.length) {
                jsonData += '"' + form_fields[i].getAttribute("name") + '": "' + form_fields[i].value + '", ';

            } else {
                jsonData += '"' + form_fields[i].getAttribute("name") + '": "' + form_fields[i].value + '" }';
            }

        }

        jsonData = JSON.parse(jsonData);

        $.post(base_url + "index.php/pes/login", jsonData, function(result) {

            if (result != "success") {


                jsonObject = JSON.parse(result);


                for (i = 0; i < form_fields.length; i++) {

                    var name = form_fields[i].getAttribute("name");



                    if (jsonObject[name] != "success") {

                        $("#loginForm #" + name).css("border-color", "red");
                        $("#loginForm #" + name).before(jsonObject[name]);

                    } else {

                        $("#loginForm #" + name).css("border-color", "green");

                    }

                }

            } else {

                window.location.replace(base_url + "index.php/system");
            }

        });

    });


     $("#registrationForm #register").click(function() {

         console.log("Registration Button Clicked");
         $("#registrationForm #regError").remove();

         var form_fields = $("#registrationForm input");

         var gender = $("#registrationForm #gender").val();

         jsonData = '{"gender": "' + gender + '", ';

         for (i = 0; i < form_fields.length; i++) {

             if ((i + 1) != form_fields.length) {

                 if (form_fields[i].getAttribute("name") == 'avatar') {

                     if (form_fields[i].value != '') {

                         alert("Image Detected and Post Initialized");
                         alert("Proping Begins");
                         var avatar = form_fields[i].prop('files')[0];
                         alert("Proping Ends");
                         alert ('The Propped value is:' + avatar);
                     }

                 } else {
                     jsonData += '"' + form_fields[i].getAttribute("name") + '": "' + form_fields[i].value + '", ';
                 }


             } else {
                 jsonData += '"' + form_fields[i].getAttribute("name") + '": "' + form_fields[i].value + '" }';
             }

         }


         jsonData = JSON.parse(jsonData);
         console.log("Json Object Created");
         console.log(jsonData);



         $.post(base_url + "index.php/pes/registration", jsonData , function(result) {

               console.log("Ajax Request Sent");
               if (result != "success") {

                   console.log("PHP Form Validation Failed");
                   jsonObject = JSON.parse(result);
                   console.log(result);


                   for (i = 0; i < form_fields.length; i++) {

                       var name = form_fields[i].getAttribute("name");



                       if (jsonObject[name] != "success") {
                           console.log("Error Displayed on: " + name);
                           $("#" + name).css("border-color", "red");
                           $("#" + name).before(jsonObject[name]);

                       } else {

                           $("#" + name).css("border-color", "green");

                       }

                   }
               } else {

                   for (i = 0; i < form_fields.length; i++) {

                       var name = form_fields[i].getAttribute("name");

                       $("#" + name).remove();

                   }

                   $("#gender").remove();
                   $("#register").remove();

                   $("#registrationForm").append("<div class='alert alert-success'>You are Successfully Registered. Please note down your password for Future Reference, Login</div> ");




               }

         });



     });



    /**
     *
     * FORMS HANDLER END------------------------------------------------------------------------------------------------------------------------------
     * FORMS HANDLER END------------------------------------------------------------------------------------------------------------------------------
     * FORMS HANDLER END------------------------------------------------------------------------------------------------------------------------------
     *
     */


    /**
     * File Upload Handler
     */

    $('#add_document').click(function() {
       alert("Add Document, Am clicked");
    });




});