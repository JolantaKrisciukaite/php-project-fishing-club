<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF</title>
    <style>
        @font-face {
        font-family: 'Rubik';
        font-style: normal;
        font-weight: 400;
        src: url(<?php echo e(asset('fonts/Rubik-BlackItalic.ttf')); ?>);
        }
        @font-face {
        font-family: 'Rubik';
        font-style: normal;
        font-weight: bold;
        src: url(<?php echo e(asset('fonts/Rubik-Bold.ttf')); ?>);
        }
        body {
        font-family: 'Rubik';
        }
        </style>

</head>
<body>
    <small>Reservoir title: <?php echo e($reservoir->title); ?></small>
    <small>Reservoir area:<?php echo e($reservoir->area); ?></small>
    <small>Reservoir about:<?php echo $reservoir->about; ?></small>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/reservoir/pdf.blade.php ENDPATH**/ ?>