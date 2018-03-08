<?PHP $this->load->view('includes/page_start2.php'); ?>



<?PHP

if ($this->session->userdata("user_type") != "admin") {
    echo '<div class="alert alert-danger">This is a Restricted Page, You are Required to have administration privileges before access !! Navigate back to ' . anchor('web/login', 'Login Page') . '</div>';
} else {


        $this->load->view('includes/header2');

        $this->load->view('root/' . $main_content);

}


?>





<?PHP $this->load->view('includes/page_end2.php'); ?>