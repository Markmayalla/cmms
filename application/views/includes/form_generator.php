<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/19/17
 * Time: 5:51 PM
 */
function underscore_remover($value) {
    return str_replace("_", " ", $value);
}

function create_form($fields) {


    foreach ($fields as $type => $value) {

        $dropdown = array();

        if (strpos($type, "text") != NULL) {

            $non_underscore = underscore_remover($value);


            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_input($field);

        }

        else if (strpos($type, "password") != NULL) {
            $non_underscore = underscore_remover($value);


            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_password($field);

        }

        else if (strpos($type, "file") != FALSE) {
            $non_underscore = underscore_remover($value);

            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));

            echo form_label($non_underscore, $value);
            echo form_upload($field);

        }

        else if (strpos($type, "textarea") != FALSE) {
            $non_underscore = underscore_remover($value);


            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_textarea($field);
        }

        else if (strpos($type, "button") != FALSE) {
            $non_underscore = underscore_remover($value);

            $field = array('id' => strtolower($value), 'name' => strtolower($value), 'class' => 'form-group btn btn-info', 'content' => $non_underscore);
            echo form_button($field);
        }

        else {

            if (is_array($value)) {

                foreach ($value as $dkey => $val) {
                    $dropdown[$dkey] = $val;
                }

                $non_underscore = underscore_remover($type);
                $attributes = 'class="form-control" id="' . $type . '"';
                echo form_label($non_underscore, $type);
                echo form_dropdown($type, $dropdown, $val, $attributes);
            }

        }
    }
}

