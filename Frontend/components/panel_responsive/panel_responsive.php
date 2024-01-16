<style>
    #header {
        width: 100%;
        background-color: black;
        display: none;
    }
    #btn-bajar-data{
        padding: 9px;
        background-color: black;
        border: none;
    }
    #btn-bajar-data:hover {
        cursor: pointer;
    }
    #github {
        width: 45px;
        height: 30px;
        float: right;
    }
    #linkedin {
        float: right;
        width: 40px;
        height: 30px;
        margin-right: 15px;
    }
    .logo-responsive {
        margin-top: 4px;
    }
    .logo-responsive:hover {
        cursor: pointer;
    }
    .data-big-responsive{
        font-size: 24px;
        color: white;
        padding: 13px;
        border-bottom: 1px solid white;
        font-family: cursive;
    }
    .data-small-responsive{
        font-size: 18px;
        color: white;
        font-weight: bold;
        padding: 13px;
        font-family: cursive;
        border-bottom: 1px solid white;
    }
    #download-responsive {
        font-size: 24px;
        color: gainsboro;
    }

    #download-responsive:hover {
        cursor: pointer;
    }

    .left-panel-content-responsive {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 88vh;
        margin-left: 80px;
        margin-top: 30px;
        border-radius: 0.3em;
    }

    #foto-personal-responsive {
        width: 180px;
        height: 180px;
        margin-top: 5px;
        /*border-radius: 6em;*/
        border-radius: 0.3em;
    }

    .left-panel-open-responsive {
        display: none;
    }

    @media screen and (max-width: 979px) {
        .left-panel-open-responsive {
            display: block;
        }
    }

    @media screen and (max-width: 305px) {
        .data-big-responsive {
            font-size: 14px;
        }
        .data-small-responsive {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 245px) {
        .data-big-responsive {
            font-size: 11px;
        }
        .data-small-responsive {
            font-size: 11px;
        }
        #foto-personal-responsive {
            width: 120px;
            height: 120px;
        }
    }
</style>

<?php

# Modificar las rutas por si se encuentra en index.php (ya que este archivo esta en otro directorio)
(basename($_SERVER['SCRIPT_NAME'])=='index.php') ? 
$leftPanelPathPersonalPhoto = './Frontend/assets/img/foto-santiago(1).png' : $leftPanelPathPersonalPhoto = './assets/img/foto-santiago(1).png';

(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
$leftPanelPathGithub = './Frontend/assets/img/logos/logo-github.png' : $leftPanelPathGithub = './assets/img/logos/logo-github.png';

(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
$leftPanelPathLinkedin = './Frontend/assets/img/logos/logo-linkedin.png' : $leftPanelPathLinkedin = './assets/img/logos/logo-linkedin.png';

(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
require_once './Backend/Models/Persona.php' : require_once '../Backend/Models/Persona.php';

$santiago = Persona::select(1);
$linkedin = $santiago[0]['linkedin'];
$github = $santiago[0]['github'];
if(isset($santiago[0])){
    $nombre = ucfirst($santiago[0]['nombre']);
    $apellido = ucfirst($santiago[0]['apellido']);
    $edad = $santiago[0]['edad'];
    $pais = ucfirst($santiago[0]['pais']);
    $ciudad = ucfirst($santiago[0]['ciudad']);
    $telefono = $santiago[0]['telefono'];
    $email = $santiago[0]['email'];
    $linkedin = $santiago[0]['linkedin'];
    $github = $santiago[0]['github'];
    $curriculum = $santiago[0]['curriculum'];
}

?>

<header id="header">
    <button id="btn-bajar-data"><i class="fa-solid fa-arrow-down" style="color: white; font-size: 20px"></i></button>
    <a href="<?php echo $linkedin ?>" target="_blank"><img class="logo-responsive" id="linkedin" src="<?php echo $leftPanelPathLinkedin; ?>" alt="Logo-Linkedin" /></a>
    <a href="<?php echo $github ?>" target="_blank"><img class="logo-responsive" id="github" src="<?php echo $leftPanelPathGithub; ?>" alt="Logo-Github" /></a>
</header>

<section class="left-panel-open-responsive">
    <div class="left-panel-content-responsive">
        <?php if(isset($nombre)): ?>
        <!-- Contenido -->
        <img src="<?php echo $leftPanelPathPersonalPhoto ?>" alt="foto" id="foto-personal-responsive">
        <div class="data-responsive">
            <p class="data-big-responsive"><?php echo $nombre ?>  <?php echo $apellido ?></p>
            <p class="data-big-responsive"><?php echo $edad ?> años</p>
            <p class="data-big-responsive"><?php echo $ciudad ?>, <?php echo $pais ?></p>
            <p class="data-small-responsive">+<?php echo $telefono ?></p>
            <p class="data-small-responsive"><?php echo $email ?></p>
        </div>
        <div class="cv">
            <a href="<?php echo $curriculum ?>" target="_blank" id="download-responsive"><i class="fa-solid fa-download"></i></a>
        </div>
        <?php else: ?>
            <div style="color: white">
                <i style="font-size: 150px;" class="fa-solid fa-face-frown-open"></i>
                <p style="font-weight: bold; margin-top: 15px">¡Ops! Algo salió mal</p>
            </div>
        <?php endif; ?>
    </div>
</section>


<script>
    $(document).ready(function(){
        $(".left-panel-open-responsive").hide()
        $("#btn-bajar-data").click(() => {
            $(".left-panel-open-responsive").slideToggle()
            $(".container").toggle()
        })
    })
</script>