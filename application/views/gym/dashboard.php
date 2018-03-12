<div class="row">
    <div class="col-lg-11">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right" style="cursor: move;">
                <li class="">
                    <a href="#list_view" data-toggle="tab">
                        <span class="fa fa-list"></span> List View
                    </a>
                </li>

                <li class="active">
                    <a href="#map_view" data-toggle="tab">
                        <span class="fa fa-map-marker"></span> Map View
                    </a>
                </li>

                <li class="pull-left header">
                    <span class="fa fa-flash"></span> My Gyms
                </li>
                        
            </ul>

            <div class="tab-content no-padding">
                <div class="tab-pane active" id="map_view">
                    <div id="my_gyms">
                       
                       

                    </div>
                </div>

                <div class="tab-pane" id="list_view">
                    <table class="table table-stripped table-hover" id="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Country</td>
                            <td>Region</td>
                            <td>District</td>
                            <td>Ward</td>
                            <td>Street</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody id="gyms_list">
                         
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    console.log("Running page javascript");
    defer();
    function defer() {
        if (typeof google === 'object' && typeof google.maps === 'object') {
            console.log("Wow, google Maps loaded successfully");
            myGyms();
        } else {
            console.log("Google Maps Not Loaded !!!");
            setTimeout(function() { defer() }, 50);
        }

    }
</script>
 