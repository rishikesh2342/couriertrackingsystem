<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body >
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div>
            <?php
            if (isset($body)) {
                echo $body;
            }
            ?>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
</html>