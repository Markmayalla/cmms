<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to documents sub-suite...</h3>
            </div>

            <div class="box-body">
                <p>It is a sub-suite belonging to the awareness suite. Aims at sharing technical papers and reports to be uploaded by various PES actors / experts.</p>
            </div>

        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Document</h3>
            </div>

            <div class="box-body">

                <p id="msg"></p>

                <?PHP

                echo form_open_multipart('system/documents/addDocument', array('id' => 'add_document_form'));

                $addDocument = array(
                    '1 text' => 'Title',
                    '2 text' => 'Description',
                    '1 file' => 'Document_File',
                    '1 button' => 'Add_Document'
                );

                create_form($addDocument);

                echo form_close();

                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">My Documents</h3>
            </div>

            <Div class="box-body">

                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Document Title</th>
                        <th>Status</th>
                        <th class="hidden-xs hidden-sm">Published Date</th>
                        <th>Options</th>
                    </tr>

                    <?PHP

                    if (isset($documents)) {
                        foreach ($documents as $key => $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $documents[$key]->title; ?></td>
                                <td><?PHP echo $documents[$key]->status; ?></td>
                                <td class="hidden-xs hidden-sm"><?PHP echo $documents[$key]->publish_time; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/system/documents/edit/<?PHP echo $documents[$key]->id; ?>" class="btn btn-sm btn-info">Edit</span></a>
                                    <a href="<?PHP echo base_url(); ?>index.php/system/documents/delete/<?PHP echo $documents[$key]->id; ?>" class="btn btn-sm btn-danger">&times;</a>
                                </td>
                            </tr>

                            <?PHP
                        }
                    }

                    ?>

                </table>

            </Div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Published Documents</h3>
            </div>

            <Div class="box-body">
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Document Title</th>
                        <th>Publisher Name</th>
                        <th class="hidden-xs hidden-sm">Published Date</th>
                        <th>Options</th>
                    </tr>

                    <?PHP

                    if (isset($documentsAll)) {
                        foreach ($documentsAll as $key => $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $value->title; ?></td>
                                <td><?PHP echo $users[$key]; ?></td>
                                <td class="hidden-xs hidden-sm"><?PHP echo $value->publish_time; ?></td>
                                <td>
                                    <a href="<?PHP echo $value->guide; ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>

                                </td>
                            </tr>

                        <?PHP
                        }
                    }

                    ?>
                </table>
            </Div>
        </div>
    </div>
</div>