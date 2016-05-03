<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $head; ?>
</head>

<body>
<div class="wrapper">
    <?php echo $nav ?>
    <?php echo $content; ?>
    <div class="push"></div>
</div>

<footer class="footer text-center" style="margin-top: 0 !important;">&copy; Copyright <?php echo date('Y') . " " . $project; ?></footer>

</body>

</html>