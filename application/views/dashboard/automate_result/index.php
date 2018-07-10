<?php
    $error = $this->sessionlib->sess_get($this->sessionlib->flashdata,'request_error');
    $success = $this->sessionlib->sess_get($this->sessionlib->flashdata,"request_success");

    print_r($success);
    print_r($error);
?>