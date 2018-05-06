<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="<?= base_url() ?>" class="logo">
            <img width="90px" src="<?= base_url() ?>upload/site_img/bibimiz_logo.png"/>
            <!--<span><? /*= $this->config->item("site_title"); */ ?></span>-->
            <i
                class="zmdi zmdi-layers"></i></a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Page title -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
                <li>
                    <h4 class="page-title"><?= @$title ?></h4>
                </li>
            </ul>

            <!-- Right(Notification and Searchbox -->
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <!-- Notification -->
                    <div class="notification-box">
                        <ul class="list-inline m-b-0">
                            <li>
                                <a href="javascript:void(0);" class="right-bar-toggle">
                                    <i class="zmdi zmdi-notifications-none"></i>
                                </a>
                                <div class="noti-dot">
                                    <span class="dot"></span>
                                    <span class="pulse"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Notification bar -->
                </li>
                <li class="hidden-xs hidden">
                    <?php
                    $main_search_url = $this->uri->segment(1);
                    @$type = element("type", $this->session->userdata('logged_in'), 0);
                    if ($type == 3) {
                        $main_search_url = "review";
                    }
                    ?>
                    <form action="<?= base_url() . $main_search_url ?>/search" role="search" class="app-search">
                        <input type="text" name="s" placeholder="به دنبال چه می گردی ؟؟؟"
                               class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>