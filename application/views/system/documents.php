<div class="row">

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Document</h3>
            </div>

            <div class="box-body">

                <?PHP

                echo form_open_multipart('system/documents', array('id' => 'add_document_form'));

                $loginForm = array(
                    '1 text' => 'title',
                    '2 text' => 'description',
                    '1 file' => 'document',
                    '1 button' => 'Add_Document'
                );

                create_form($loginForm);

                echo form_close();

                ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">My Documents</h3>
            </div>

            <Div class="box-body">

                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Document Title</th>
                        <th>Status</th>
                        <th>Published Date</th>
                    </tr>

                    <tr>
                        <td>Watershed Management</td>
                        <td>Published</td>
                        <td>03-05-2017</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button class="btn btn-sm btn-danger">&times;</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Getting Started with PES</td>
                        <td>draft</td>
                        <td>04-06-2017</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button class="btn btn-sm btn-danger">&times;</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Overview of PES in Tanzania</td>
                        <td>pending</td>
                        <td>02-12-2017</td>
                        <td>
                            <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button class="btn btn-sm btn-danger">&times;</button>
                        </td>
                    </tr>
                </table>

            </Div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Published Documents</h3>
            </div>

            <Div class="box-body">
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Document Title</th>
                        <th>Publisher Name</th>
                        <th>Published Date</th>
                    </tr>

                    <tr>
                        <td>Watershed Management</td>
                        <td>Horace Owiti</td>
                        <td>03-05-2017</td>
                        <td>
                            <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>

                        </td>
                    </tr>

                    <tr>
                        <td>Getting Started with PES</td>
                        <td>Mark Mayalla</td>
                        <td>04-06-2017</td>
                        <td>
                            <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
                        </td>
                    </tr>

                    <tr>
                        <td>Overview of PES in Tanzania</td>
                        <td>Steven Richard</td>
                        <td>02-12-2017</td>
                        <td>
                            <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>

                        </td>
                    </tr>
                </table>
            </Div>
        </div>
    </div>
</div>