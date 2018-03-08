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
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/about_gym/<?PHP echo $gym->id; ?>/update">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM Name</span>
                                <input type="text" name="name" class="form-control" value="<?PHP echo $gym->name; ?>" />
                            </div>
                        </div>
                        <div class="form-group">

                            <textarea id="gym_description" rows="7" class="form-control" name="description"><?PHP echo $gym->description ?></textarea>

                        </div>
                        <input type="submit" name="update" class="btn btn-info" value="Update" />
                    </form>

                </div>
                <div id="about" class="tab-pane active">
                    <div class="jumbotron">
                        <?PHP echo $gym->description; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">About <?PHP echo strtoupper($gym->name); ?></h3>
            </div>

            <div class="box-body">

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
                zoom: 17
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