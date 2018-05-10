/**
 * Created by Mark on 8/18/17.
 */




    var base_url = 'http://localhost/pes.co.tz/';

    console.log("The Monster is Active");
    $('#gym_reg_form').parsley();
    $('#add_spice_form').parsley();

    $('#add_meal_form').parsley();

    $('#registration_form').parsley();

    $('#account_registration').parsley();

    $('#login_form').parsley();

    $('#trainer_info').parsley();

    $('#default_form').parsley();

    $('#gym_description').wysihtml5();


    $('[data-toggle="tooltip"]').tooltip();

    $('#side-menu').slimScroll({
        height: '400px'
    });

    $('#products_form').slimScroll({
        height: '440px'
    });

    $('.scroll_area').slimScroll({
        height: '345px'
    });

    $('.description_dashboard').slimScroll({
        height: '170'
    });

    $('.description').slimScroll({
        width: '200px',
        height: '60px'

    });

    $('#spices').DataTable();
    $('#meals').DataTable();
    $('#contacts').DataTable();
    $('#products_table').DataTable();
    $('#default_table').DataTable();

    regObj = {
        first_name: "",
        last_name: "",
        middle_name: "",
        gender: "",
        phones: [],
        emails: [],
        address: []
    };



    $('#step2').hide();
    $('#step3').hide();
    $('#step4').hide();

    $('#next1').click(function () {

        userStep1 = $('#user_step1').parsley();

        if (userStep1.validate()) {

            $('#step').html("2");
            $('#reg_progress').css('width', '50%');
            $('#step1').hide();
            $('#step2').show();

            regObj.first_name = $('#first_name').val();
            regObj.last_name = $('#last_name').val();
            regObj.middle_name = $('#middle_name').val();
            regObj.gender = $('#gender').val();

            console.log(regObj);

        } else {

        }


    });

    userStep2 = $('#user_step2').parsley();
    userStep3 = $('#user_step3').parsley();

    $('#back_to_1').click(function () {
        $('#step').html("1");
        $('#reg_progress').css('width', '25%');
        $('#step1').show();
        $('#step2').hide();
    });

    $('#back_to_2').click(function () {
        $('#step').html("2");
        $('#reg_progress').css('width', '50%');
        $('#step2').show();
        $('#step3').hide();
    });

    $('#back_to_3').click(function () {
        $('#step').html("3");
        $('#reg_progress').css('width', '75%');
        $('#step3').show();
        $('#step4').hide();
    });

    $('#reset_phone').click(function () {
       regObj.phones = [];
       $('#phones').html(".");
    });

    $('#add_phone').click(function () {

        if (userStep2.validate()) {
            title = $('#title').val();
            number = $('#phone').val();
            console.log("title: " + title + ", number: " + number);
            phoneObj = {};
            phoneObj['title'] = title;
            phoneObj['number'] = number;
            regObj.phones.push(phoneObj);
            phones = $('#phones');
            phones.html("");
            phones.append('<ul></ul>');
            phones = $('#phones ul');

            for (i=0;i<regObj.phones.length;i++) {
                phones.append("<li>" + regObj.phones[i].title + ": " + regObj.phones[i].number + "</li>");
            }

            console.log(regObj);
        } else {

        }

    });

    $('#reset_email').click(function () {
        regObj.emails = [];
        $('#emails').html(".");
    });

    $('#add_email').click(function () {

        if (userStep2.validate()) {
            email = $('#email').val();
            console.log("email: " + email);
            emailObj = {};
            emailObj['email'] = email;
            regObj.emails.push(emailObj);
            emails = $('#emails');
            emails.html("");
            emails.append('<ul></ul>');
            emails = $('#emails ul');

            for (i=0;i<regObj.emails.length;i++) {
                emails.append("<li>" + regObj.emails[i].email + "</li>");
            }

            console.log(regObj);
        } else {

        }

    });

    $('#next2').click(function () {
        userStep2 = $('#user_step2').parsley();

        if (userStep2.validate()) {

            $('#step').html("3");
            $('#reg_progress').css('width', '75%');
            $('#step2').hide();
            $('#step3').show();

            console.log(regObj);

        } else {

        }
    });

    $('#reset_address').click(function () {
        regObj.address = [];
        $('#addresses').html(".");
    });

    $('#add_address').click(function () {


        if (userStep3.validate()) {
            box = $('#box').val();
            street = $('#street').val();
            district = $('#district').val();
            region = $('#region').val();
            country = $('#country').val();
            addressObj = {};
            addressObj['box'] = box;
            addressObj['street'] = street;
            addressObj['district'] = district;
            addressObj['region'] = region;
            addressObj['country'] = country;
            regObj.address.push(addressObj);
            addresses = $('#addresses');
            addresses.html("");
            addresses.append('<ul></ul>');
            addresses = $('#addresses ul');

            for (i=0;i<regObj.address.length;i++) {
                addresses.append("<li>" + regObj.address[i].box + ", " +
                    regObj.address[i].street + ", " +
                    regObj.address[i].district + ", " +
                    regObj.address[i].region + ", " +
                    regObj.address[i].country + "</li>");
            }

            console.log(regObj);
        } else {

        }

    });

    $('#next3').click(function () {
        userStep3 = $('#user_step3').parsley();

        if (userStep3.validate()) {

        $('#step').html("4");
        $('#reg_progress').css('width', '100%');
        $('#step3').hide();
        $('#step4').show();

        console.log(regObj);

    } else {

    }
});

    $('#finish').click(function () {
        userStep4 = $('#user_step4').parsley();

        if (userStep4.validate()) {

            alert("Ajax Calls to insert values to the database");

            console.log(regObj);

        } else {

        }
    });





    /* --- Charts --- */
    try {
        var ctx = document.getElementById("sampleChart").getContext('2d');

        var sampleChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    } catch (e) {
        console.log("ERROR: " + e);
    }


    $("#add_document").click(function() {

        console.log("Add Document Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add document form");
        var form_fields = $("#add_document_form input");
        console.log("Data taken Successfully");
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        $.ajax({


            url: base_url + 'index.php/system/documents/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_working_plan").click(function() {

        console.log("Add Working Plan Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add Working Plan form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/working_plan/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_working_budget").click(function() {

        console.log("Add Working Budget Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add Working Plan form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/working_budget/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_baseline_data").click(function() {

        console.log("Add Baselien Data Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add Baseline Data form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/baseline_data/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_monitoring_status").click(function() {

        console.log("Add Monitoring Status Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add Monitoring Status form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/monitoring_status/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_evaluation_remarks").click(function() {

        console.log("Add Evaluation Remarks Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add evaluation remarks form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/evaluation_remarks/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_program_adjustments").click(function() {

        var displayName = 'Program Adjustments';

        console.log("Add Program Adjustments Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add program adjustments form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/program_adjustments/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_process_entries").click(function() {

        var displayName = 'Process Entries';
        var directory = 'process_entries';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_competition_endorsment").click(function() {

        var displayName = 'Competition Endorsments';
        var directory = 'competition_endorsments';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_competition_managment_team").click(function() {

        var displayName = 'Competition Management Team';
        var directory = 'competition_management_teams';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_competition_work_plans").click(function() {

        var displayName = 'Competition Work Plans';
        var directory = 'competition_work_plans';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_successfull_contract").click(function() {

    var displayName = 'Successfull Contract';
    var directory = 'successfull_contracts';

    console.log("Add " + displayName + " Button Clicked");
    $("#add_document_form #error").remove();
    console.log("Taking Data form add " + displayName + " form");
    var form_fields = $("#add_document_form input");
    var form_selects = $("#add_document_form select");

    console.log("Data taken Successfully");
    console.log("Checking...");
    console.log("Data Elements: " + form_fields.length);
    console.log("Creating a form Object");
    var form_data = new FormData;
    console.log("Form DAta object created successfully");


    for (i = 0; i < form_fields.length; i++) {


        if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

            form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

        } else if (form_fields[i].getAttribute('type') == 'file') {

            console.log("File data exists and proping begins");
            var name = form_fields[i].getAttribute('name');

            form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
            console.log("File append successful");
        }

    }

    if (form_selects.length > 0) {
        for (i = 0; i < form_selects.length; i++) {
            form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
            console.log("Select append successful");
        }
    }

    $.ajax({


        url: base_url + 'index.php/administration/' + directory + '/upload',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
            if (response != 'success') {

                $('.error').remove();
                console.log("The Response:::");
                console.log(response);
                console.log("::");

                var jsonObject = JSON.parse(response);

                console.log("JSON Object Contains " + jsonObject.length + " Elements");

                if (jsonObject.length == 1) {
                    $("#document_file").css("border-color", "red");
                    $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                } else {
                    for (i = 0; i < jsonObject.length; i++) {

                        var name = form_fields[i].getAttribute("name");
                        console.log("The field Name targeted is: " + name);

                        if (jsonObject[i][name] !== true) {
                            console.log("Checking Results from server");
                            console.log("JsonObject No." + i);
                            console.log(name + " equals " + jsonObject[i][name]);
                            if (jsonObject[i][name] !== "success") {
                                console.log("Displaying error msg on field " + name);
                                $("#" + name).css("border-color", "red");
                                $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                            } else {
                                console.log("Displaying success msg on field " + name);
                                $("#" + name).css("border-color", "green");
                            }
                        }

                    }
                }



            } else {
                $('.error').next('input').css("border-color", "green");
                $('.error').remove();
                console.log("document Added successfully");
                $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
            }
        },
        error: function(response) {
            $("#msg").html(response);
        }

    });


});

    $("#add_competition_budget_plans").click(function() {

        var displayName = 'Competition Budget Plans';
        var directory = 'competition_budget_plans';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_group_organisation").click(function() {

        var displayName = 'Group Organisation';
        var directory = 'group_organisations';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_calender_of_meetings").click(function() {

        var displayName = 'Calender Of Meetings';
        var directory = 'calender_of_meetings';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_meeting_guidelines").click(function() {

        var displayName = 'Meeting Guidelines';
        var directory = 'meeting_guidlines';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });

    $("#add_group_leadership").click(function() {

        var displayName = 'Group Leadership';
        var directory = 'group_leaderships';

        console.log("Add " + displayName + " Button Clicked");
        $("#add_document_form #error").remove();
        console.log("Taking Data form add " + displayName + " form");
        var form_fields = $("#add_document_form input");
        var form_selects = $("#add_document_form select");

        console.log("Data taken Successfully");
        console.log("Checking...");
        console.log("Data Elements: " + form_fields.length);
        console.log("Creating a form Object");
        var form_data = new FormData;
        console.log("Form DAta object created successfully");


        for (i = 0; i < form_fields.length; i++) {


            if (form_fields[i].getAttribute('type') == 'text' || form_fields[i].getAttribute('type') == 'password' || form_fields[i].getAttribute('type') == 'hidden') {

                form_data.append(form_fields[i].getAttribute('name'), form_fields[i].value);

            } else if (form_fields[i].getAttribute('type') == 'file') {

                console.log("File data exists and proping begins");
                var name = form_fields[i].getAttribute('name');

                form_data.append(form_fields[i].getAttribute('name'),  $("#" + name).prop('files')[0]);
                console.log("File append successful");
            }

        }

        if (form_selects.length > 0) {
            for (i = 0; i < form_selects.length; i++) {
                form_data.append(form_selects[i].getAttribute('name'), form_selects[i].value);
                console.log("Select append successful");
            }
        }

        $.ajax({


            url: base_url + 'index.php/administration/' + directory + '/upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                if (response != 'success') {

                    $('.error').remove();
                    console.log("The Response:::");
                    console.log(response);
                    console.log("::");

                    var jsonObject = JSON.parse(response);

                    console.log("JSON Object Contains " + jsonObject.length + " Elements");

                    if (jsonObject.length == 1) {
                        $("#document_file").css("border-color", "red");
                        $("#document_file").before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[0]['document_file'] + '</span></div> ');
                    } else {
                        for (i = 0; i < jsonObject.length; i++) {

                            var name = form_fields[i].getAttribute("name");
                            console.log("The field Name targeted is: " + name);

                            if (jsonObject[i][name] !== true) {
                                console.log("Checking Results from server");
                                console.log("JsonObject No." + i);
                                console.log(name + " equals " + jsonObject[i][name]);
                                if (jsonObject[i][name] !== "success") {
                                    console.log("Displaying error msg on field " + name);
                                    $("#" + name).css("border-color", "red");
                                    $("#" + name).before('<div class="error" style="color: red"><span class="fa fa-warning"> ' + jsonObject[i][name] + '</span></div> ');

                                } else {
                                    console.log("Displaying success msg on field " + name);
                                    $("#" + name).css("border-color", "green");
                                }
                            }

                        }
                    }



                } else {
                    $('.error').next('input').css("border-color", "green");
                    $('.error').remove();
                    console.log("document Added successfully");
                    $("#msg").html("<div class='alert alert-success'> Document Added Successfully </div> ");
                }
            },
            error: function(response) {
                $("#msg").html(response);
            }

        });


    });


