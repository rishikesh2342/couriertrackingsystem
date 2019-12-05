
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a style="text-align: center;" href="#">
            <img style="width: 62%;" src="<?php echo TEMPLATE_PATH; ?>account/images/icon/cx-png-2.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1 sidemenu">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                        <a class="js-arrow" href="<?php echo base_url(); ?>dashboard">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                <?php if ($this->session->userdata('userName') === "admin") { ?>
                    
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-code-branch"></i>Branches</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="<?php echo base_url(); ?>addBranch">Add Branch</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manageBranch">Manage Branch</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-users"></i>Staff</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="<?php echo base_url(); ?>addStaff">Add Staff</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manageStaff">Manage Staff</a>
                            </li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Courier</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="<?php echo base_url(); ?>newCourier">New Courier</a>
                            </li>
<!--                            <li>
                                <a href="<?php echo base_url(); ?>courierPickup">Courier Pickup</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shipped">Shipped</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>intransit">Intransit</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>arrivedDestination">Arrieved at Destinaton</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>outofDelivery">Out Of Delivery</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Delivered">Delivered</a>
                            </li>-->
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-chart-bar"></i>Reports</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="<?php echo base_url(); ?>dateWiseReport">Between Dates</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>countWiseReport">Request Counts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>salesReport">Sales Report</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class=" has-sub">
                        <a class="js-arrow" href="<?php echo base_url(); ?>addCourier">
                            <i class="fas fa-tachometer-alt"></i>Add Courier</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="<?php echo base_url(); ?>newCourier">
                            <i class="fas fa-copy"></i>Couriers</a>
<!--                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="<?php echo base_url(); ?>newCourier">Couriers</a>
                            </li>-->
<!--                            <li>
                                <a href="<?php echo base_url(); ?>courierPickup">Courier Pickup</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shipped">Shipped</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>intransit">Intransit</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>arrivedDestination">Arrieved at Destinaton</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>outofDelivery">Out Of Delivery</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Delivered">Delivered</a>
                            </li>-->
                        <!--</ul>-->
                    </li>
                    <li class=" has-sub">
                        <a class="js-arrow" href="<?php echo base_url(); ?>searchCourier">
                            <i class="fas fa-tachometer-alt"></i>Search Courier</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>