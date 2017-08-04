<?PHP $this->load->view('includes/page_start2.php'); ?>



<?PHP

if ($this->session->userdata("status") != "logged_in") {
    echo '<div class="alert alert-danger">This is a Restricted Page, You are Required to Login before access !! Navigate back to ' . anchor('pes/home', 'Home Page') . '</div>';
} else {


        $this->load->view('includes/header2');

        $this->load->view('system/' . $main_content);

}


?>





<?PHP $this->load->view('includes/page_end2.php'); ?>