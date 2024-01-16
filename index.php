<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Santiago</title>
    <link rel="icon" href="./Frontend/assets/img/banderas/bandera-argentina.png" type="image/x-icon">
    <!-- Css -->
    <link rel="stylesheet" href="Frontend/assets/styles/style.css">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/d3ba0e2c6d.js" crossorigin="anonymous"></script>    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .panel-responsive {
        display: none;
    }
    @media screen and (max-width: 979px) {
        .panel-responsive {
            display: block;
        }
    }
</style>
<body>
    <div id="panel-responsive">
        <?php include 'Frontend/components/panel_responsive/panel_responsive.php'; ?>
    </div>

    <div id="panel">
        <?php include 'Frontend/components/left_panel/left_panel.php'; ?>
    </div>

    <div class="container">
        
        <div class="content">
            
            <?php include 'Frontend/components/presentacion/presentacion.php'; ?>

        </div>

    </div>

<script src="Frontend/assets/js/fondo.js"></script>
</body>
</html>