<div id="request_assets" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Request Asset Maintenance</h4>
            </div>

            <div class="modal-body">
                <form action="<?=site_url();?>/requests/asset_request" method="POST">
                    <input type="text" id="serial_no_request" name="serial_no_request" value="" readonly />


                    <div class="form-group">
                        <label class="control-label" for="serial_no">Description.</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Provide short problem desc" required rows="10" ></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Request Task</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
