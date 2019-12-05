<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body class="animsition">
        <div class="page-wrapper">
<!--            <div class="page-container">
               
            </div>-->
             <?php include 'header.php'; ?>
                <?php include_once 'sidemenu.php'; ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <?php
                        if (isset($body)) {
                            echo $body;
                        }
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php include_once 'footer.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>