<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alitas Legendarias - <?php echo $title ?? '' ?></title>
    <meta name="description" content="E-commerce for the restaurant Alitas Legendarias">
    <link rel="icon" type="image/png" href="/build/img/Logo.png">
    <!--CSS - Bootstrap-->
    <link rel="preload" href="/build/css/bootstrap.min.css" as="style">
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <!-- Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!--CSS -->
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <!-- En esta pequeña variable se encuentra TODO el despapaye -->
    <?php echo $contenido; ?>

    <!--JS - Bootstrap-->
    <script src="/build/js/bootstrap.bundle.min.js"></script>
    <?php echo $script ?? ''; ?>
</body>

</html>