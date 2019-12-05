
<!-- inner banner -->
<div class="inner-banner" id="home">
    <div class="container">

    </div>	
</div>
<!-- inner banner -->
<!--/Blog-Posts-->
        <!--<section class="banner-bottom-w3layouts py-5" id="blog">-->
            <div class="container">
                <div class="inner-sec-w3ls py-lg-5 py-md-3">
                    <!--/services-grids-->
                    <div class="row blog-sec">
                          <?php
                            foreach ($Branches as $Branch) {  ?>
                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card img">
                                <div class="card-body img">
                                    <img src="<?php echo TEMPLATE_PATH; ?>default/images/blog1.jpg" alt="" class="img-fluid">
                                    <div class="blog-des mt-3">
                                        <h5 class="card-title mt-4"><?php echo $Branch->branch_name ?></h5>
                                        <p class="card-text"><span class="fa ml-3 fa-phone"></span><?php echo $Branch->branch_contactnumber  ?>
                                        </p>
                                        <p class="card-text"><span class="fa ml-3 fa-envelope-open-o"></span><?php echo $Branch->branch_email ?>
                                        </p>
                                        
                                        
                                        <a href="#"> View Details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                       
<!--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card img">
                                <div class="card-body img">
                                    <img src="<?php echo TEMPLATE_PATH; ?>default/images/blog2.jpg" alt="" class="img-fluid">
                                    <div class="blog-des mt-3">
                                        <h5 class="card-title mt-4">Shipping Cargo Transport</h5>
                                        <p class="card-text">Nulla eu elementum quam. Pellentesque consectetur magna purus, nec facilisis. semper at tempus vel, ipsum.
                                        </p>
                                        <a href="#"> Click More </a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
<!--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card img">
                                <div class="card-body img">
                                    <img src="<?php echo TEMPLATE_PATH; ?>default/images/blog1.jpg" alt="" class="img-fluid">
                                    <div class="blog-des mt-3">
                                        <h5 class="card-title mt-4">Shipping Cargo Transport</h5>
                                        <p class="card-text">Nulla eu elementum quam. Pellentesque consectetur magna purus, nec facilisis. semper at tempus vel, ipsum.
                                        </p>
                                        <a href="#"> Click More </a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        <!--</section>-->
        <!--//Blog-Posts-->
