<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <?php
    $this->load->view('partials/head.php');
    ?>
</head>
<body class="fixed-left">
<input type="hidden" id="base-url" value="<?= base_url() ?>">

<!-- Success Modal -->
<div id="success-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-success">
                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <p></p>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- danger Modal -->
<div id="danger-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-danger">
                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <p></p>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php $this->load->view('partials/header.php', @$header); ?>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <?php $this->load->view('partials/left_side.php', @$left_side); ?>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <?php
                if (@$result['code'] == 1) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= @$result['message']; ?>
                    </div>
                    <?php
                } else if (!empty($result)) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= @$result['message']; ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                //PreProcess incoming data

                if (!isset($data) && isset($result['data'])) {
                    $data = $result['data'];
                }

                if (isset($result) && count($result) == 0) {
                    $result = $this->session->flashdata();
                }

                if (isset($form)) {
                    if (file_exists(APPPATH . "views/forms/" . $form . ".php")) {
                        $this->load->view('forms/' . $form, array("data" => @$data, "extra" => @$extra, "fields" => @$fields, "url" => @$form_url));
                    } else {
                        $this->load->view('forms/default', array("data" => @$data, "extra" => @$extra, "fields" => @$fields, "url" => @$form_url));
                    }
                } else {
                    $this->load->view('tables/' . $list, array("data" => @$data, "extra" => @$extra, "fields" => @$fields, "pagination" => $pagination));
                }
                ?>
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            <?php $this->load->view('partials/footer', @$footer); ?>
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    <?php $this->load->view('partials/right_side.php'); ?>
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->

<?php $this->load->view('partials/js_footer'); ?>

</body>
</html>