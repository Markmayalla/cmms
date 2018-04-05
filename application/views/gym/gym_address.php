<div class="row">
    <div class="col-lg-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#about" data-toggle="tab"><span class="fa fa-eye"></span> Preview</a>
                </li>
                <li>
                    <a href="#edit" data-toggle="tab"><span class="fa fa-pencil"></span> Edit</a>
                </li>
                <li class="navbar-header pull-right">
                    <span class="fa fa-info-circle"></span> About <?PHP echo strtoupper($gym->name); ?>
                </li>
            </ul>

            <div class="tab-content">
                <div id="edit" class="tab-pane">
                    <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/gym_address/<?PHP echo $gym->id; ?>/update">
                        <div class="form-group">
                            <label class="control-label" form="phone">Phone</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-phone"></span> </span>
                                <input type="text" name="phone" class="form-control" value="<?PHP echo $gym->phone; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-envelope-o"></span> </span>
                                <input type="text" name="email" class="form-control" value="<?PHP echo $gym->email; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="country">Country</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="country" class="form-control" value="<?PHP echo $gym->country; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="region">Region</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="region" class="form-control" value="<?PHP echo $gym->region; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="district">District</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="district" class="form-control" value="<?PHP echo $gym->district; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="ward">ward</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="ward" class="form-control" value="<?PHP echo $gym->ward; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="street">street</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="street" class="form-control" value="<?PHP echo $gym->street; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="lat">Latitude</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="lat" class="form-control" value="<?PHP echo $gym->lat; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" form="lng">Longitude</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span> </span>
                                <input type="text" name="lng" class="form-control" value="<?PHP echo $gym->lng; ?>" />
                            </div>
                        </div>


                        <input type="submit" name="update" class="btn btn-info" value="Update" />
                    </form>

                </div>
                <div id="about" class="tab-pane active">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>
                                <span class="fa fa-phone"></span> Phone:
                            </strong>
                            <?PHP echo ($gym->phone != "" ? $gym->phone : 'null'); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <span class="fa fa-envelope"></span> Email:
                            </strong>
                            <?PHP echo ($gym->email != "" ? $gym->email : 'null'); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <span class="fa fa-map-marker"></span> Address
                            </strong> <br />
                            Country: <?PHP echo ($gym->country != "" ? $gym->country : 'null'); ?><br />
                            Region: <?PHP echo ($gym->region != "" ? $gym->region : 'null'); ?><br />
                            District: <?PHP echo ($gym->district != "" ? $gym->district : 'null'); ?><br />
                            Ward: <?PHP echo ($gym->ward != "" ? $gym->ward : 'null'); ?><br />
                            Street: <?PHP echo ($gym->street != "" ? $gym->street : 'null'); ?>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Address Information</h3>
            </div>
            <div class="box-body">
                <div id="address_map">
                    <input type="hidden" id="lng" name="lng" value="<?PHP echo $gym->lng; ?>" />
                    <input type="hidden" id="lat" name="lat" value="<?PHP echo $gym->lat; ?>" />
                </div>
                <div id="address_info">
                    <p><strong><?PHP echo strtoupper($gym->name); ?></strong></p>
                    <p><?PHP echo $gym->country; ?>, <?PHP echo $gym->region; ?></p>
                    <p><?PHP echo $gym->ward; ?>, <?PHP echo $gym->street; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    console.log("Running page javascript: Page: About_Gym");
    show_address_map();
    function show_address_map() {
        if (typeof google === 'object' && typeof google.maps === 'object') {
            console.log("google Maps Active");

            var lng = $('#lng').val();
            var lat = $('#lat').val();
            console.log("lat: " + lat + ", lng: " + lng);
            var position = {lat: parseFloat(lat), lng: parseFloat(lng)};
            console.log(position);
            var address_map = new google.maps.Map(document.getElementById('address_map'), {
                center: position,
                zoom: 8
            });

            var marker = new google.maps.Marker({
                position: position,
                map: address_map
            });

            var infoWindow = new google.maps.InfoWindow({
                content: document.getElementById('address_info')
            })

            infoWindow.open(address_map, marker);

        } else {
            console.log("Google Maps Down !!!");
            setTimeout(function() { show_address_map() }, 50);
        }

    }
</script>