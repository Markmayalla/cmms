/**
 * Created by Mark on 8/18/17.
 */



    ///This variable set the time to check is assets available
    /// 1 = 1s;
    var select_asset_interval_time = 20;
    var asssetsInterval;
    initiateInterval();

    var base_url = 'http://localhost/cmms/';
    var site_url = 'http://localhost/cmms/index.php/';

    console.log("The Monster is Active");

    $('#default_form').parsley();
    $('#add_asset_form').parsley();



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

    //$('#spices').DataTable();
    //$('#meals').DataTable();
    //$('#contacts').DataTable();
    //$('#products_table').DataTable();
    //$('#default_table').DataTable();
	/// Login User In System
	loginObject = {
		password_user : "",
		username : "",
		retry : 3
	}

	$("#login_system").click(function(){
	    var tag = "~~AJAX~~  ";
	    //console.log(tag + "Login to system function triggered")
		loginForm = $("#login_form").parsley();

		loginForm.whenValidate().done(function () {
            var link = site_url + "web/login_user";
            if(loginObject.retry > 0){
                loginObject.password_user = $("#password_login").val();
                loginObject.username = $("#username").val();
                loginObject.retry = loginObject.retry - 1;
                var string = JSON.stringify(loginObject);
                $.ajax(
                    {
                        type : "POST",
                        url : link,
                        data : {
                            username : loginObject.username,
                            password_user : loginObject.password_user
                        },
                        success : function(response){
                            //console.log(tag + "Login Success");
                            //console.log(tag + "Displaying Response");
                            //console.log(tag + response);
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
        });
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

    $("#password_org").focusout(function () {
        console.log("Focus Change on password field");
        var username = $("#username_org").val();
        var options = {"type":"POST","dataType":"jsonp","data":{"request":"ajax","username":username}};
        options = JSON.stringify(options);
        console.log(options);
        $("#password_org").attr("data-parsley-remote-options",options);
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
        userStep3 = $('#user_step3').parsley();
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
                    //window.location.href = site_url + "web";
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
        phones: [],
        emails: [],
        address: [],
        account: {
            "username":"",
            "password":""
        }
    };


	$('#step2_org').hide();
    $('#step3_org').hide();
    $('#step4_org').hide();
    $('#step5_org').hide();
    $('#success_msg').hide();

    $('#next_1_org').click(function () {

        userStep1 = $('#org_step1').parsley();

        userStep1.whenValidate().done(function () {
            $('#step_org').html("2");
            $('#reg_progress_org').css('width', '50%');
            $('#step1_org').hide();
            $('#step2_org').show();
            regObj_org.comp_name = $('#name_org').val();
        });

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

        userStep2.whenValidate().done(function () {
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
        });


    });

    $('#reset_email_org').click(function () {
        regObj_org.emails = [];
        $('#emails_org').html(".");
    });

    $('#add_email_org').click(function () {

        userStep2.whenValidate().done(function () {
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
        });
    });

    $('#next2_org').click(function () {
        userStep2 = $('#user_step2_org').parsley();

        userStep2.whenValidate().done(function () {
            $('#step_org').html("3");
            $('#reg_progress_org').css('width', '75%');
            $('#step2_org').hide();
            $('#step3_org').show();

            console.log(regObj_org);
        });

    });

    $('#reset_address_org').click(function () {
        regObj_org.address = [];
        $('#addresses_org').html(" No address found");
    });

    $('#add_address_org').click(function () {


        userStep3.whenValidate().done(function () {
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
        });

    });

    $('#next3_org').click(function () {
        userStep3 = $('#user_step3_org').parsley();
        userStep3.whenValidate().done(function () {
            $('#step_org').html("4");
            $('#reg_progress_org').css('width', '100%');
            $('#step3_org').hide();
            $('#step4_org').show();
            console.log(regObj_org);
        });

	});

		$('#next4_org').click(function () {
			userStep4 = $('#user_step4_org').parsley();

			userStep4.whenValidate().done(function () {
                $('#step_org').html("5");
                $('#reg_progress_org').css('width', '100%');
                $('#step4_org').hide();
                $('#step5_org').show();
                console.log(regObj);
            });

		});

    $('#finish_organization').click(function () {
        userStep4 = $('#user_step5_org').parsley();

		console.log(regObj_org);

        userStep4.whenValidate().done(function () {
            regObj_org.account.username = $("#username_org").val();
            regObj_org.account.password = $("#password_org").val();
            var string = escape(JSON.stringify(regObj_org));
            var link = site_url + "web/register_organization";
            $.ajax({
                url: link,
                type: 'post',
                data: {
                    myData : string
                },
                success: function(response){
                    $('#success_msg').show();
                    $('#user_step5_org').hide();
                },
                error: function(response){
                    alert(response);
                }
            });
        });

    });

	/////Ended here

    $("#add_asset_btn").click(function () {
        var add_asset_form = $("#add_asset_btn").parsley();
        add_asset_form.whenValidate().done(function () {
           var name = $("#asset_name").val();
           var model = $("#asset_model").val();
           var data = {name: name, model: model};

           $.ajax({
               url: site_url + "system/add_asset",
               type: "post",
               data: data,
               success: function () {
                   $("#success_msg_msg").html("Asset Added");
                   $("#success_msg").show();
               },
               error: function () {

               }
           });
        });
    });


	$("#add_item_btn").click(function () {
        var add_item_form = $("#add_item_form").parsley();
        add_item_form.whenValidate().done(function () {

			var y = document.getElementById("add_item_form").elements.length;

			var array_data = {};
			for(var i = 0; i < y; i++){
				var x = document.getElementById("add_item_form").elements[i].id;
				if(($("#"+x).is(":button"))){

				}else{
					array_data[x] = $("#"+x).val();
				}
			}

			console.log(array_data);
           $.ajax({
               url: site_url + "system/add_item_to_db",
               type: "post",
               data: array_data,
               success: function (response) {
                   $("#success_msg_msg").html(response);
                   $("#success_msg").show();
               },
               error: function () {

               }
           });

        });
    });


    /////Updating Password and Assign Task

    $("#update_account_type_btn").click(function () {
        var update_account_type = $("#update_account_type").parsley();
           var pass = $("#account_type").val();
           var new_pass = $("#user_id_to_edit").val();
           var data = {user_account: pass, user_id: new_pass,action:"account"};

           console.log(data);
           $.ajax({
               url: site_url + "system/update_user_password_admin",
               type: "post",
               data: data,
               success: function (response) {
                   console.log("returned " + response);
                   $("#update_user_password_success_msg_msg").html(response);
                   $("#update_user_password_success_msg").show();
               },
               error: function () {

               }
        });
    });

    $("#update_user_password_btn").click(function () {
        var update_user_password = $("#update_user_password").parsley();
           var pass = $("#password_new_password_update").val();
           var new_pass = $("#password_confirm_password_update").val();
           var user = $("#user_id_to_edit").val();
           var data = {password: pass, new_password: new_pass, user_id : user,action:"password"};

           console.log(data);
           if(pass !== new_pass){
                $("#update_user_password_wrong_msg_msg").html("Password Mismatch");
                $("#update_user_password_wrong_msg").show();
                $("#update_user_password_success_msg").hide();
           }else{
                $.ajax({
                    url: site_url + "system/update_user_password_admin",
                    type: "post",
                    data: data,
                    success: function (response) {
                        console.log("returned " + response);
                        $("#update_user_password_success_msg_msg").html(response);
                        $("#update_user_password_success_msg").show();
                        $("#update_user_password_wrong_msg").hide();
                    },
                    error: function () {

                    }
                });
            }
    });

    ///End assigning


    /// AJAX BASED SEARCH SUGGESTIONS

    function showAssets(str) {
        $.ajax({
            url: site_url + "system/asset_suggestions",
            type: "post",
            data: {
                myData: "%" + str + "%"
            },
            success: function (response) {
                var data = JSON.parse(response);
                var datalist = $("#assets_names");
                for (var i=0; i<data.length; i++) {
                    var option = document.createElement("option");
                    option.value = data[i].name;
                    datalist.appendChild(option);
                    console.log(data[i].name);
                }

            },
            error: function (error) {

            }
        });
    }

    /// ASSIGN ASSETS AJAX REQUEST
    var assign_asset_form = $('#assign_asset_form').parsley();

    $('#assign_asset').click(function() {
       assign_asset_form.whenValidate().done(function() {
           var organization_id = $('#organization_id').val();
           var serial_no = $('#serial_no').val();
           var price = $('#price').val();
           var due_date = $('#due_date').val();
           var asset_id = $('#asset_id').val();

           var data = {
               'organizations_id': organization_id,
               'serial_no': serial_no,
               'price': price,
               'due_date': due_date,
               'assets_id': asset_id
           };

           $.ajax({
               url: site_url + 'system/assign_asset',
               type:'post',
               data: data,
               success: function(response) {
                    if (response == true) {
                        alert('true: ' + response);
                    } else {
                        alert('false: ' + response);
                    }
               },
               error: function(error) {
                    console.log(error);
               }
           })
       });
    });
	
	
	
	
	
	
	
	
	//////Request TAsk
	
	var request_task_form = $('#request_task_form').parsley();

    $('#request_task').click(function() {
       request_task_form.whenValidate().done(function() {
           var desc = $('#description').val();
           var serial_no = $('#serial_no_request').val();

           var data = {
               'description': desc,
               'serial_no': serial_no
           };
			
           $.ajax({
               url: site_url + 'system/request_task',
               type:'post',
               data: data,
               success: function(response) {
                    $("#success_msg_msg_request").html(response);
					$("#success_msg_request").show();
					console.log(response);
               },
               error: function(error) {
                    console.log(error);
               }
           })
       });
    });


	////VIEW LOADERS
	function loadAssetId(id){
        $('#asset_id').val(id);
    }
	
	function loadAssetIdVy(id){
        $('#serial_no_request').val(id);
    }

    function loadUserIdView(id){
        $('#user_id_to_edit').val(id);
    }
    
	
	function loadRequestIdView(id){
		$.ajax({
			type : "post",
			url : site_url + "system/load_description",
			data : {
				serial_no : id
			},
			success : function(response){
				alert(response);
				console.log(response);
			}
		});
	}


    //////// AUTOOMATION PLACE //////////////

    $auto_sms = $('#automated_classess_sms');
    $loader = $('#automatomate_loading');
    
    $sleepingtime = 1000;
    function select_all_assets_on_due_date(){
        $auto_sms.html("Selecting assets ....");
        $("#loader_layout").css('display','block');
        $loader.css('width', '10%');
        //sleep($sleepingtime);
        selecting_assets(true);
    }

    function selecting_assets(is_true){
        clearInterval(asssetsInterval);
        $.ajax({
            type : "post",
            url : site_url + "automate",
            success : function (response){
                var data_return = JSON.parse(response);
                if(data_return.success){
                    $auto_sms.html(data_return.sms_back);
                    if(is_true){
                        insert_request(data_return.assets);
                    }else{
                        select_all_assets_on_due_date();
                    }
                    $loader.css('width', '20%');
                }else{
                    $auto_sms.html("No assets is on due date");
                    $loader.css('width', '100%');
                    initiateInterval();
                }
            },
            error : function(response){
                sleep($sleepingtime);
               // window.location = site_url + "system/view/automate_result";
            }
        });
    }

    function insert_request(requests){
        //console.log(requests);
         $.ajax({
             type : 'POST',
             url : site_url + "automate/insert_request",
             data : {data :requests},
             success : function (response){
                 $auto_sms.html("request Added, success assigning worker.");
                 $loader.css('width', '40%');
                 selecting_worker(response);

             },
             error : function(response){
                sleep($sleepingtime);
               //  window.location = site_url + "system/view/automate_result";
             }
         });
    }

    function selecting_worker(request){
        $auto_sms.html('selecting worker on due date..');
        $loader.css('width', '45%');
        var request_s = JSON.parse(request);
        $.ajax({
            type : "POST",
            url : site_url + "automate/select_worker_on_date",
            data : {data : request_s.request },
            success : function (response){
                $auto_sms.html('Worker arranged..');
                $loader.css('width', '65%');
                create_task(response);
            },
            error : function(response){
                sleep($sleepingtime);
               // window.location = site_url + "system/view/automate_result";
            }
        });
    }

    function create_task(worker_with_task){
        $auto_sms.html('Creating task..');
        $loader.css('width', '85%');
        var task = JSON.parse(worker_with_task);
        $.ajax({
            type : "POST",
            url : site_url + "automate/insert_task",
            data : { data : task},
            success : function(response){
                $auto_sms.html(response + " Task(s) created success.");
                $loader.css('width', '100%');
                sleep($sleepingtime);
                $("#loader_layout").css('display','none');
                initiateInterval();
                //window.location = site_url + "system/view/automate_result";
            },
            error : function(){
                
                $auto_sms.html("Task errors .");
                $loader.css('width', '100%');
                sleep($sleepingtime);
                $("#loader_layout").css('display','none');
               // window.location = site_url + "system/view/automate_result";
               initiateInterval();
            }
        });
    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
          if ((new Date().getTime() - start) > milliseconds){
            break;
          }
        }
      }



      var myVar = setInterval(myTimer, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("TheTimeExcuter").innerHTML = d.toLocaleTimeString();
        }

   
    function initiateInterval(){
        console.log("Time initiated " + select_asset_interval_time + "s recurseve");
        asssetsInterval = setInterval(select_all_assets_on_due_date_intervaled,(select_asset_interval_time * 1000))
    }
     function select_all_assets_on_due_date_intervaled(){
        selecting_assets(false);
    }