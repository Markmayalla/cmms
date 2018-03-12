/**
 * Created by Mark on 1/2/18.
 */


console.log("Hey, GIS is Active");
//this is my path 
var gis_base_url = 'http://localhost/FITNESS/wellnessgurufit/';
var map;
var marker;
var infowindow;
var messagewindow;

function initMap() {
    try {
        $('#map_form').hide();
        $('#message').hide();
        $('.new_user').hide();
        $('.existing_user').hide();
        var dar = {lat: -6.8104, lng: 39.2866};
        gymMap = new google.maps.Map(document.getElementById('gymMap'), {
            center: dar,
            zoom: 13
        });

        infowindow = new google.maps.InfoWindow({
            content: document.getElementById('map_form')
        });

        messagewindow = new google.maps.InfoWindow({
            content: document.getElementById('message')
        });

        google.maps.event.addListener(gymMap, 'click', function(event) {
            console.log("map clicked");
            marker = new google.maps.Marker({
                position: event.latLng,
                map: gymMap
            });

            google.maps.event.addListener(marker, 'click', function(event){
                console.log("Marker Clicked");
                console.log("Adding GeoData to Hidden Form Fields");
                $("#lat").val(event.latLng.lat());
                $("#lng").val(event.latLng.lng());
                $('#map_form').show();
                $('#gis_email').removeAttr('disabled');
                infowindow.open(gymMap, marker);
            });
        });
    } catch (e) {
        console.log("Error: initMap, GIS: " + e);
    }
}



function myGyms() {
    console.log("AJAX request running getting contents from the remote server");
    $.ajax({
        type: 'GET',
        url: gis_base_url + 'index.php/gym/ajaxRequestGyms',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function(data) {
            console.log("Server Response: " + JSON.stringify(data));
            var serverResponse = JSON.parse(JSON.stringify(data));

            console.log("myGyms function Triggered from on Load");
            var dar = {lat: -6.8104, lng: 39.2866};
            console.log("Declared Dar Longitudes and Latitudes");
            my_gyms = new google.maps.Map(document.getElementById('my_gyms'), {
                center: dar,
                zoom: 12
            });

            for (var i = 0; i < serverResponse.length; i++) {

                try {
                    console.log("Getting gym_list instance and start appending to it");
                    var gym_instance = $('#gyms_list');
                    console.log('i equals ' + i);
                    gym_instance.append('<tr></tr>');
                    var i_increment = i + 1;
                    var gym_instance_child = ':nth-child(' + i_increment + ')';
                    console.log('Gym INstance Child: ' + gym_instance_child);
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].name + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].country + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].region + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].district + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].ward + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>' + serverResponse[i].street + '</td>');
                    gym_instance.children(gym_instance_child).append('<td>');
                    var manage_gyms = gis_base_url +"index.php/gym/manage_gym/" + serverResponse[i].id;
                    gym_instance.children(gym_instance_child).children(':nth-child(7)').append('<a href="' + manage_gyms + '" class="btn btn-sm btn-success">');
                    gym_instance.children(gym_instance_child).children(':nth-child(7)').append('<a href="#" class="btn btn-sm btn-danger">');
                    gym_instance.children(gym_instance_child)
                        .children(':nth-child(7)').children(':nth-child(1)').append('<span class="fa fa-cogs">');
                    gym_instance.children(gym_instance_child)
                        .children(':nth-child(7)').children(':nth-child(2)').append('<span class="fa fa-trash-o">');



                } catch (e) {
                    console.log(e);
                    console.log("Something wrong with my way of appending data");
                }


                display_map();

                function display_map() {
                    if (typeof google === 'object' && typeof google.maps === 'object') {
                        console.log("Wow, google Maps Active");

                        marker = new google.maps.Marker({
                            position: {lat: parseFloat(serverResponse[i].lat), lng: parseFloat(serverResponse[i].lng)},
                            map: my_gyms
                        });

                        infowindow = new google.maps.InfoWindow({
                            content: "Gym Name: <strong>" + serverResponse[i].name + "</strong> <br />" +
                                "Country: <strong> " + serverResponse[i].country + "</strong><br /> " +
                                "Ward: <strong>" + serverResponse[i].ward + "</strong>" +
                                "<br /><hr/><a href='" + gis_base_url +"index.php/gym/manage_gym/" + serverResponse[i].id + "' " +
                                "class='btn btn-sm btn-success'><span class='fa fa-cogs'></span> </a> " +
                                "<a href='#' class='btn btn-sm btn-danger'><span class='fa fa-trash-o'></span> </a>"
                        });

                        infowindow.open(my_gyms, marker);
                    } else {
                        console.log("Google Maps Down !!!");
                        setTimeout(function() { display_map() }, 50);
                    }

                }

            }

        },
        error: function(e) {
            console.log("AJAX Error: " + e);
        }
    });



    console.log("End of myGyms Function");
}

window.onload = function() {
    if (window.jQuery) {
        console.log("jQuery if fucking Active");
    } else {
        console.log("Sorry, jQuery is down");
    }
}


$('#gis_email').focusout(function() {
    console.log("email focus is out");
    $.post(gis_base_url + "index.php/web/host_gym/ajax_check_email", {
        gis_email: $('#gis_email').val()
    }, function(data, status) {
        console.log('Data: ' + data + ' Status: ' + status);
        if (data == 'user_exist') {
            $('.new_user').hide();
            $('.ajax_response').remove();
            $('#gymMap').before('<div class="alert alert-success ajax_response">Email Exists, Please fill in your password</div>');
            $('#gis_password').removeAttr('disabled');
            $('.existing_user').show();
        } else {
            $('.existing_user').hide();
            $('.ajax_response').remove();
            $('#gymMap').before("<div class='alert alert-danger ajax_response'>Email does not exist in our database, kindly register.</div>");
            $('.new_user').show();
        }
    });
});

$('#gis_password').keyup(function() {
   console.log("Password Focus Out");
    $.post(gis_base_url + "index.php/web/host_gym/ajax_check_password", {
        gis_email: $('#gis_email').val(),
        gis_password: $('#gis_password').val()
    }, function(data, status){
        if (data == 'valid_password') {
            $(".ajax_response").remove();
            $(".form-control").removeAttr('disabled');
            $("#gis_password").after("<p class='ajax_response text-success'>Valid Password, you can host a GYM</p> ");
        } else {
            $(".ajax_response").remove();
            $("#gis_password").after("<p class='ajax_response text-danger'>Invalid Password</p>");
        }
    });
});

$('#gis_submit').click(function() {
    console.log('Submit Button Clicked');
    var gis_email = $("#gis_email").val();
    var gym_name = $('#gym_name').val();
    var gym_description = $('#gym_description').val();
    var country = $('#country').val();
    var region = $('#region').val();
    var district = $('#district').val();
    var ward = $('#ward').val();
    var street = $('#street').val();
    var lat = $('#lat').val();
    var lng = $('#lng').val();

    if (gym_name != "" && country != "" && region != "") {
        console.log("Form is good to go");
        var post_data = {
            gis_email: gis_email,
            gym_name: gym_name,
            gym_description: gym_description,
            country: country,
            region: region,
            district: district,
            ward: ward,
            street: street,
            lat: lat,
            lng: lng
        };

        console.log("Collected DAta: " + post_data);

        $.ajax({
            type: 'post',
            url: gis_base_url + "index.php/web/host_gym/ajax_add_gym",
            data: post_data,
            success: function(data) {
                console.log("Result callback called");
                if (data == 'gym_added') {
                    console.log("Gym Successfully Added");
                    $('.form_container').hide();
                    $('#gym_reg_form').append("<div class='alert alert-success'>Bravo, the GYM was added successfully</div>")
                } else {
                    console.log("Something went wrong, ERROR");
                    $('#gymMap').before("<div class='alert alert-danger ajax_response'>" + data + "</div>");
                }
            }
        });

        /**
        $.post(gis_base_url + "index.php/web/host_gym/ajax_add_gym", JSON.stringify(post_data) , function(data, status) {
            console.log("Result callback called");
            if (data == 'gym_added') {
                console.log("Gym Successfully Added");
                $('.form_container').hide();
                $('#gym_reg_form').append("<div class='alert alert-success'>Bravo, the GYM was added successfully</div>")
            } else {
                console.log("Something went wrong, ERROR");
                $('#gymMap').before("<div class='alert alert-danger ajax_response'>" + data + "</div>");
            }
        });
         **/

        console.log("Ajax Request Sent");
    }
});




