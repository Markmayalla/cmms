<div class="row">

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">User Profile</h3>
            </div>

            <div class="box-body">

                <p id="msg"></p>

                <?PHP

                echo form_open_multipart('system/profile/update/' . $this->session->userdata("user_id"), array('id' => 'add_document_form'));


                ?>

                <div class="form-group">
                    <lable for="first_name" class="control-label">First Name</lable>
                    <input type="text" name="first_name" class="form-control" value="<?PHP echo $user->first_name; ?>" />
                </div>
                <div class="form-group">
                    <lable for="middle_name" class="control-label">Middle Name</lable>
                    <input type="text" name="middle_name" class="form-control" value="<?PHP echo $user->middle_name; ?>" />
                </div>
                <div class="form-group">
                    <lable for="last_name" class="control-label">Last Name</lable>
                    <input type="text" name="last_name" class="form-control" value="<?PHP echo $user->last_name; ?>" />
                </div>
                <div class="form-group">
                    <lable for="email" class="control-label">Email</lable>
                    <input type="text" name="email" class="form-control" value="<?PHP echo $user->email; ?>" />
                </div>
                <div class="form-group">
                    <lable for="phone" class="control-label">Phone</lable>
                    <input type="text" name="phone" class="form-control" value="<?PHP echo $user->phone; ?>" />
                </div>
                <div class="form-group">
                    <lable for="gender" class="control-label">Gender</lable>
                    <select name="gender" class="form-control">
                        <?PHP

                        $male = '';
                        $female = '';

                        if ($user->gender == 'male') {
                            $male = 'selected';
                        } else {
                            $female = 'selected';
                        }
                        ?>
                        <option value="male" <?PHP echo $male; ?>>Male</option>
                        <option value="female" <?PHP echo $male; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <lable for="region" class="control-label">Region</lable>
                    <input type="text" name="region" class="form-control" value="<?PHP echo $user->region; ?>" />
                </div>
                <div class="form-group">
                    <lable for="district" class="control-label">District</lable>
                    <input type="text" name="district" class="form-control" value="<?PHP echo $user->district; ?>" />
                </div>
                <div class="form-group">
                    <lable for="village" class="control-label">Village</lable>
                    <input type="text" name="village" class="form-control" value="<?PHP echo $user->village; ?>" />
                </div>
                <div class="form-group">
                    <lable for="street" class="control-label">Street</lable>
                    <input type="text" name="street" class="form-control" value="<?PHP echo $user->street; ?>" />
                </div>
                <div class="form-group">
                    <lable for="avatar" class="control-label">Avatar</lable>
                    <input type="file" name="avatar" class="form-control" value="<?PHP echo $user->avatar; ?>" />
                </div>
                <div class="form-group">
                    <input type="submit" name="updateProfile" class="btn btn-info form-control" value="Update Profile" />
                </div>
            </div>
        </div>
    </div>
</div>