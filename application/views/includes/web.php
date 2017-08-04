<?PHP $this->load->view('includes/page_start.php'); ?>



<?PHP $this->load->view('includes/header'); ?>

<div class="container-fluid">
    <?PHP
        $this->load->view('web/' . $main_content);
    ?>
</div>

<?PHP $this->load->view('includes/footer'); ?>


<?PHP $this->load->view('includes/page_end.php'); ?>