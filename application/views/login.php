<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <?php
    $this->load->view('partials/head.php');
    ?>
</head>
<body>
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="#" class="logo">
            <img width="90px" src="<?= base_url() ?>upload/site_img/logo.png"/>
            <!--            <span><? /*=$this->config->item("site_title");*/ ?></span>
-->        </a>
        <h5 class="text-muted m-t-0 font-600">-</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">ورود</h4>
        </div>
        <div class="panel-body">
            <?php
            if (validation_errors() != '') {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?= validation_errors(); ?>
                </div>
                <?php
            }
            ?>
            <form class="form-horizontal m-t-20" method="post" action="<?= base_url() ?>user/login">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" value="<?= set_value('username'); ?>"
                               name="username" placeholder="نام کاربری">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="پسورد">
                    </div>
                </div>


                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            ورود
                        </button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0 hidden">
                    <div class="col-sm-12">
                        <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> آیا رمز خود را
                            فراموش کرده اید؟</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- end card-box-->


</div>
<!-- end wrapper page -->

<?php $this->load->view('partials/js_footer'); ?>

</body>
</html>
