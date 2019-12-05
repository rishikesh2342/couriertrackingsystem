<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div style="float: right;" class="header-wrap">

                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">

                            <div class="content">
                                <a class="js-acc-btn" href="#">
                                    <?php
                                    $username = $this->session->userdata('userName');
                                    if (isset($username)) {
                                        echo $username;
                                    } else {
                                        echo 'Username';
                                    }
                                    ?>

                                </a>
                            </div>
                            <?php
                            $username = $this->session->userdata('userName');
                            if ($username === "admin") {
                                ?>
                                <div class="account-dropdown js-dropdown">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url(); ?>logout">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="account-dropdown js-dropdown">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url(); ?>profile">
                                                <i class="zmdi zmdi-account"></i>profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url(); ?>changePassword">
                                                <i class="zmdi zmdi-settings"></i>Change Password</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url(); ?>logout">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>