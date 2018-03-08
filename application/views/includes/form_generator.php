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

function sentence_case($value) {
    $value = underscore_remover($value);

    $sentence_case = array();
    $container = array();

    $value = explode(' ', $value);

    foreach ($value as $word) {
        $sentence_case = str_split($word);
        $sentence_case[0] = strtoupper($sentence_case[0]);
        $sentence_case = implode($sentence_case);
        array_push($container, $sentence_case);
    }

    return implode(' ', $container);
}

function create_form($fields) {


    foreach ($fields as $type => $value) {

        $dropdown = array();

        if (strpos($type, "text") != NULL) {

            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_input($field);

        }

        else if (strpos($type, "password") != NULL) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_password($field);

        }

        else if (strpos($type, "date") != NULL) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            echo form_label($non_underscore, $value);
            $field = array('type' => 'date', 'id' => $value, 'name' => $value, 'class' => 'form-control form-group calender-date', 'value' => set_value($value));
            echo form_input($field);

        }

        else if (strpos($type, "file") != FALSE) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));

            echo form_label($non_underscore, $value);
            echo form_upload($field);

        }

        else if (strpos($type, "textarea") != FALSE) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            echo form_label($non_underscore, $value);
            $field = array('id' => $value, 'name' => $value, 'class' => 'form-control form-group', 'placeholder' => $non_underscore, 'value' => set_value($value));
            echo form_textarea($field);
        }

        else if (strpos($type, "button") != FALSE) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            $field = array('id' => $value, 'name' => $value, 'class' => 'form-group btn btn-info', 'content' => $non_underscore);
            echo form_button($field);
        }

        else if (strpos($type, "submit") != FALSE) {
            $non_underscore = underscore_remover($value);
            $value = strtolower($value);

            echo '<input type="submit" name="' . $value . '" id="' . $value . '" class="btn btn-info form-group" value="' . $non_underscore . '"></input>';
        }

        else {

            if (is_array($value)) {

                foreach ($value as $dkey => $val) {
                    $dropdown[$dkey] = $val;
                }

                $non_underscore = underscore_remover($type);
                $type = strtolower($type);
                $attributes = 'type="select" class="form-control" id="' . $type . '"';
                echo form_label($non_underscore, $type);
                echo form_dropdown($type, $dropdown, $val, $attributes);
            }

        }
    }
}

