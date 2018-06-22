<div id="request_assets" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Request Asset Maintenance</h4>
            </div>

            <div class="modal-body">
                <form id="request_task_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg_request" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg_request"></p>
                    </div>

                    <input type="text" id="serial_no_request" value="" readonly />


                    <div class="form-group">
                        <label class="control-label" for="serial_no">Description.</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Provide short problem desc" required rows="10" ></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="request_task" class="btn btn-info">Request Task</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
