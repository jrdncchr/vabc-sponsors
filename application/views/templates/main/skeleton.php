<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $head; ?>
</head>

<body>
<div class="wrapper" style="border-top: 4px solid black;">

    <div id="wrapper">

        <div id="sidebar-wrapper">
            <?php echo $sidenav; ?>
        </div>

        <div id="page-content-wrapper">
            <?php echo $nav; ?>
            <section class="container-fluid" style="padding: 20px;">
                <?php echo $content; ?>
            </section>
        </div>

    </div>

    <div class="push"></div>
</div>

</body>

</html>