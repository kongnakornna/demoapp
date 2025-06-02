<!-- BEGIN PAGE BODY -->
<?php #  $this->load->view('user/pagewrapper'); ?>
<div class="page-body">
    <?php  /*****body**********/  ?>
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <?php ######## card_box_1?>
            <?php $this->load->view('user/card_box_1'); ?>
        </div>
    </div>
    <?php /*****body**********/?>
    <?php $this->load->view('user/card_user_dashboard'); ?>
</div> <!-- END PAGE BODY -->
<!-- END PAGE BODY -->
<?php 
  $this->load->view('user/data_js_d2');
 $this->load->view('user/page_script_js');
?>