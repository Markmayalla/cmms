<div class="row">

    <div class="col-md-4">
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
                    '1 submit' => 'Add_Document'
                );

                create_form($addDocument);

                echo form_close();

                ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">My Documents Edit</h3>
            </div>



            <Div class="box-body">
                <a class="btn btn-sm btn-info form" href="<?PHP echo base_url(); ?>index.php/system/documents"><span class="glyphicon glyphicon-arrow-left"></span> </a>
                <hr />
                <?PHP
                    if (isset($successMsg)) {
                        echo '<div class="alert alert-success">' . $successMsg . '</div>';
                    }
                ?>
                <?PHP echo form_open('system/documents/edit/' . $document->id); ?>
                <input type="text" name="title" class="form-control form-group" value="<?PHP echo $document->title; ?>" />
                <input type="text" name="description" class="form-control form-group" value="<?PHP echo $document->description; ?>" />
                <select name="status" class="form-control form-group">
                    <option name="pending" selected>Pending</option>
                    <option name="published">Published</option>
                </select>
                <input type="submit" name="editDocument" value="Edit Document" class="btn btn-info form-group" />

            </Div>
        </div>
    </div>


</div>