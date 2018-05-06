<?php $this->load->helper("form"); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <?php $this->load->view("partials/form_subtitle") ?>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post"
                          action="<?= base_url() . $url; ?>" role="form">

                        <?php $this->load->view("partials/form_fields") ?>

                        <?php $this->load->view("partials/form_extra_parts") ?>

                    </form>
                </div>

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>