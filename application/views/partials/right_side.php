<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">اعلانات</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            <?php
            $notifications = array();
            foreach (@$notifications as $notification) {
                ?>
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-pink">
                            <i class="zmdi zmdi-comment"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name"><?= @$notification['title'] ?></span>
                            <div class="desc"><?= @htmlspecialchars_decode($notification['text']) ?></div>
                            <span
                                class="time"><?= $jdate->date("Y/m/d H:i:s", @$notification['creation_date']) ?></span>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>
</div>