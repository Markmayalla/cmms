/**
 * Created by Mark on 8/18/17.
 */




    var base_url = 'http://localhost/cmms/';
    var site_url = 'http://localhost/cmms/index.php/';

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
	/// Login User In System
	loginObject = {
		password_user : "",
		username : "",
		retry : 3
	}
	
	$("#login_system").click(function(){
	    var tag = "~~AJAX~~  ";
	    console.log(tag + "Login to system function triggered")
		loginForm = $("#login_form").parsley();

		if (loginForm.isValid()) {
            var link = site_url + "web/login_user";
            if(loginObject.retry > 0){
                loginObject.password_user = $("#password_login").val();
                loginObject.username = $("#email_login").val();
                loginObject.retry = loginObject.retry - 1;
                var string = JSON.stringify(loginObject);
                $.ajax(
                    {
                        type : "POST",
                        url : link,
                        data : {
                            username : loginObject.username,
                            password : loginObject.password_user
                        },
                        success : function(response){
                            console.log(tag + "Login Success");
                            console.log(tag + "Displaying Response");
                            console.log(tag + response);
                            window.location.href = site_url + "system"
                            //alert(response);
                        },
                        error : function(response){
                            console.log(tag + "Login Failed")
                        }
                    }
                );
            }else{
                alert("Maximum retry is Three");
            }
        } else {
		    console.log(tag + "Login Form is not valid");
        }

	});
	///User Registration
    regObj = {
        first_name: "",
        last_name: "",
        middle_name: "",
        gender: "",
		accont_type : "",
		password_new : "",
		password_confirm : "",
        phones: [],
        emails: [],
        addresses: []
    };

    $("#password_login").focusout(function () {
        console.log("Focus Change on password field");
        var username = $("#username").val();
        var options = {"type":"POST","dataType":"jsonp","data":{"request":"ajax","username":username}};
        options = JSON.stringify(options);
        console.log(options);
        $("#password_login").attr("data-parsley-remote-options",options);
    });


    $('#step2').hide();
    $('#step3').hide();
    $('#step4').hide();
    $('#step5').hide();
	

    $('#next1').click(function () {

        userStep1 = $('#user_step1').parsley();

        userStep1.whenValidate().done(function () {
            $('#step').html("2");
            $('#reg_progress').css('width', '40%');
            $('#step1').hide();
            $('#step2').show();

            regObj.first_name = $('#first_name').val();
            regObj.last_name = $('#last_name').val();
            regObj.middle_name = $('#middle_name').val();
            regObj.gender = $('#gender').val();

            console.log(regObj);
        });

    });

    userStep3 = $('#user_step3').parsley();

    $('#back_to_1').click(function () {
        $('#step').html("1");
        $('#reg_progress').css('width', '20%');
        $('#step1').show();
        $('#step2').hide();
    });

    $('#back_to_2').click(function () {
        $('#step').html("2");
        $('#reg_progress').css('width', '40%');
        $('#step2').show();
        $('#step3').hide();
    });

    $('#back_to_3').click(function () {
        $('#step').html("3");
        $('#reg_progress').css('width', '60%');
        $('#step3').show();
        $('#step4').hide();
    });
	
	$('#back_to_4').click(function () {
        $('#step').html("4");
        $('#reg_progress').css('width', '80%');
        $('#step4').show();
        $('#step5').hide();
    });

    $('#reset_phone').click(function () {
       regObj.phones = [];
       $('#phones').html(".");
    });

    $('#add_phone').click(function () {
        userStep2 = $('#user_step2').parsley();
        console.log("Add phone triggered");

        userStep2.whenValidate().done(function () {

            console.log("add phone validation true");
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

        });

    });

    $('#reset_email').click(function () {
        regObj.emails = [];
        $('#emails').html(".");
    });

    $('#add_email').click(function () {
        $userStep3 = $('#userStep3').parsley();
        console.log("Add email is Triggered...");
        userStep3.whenValidate().done(function () {
            console.log("Validation Success");
            email = $('#email').val();
            console.log("email: " + email);
            emailObj = {};
            emailObj['email'] = email;
            regObj.emails.push(emailObj);
            emails = $('#emails');
            emails.html("");
            emails.append('<ul></ul>');
            emails = $('#emails ul');

            for (i = 0; i < regObj.emails.length; i++) {
                emails.append("<li>" + regObj.emails[i].email + "</li>");
            }

            console.log(regObj);
        });


    });

    $('#next2').click(function () {
        console.log("Next 2 Clicked...");
        userStep2 = $('#user_step2').parsley();
        console.log(userStep2);

        console.log("User step 2 validation failed");
        userStep2.whenValidate().done(function(){
            console.log("User step 2 validation success");
            $('#step').html("3");
            $('#reg_progress').css('width', '60%');
            $('#step2').hide();
            $('#step3').show();

            console.log(regObj);
        });

    });

    $('#reset_address').click(function () {
        regObj.address = [];
        $('#addresses').html(".");
    });

    $('#add_address').click(function () {

        userStep4 = $('#user_step4').parsley();

        userStep4.whenValidate().done(function () {
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
            regObj.addresses.push(addressObj);
            addresses = $('#addresses');
            addresses.html("");
            addresses.append('<ul></ul>');
            addresses = $('#addresses ul');

            for (i=0;i<regObj.addresses.length;i++) {
                addresses.append("<li>" + regObj.addresses[i].box + ", " +
                    regObj.addresses[i].street + ", " +
                    regObj.addresses[i].district + ", " +
                    regObj.addresses[i].region + ", " +
                    regObj.addresses[i].country + "</li>");
            }

            console.log(regObj);
        });

    });

    $('#next3').click(function () {
		userStep3 = $('#user_step3').parsley();

		userStep3.whenValidate().done(function () {
            $('#step').html("4");
            $('#reg_progress').css('width', '80%');
            $('#step3').hide();
            $('#step4').show();

            console.log(regObj);
        });

	});
	
	$('#next4').click(function () {
		userStep4 = $('#user_step4').parsley();

		userStep4.whenValidate().done(function () {
            $('#step').html("5");
            $('#reg_progress').css('width', '100%');
            $('#step4').hide();
            $('#step5').show();
            console.log(regObj);
        });

	});


///preparation of user registration_form
    $('#finish_user').click(function () {
        userStep4 = $('#user_step5').parsley();
		regObj.password_new = $('#password_user_new').val();
		regObj.accont_type = "user_account";

		userStep4.whenValidate().done(function () {
            var string = escape(JSON.stringify(regObj));
            var link = site_url + "Web/register_user";

            //console.log(link);
            //console.log(string);


            $.ajax({
                url: link,
                type: 'post',
                data: {
                    myData : string
                },
                success: function(response){
                    console.log("registration response");
                    console.log(response);
                    window.location.href = site_url + "web";
                },
                error: function(response){
                    console.log(response);
                }
            });
        });
    });


////Organization Registration
	
	regObj_org = {
        comp_name: "",
        password_new: "",
        account_type: "",
        phones: [],
        emails: [],
        address: []
    };

	
	$('#step2_org').hide();
    $('#step3_org').hide();
    $('#step4_org').hide();
    $('#step5_org').hide();

    $('#next_1_org').click(function () {

        userStep1 = $('#org_step1').parsley();

        if (userStep1.validate()) {

            $('#step_org').html("2");
            $('#reg_progress_org').css('width', '50%');
            $('#step1_org').hide();
            $('#step2_org').show();
            regObj_org.comp_name = $('#name_org').val();
        } else {

        }
    });
	


    userStep2 = $('#user_step2_org').parsley();
    userStep3 = $('#user_step3_org').parsley();

    $('#back_to_1_org').click(function () {
        $('#step_org').html("1");
        $('#reg_progress_org').css('width', '25%');
        $('#step1_org').show();
        $('#step2_org').hide();
    });

    $('#back_to_2_org').click(function () {
        $('#step_org').html("2");
        $('#reg_progress_org').css('width', '50%');
        $('#step2_org').show();
        $('#step3_org').hide();
    });

    $('#back_to_3_org').click(function () {
        $('#step_org').html("3");
        $('#reg_progress_org').css('width', '65%');
        $('#step3_org').show();
        $('#step4_org').hide();
    });
	
	$('#back_to_4_org').click(function () {
        $('#step_org').html("4");
        $('#reg_progress_org').css('width', '75%');
        $('#step4_org').show();
        $('#step5_org').hide();
    });

    $('#reset_phone_org').click(function () {
       regObj_org.phones = [];
       $('#phones_org').html(" ");
    });

    $('#add_phone_org').click(function () {

        if (userStep2.validate()) {
            title = $('#title_org').val();
            number = $('#phone_org').val();
            console.log("title: " + title + ", number: " + number);
            phoneObj = {};
            phoneObj['title'] = title;
            phoneObj['number'] = number;
            regObj_org.phones.push(phoneObj);
            phones = $('#phones_org');
            phones.html("");
            phones.append('<ul></ul>');
            phones = $('#phones_org ul');

            for (i = 0;i < regObj_org.phones.length; i++) {
                phones.append("<li>" + regObj_org.phones[i].title + ": " + regObj_org.phones[i].number + "</li>");
            }

            console.log(regObj_org);
        } else {

        }

    });

    $('#reset_email_org').click(function () {
        regObj_org.emails = [];
        $('#emails_org').html(".");
    });

    $('#add_email_org').click(function () {

        if (userStep2.validate()) {
            email = $('#email_org').val();
            console.log("email_org: " + email);
            emailObj = {};
            emailObj['email'] = email;
            regObj_org.emails.push(emailObj);
            emails = $('#emails_org');
            emails.html("");
            emails.append('<ul></ul>');
            emails = $('#emails_org ul');

            for (i=0;i<regObj_org.emails.length;i++) {
                emails.append("<li>" + regObj_org.emails[i].email + "</li>");
            }

            console.log(regObj_org);
        } else {

        }

    });

    $('#next2_org').click(function () {
        userStep2 = $('#user_step2_org').parsley();

        if (userStep2.validate()) {

            $('#step_org').html("3");
            $('#reg_progress_org').css('width', '75%');
            $('#step2_org').hide();
            $('#step3_org').show();
			
            console.log(regObj_org);

        } else {

        }
    });

    $('#reset_address_org').click(function () {
        regObj_org.address = [];
        $('#addresses_org').html(" No address found");
    });

    $('#add_address_org').click(function () {


        if (userStep3.validate()) {
            box = $('#box_org').val();
            street = $('#street_org').val();
            district = $('#district_org').val();
            region = $('#region_org').val();
            country = $('#country_org').val();
            addressObj = {};
            addressObj['box'] = box;
            addressObj['street'] = street;
            addressObj['district'] = district;
            addressObj['region'] = region;
            addressObj['country'] = country;
            regObj_org.address.push(addressObj);
            addresses = $('#addresses_org');
            addresses.html("");
            addresses.append('<ul></ul>');
            addresses = $('#addresses_org ul');

            for (i=0;i<regObj_org.address.length;i++) {
                addresses.append("<li>" + regObj_org.address[i].box + ", " +
                    regObj_org.address[i].street + ", " +
                    regObj_org.address[i].district + ", " +
                    regObj_org.address[i].region + ", " +
                    regObj_org.address[i].country + "</li>");
            }

            console.log(regObj_org);
        } else {

        }

    });

    $('#next3_org').click(function () {
        userStep3 = $('#user_step3_org').parsley();
        if (userStep3.validate()) {
			$('#step_org').html("4");
			$('#reg_progress_org').css('width', '100%');
			$('#step3_org').hide();
			$('#step4_org').show();
			console.log(regObj_org);
		} else {

		}
	});

		$('#next4_org').click(function () {
			userStep4 = $('#user_step4_org').parsley();

			if (userStep4.validate()) {
				$('#step_org').html("5");
				$('#reg_progress_org').css('width', '100%');
				$('#step4_org').hide();
				$('#step5_org').show();
				console.log(regObj);
			} else {

			}
		});

    $('#finish_organization').click(function () {
        userStep4 = $('#user_step5_org').parsley();

		regObj_org.password_new = $("#password_user_new_org").val();
		regObj_org.account_type = "organization";
	
		console.log(regObj_org);
		
        if (userStep4.validate()) {
			var string = escape(JSON.stringify(regObj_org));
			var link = site_url + "Web/register_organization"; 
			$.ajax({
				url: link,
				type: 'post',
				data: {
					myData : string
				},
				success: function(response){
					alert(response);
				},
				error: function(response){
					alert(response);
				}
			});

        } else {
			alert("failed");
        }
    });
	
	/////Ended here


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


