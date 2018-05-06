<?php
$this->load->view('partials/head.php');
?>
<body class="fixed-left">

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
                } else if (count($result) > 0) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= @$result['message']; ?>
                    </div>
                    <?php
                }
                ?>
                <input type="hidden" id="base-url" value="<?= base_url() ?>">
                <?php $this->load->view('tables/' . $table, array("data" => $data, "pagination" => $pagination)); ?>
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            <?php $this->load->view('partials/footer'); ?>
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    <?php $this->load->view('partials/right_side.php', @$right_side); ?>
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->

<?php $this->load->view('partials/js_footer'); ?>

</body>
</html>