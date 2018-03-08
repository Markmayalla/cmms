<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/22/17
 * Time: 6:00 PM
 */

class Document_model Extends MY_Model {

    public function addDocument() {

        $documentValues = array();
        $documentValues['title'] = $this->input->post('title');
        $documentValues['description'] = $this->input->post('description');

    }

}