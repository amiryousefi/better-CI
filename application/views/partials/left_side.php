<?php
$CI =& get_instance();
$CI->load->helper("menu");
$menus = menulist();

?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <?php
        $uriseg1 = $this->uri->segment(1);
        $uriseg2 = $this->uri->segment(2);
        @$type = $this->session->userdata('logged_in')['type'];
        @$permission = $this->session->userdata('logged_in')['permissions'];
        ?>
        <!--User -->
        <div class="user-box">
            <div class="user-img">
                <?php
                if ($this->session->userdata('logged_in')['image'] != '') {
                    ?>
                    <img src="<?= base_url() ?>upload/profile/<?= $this->session->userdata('logged_in')['image'] ?>"
                         alt="user-img" title="<?= $this->session->userdata('logged_in')['name'] ?>"
                         class="img-circle img-thumbnail img-responsive">
                    <?php
                } else {
                    ?>
                    <img src="<?= base_url() ?>assets/images/person-flat.png" alt="user-img"
                         title="<?= $this->session->userdata('logged_in')['name'] ?>"
                         class="img-circle img-thumbnail img-responsive">
                    <?php
                }
                ?>

                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#"><?= $this->session->userdata('logged_in')['name'] ?></a></h5>
            <ul class="list-inline">
                <li>
                    <?php
                    if ($this->session->userdata('logged_in')['type'] != 3) {
                        ?>
                        <a href="<?= base_url() ?>user/profile">
                            <i class="zmdi zmdi-account"></i>
                        </a>
                        <?php
                    }
                    ?>
                </li>

                <li>
                    <a href="<?= base_url() ?>user/logout" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!--End User-->

        <!--Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <?php
                foreach ($menus as $menu) {

                    if (isset($menu['level']) && $menu['level'] != $type) {
                        continue;
                    }
                    if (array_key_exists("sub_menu", $menu)) {
                        $class = "";
                        foreach ($menu['sub_menu'] as $sub_menu) {
                            $hrefs = mb_split("/", $sub_menu['href']);
                            if ($hrefs[0] == $uriseg1 && $hrefs[1] == $uriseg2) {
                                $class = " active";
                                break;
                            }
                        }
                        ?>
                        <li class="has_sub">
                        <a href="<?= $menu['href'] ?>" class="waves-effect<?= $class ?>"><i
                                class="zmdi <?= $menu['icon'] ?>"></i>
                            <span><?= $menu['label'] ?></span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <?php
                            foreach ($menu['sub_menu'] as $sub_menu) {
                                if (isset($sub_menu['level']) && $sub_menu['level'] != $type) {
                                    continue;
                                }
                                $child_class = "";
                                $hrefs = mb_split("/", $sub_menu['href']);
                                if ($hrefs[0] == $uriseg1 && $hrefs[1] == $uriseg2) {
                                    $child_class = ' class=" active"';
                                }
                                ?>
                                <li<?= $child_class ?>>
                                    <a href="<?= base_url() . $sub_menu['href'] ?>"><?= $sub_menu['label'] ?></a>
                                </li>
                                <?php
                            } ?>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <li>
                        <a href="<?= base_url() ?><?= $menu['href'] ?>" class="waves-effect"><i
                                class="zmdi <?= $menu['icon'] ?>"></i> <span><?= $menu['label'] ?></span></a>

                        <?php
                    }
                    ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!--Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>