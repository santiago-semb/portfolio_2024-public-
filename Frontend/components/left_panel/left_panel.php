<style>
    .left-panel {
        float: left;
        width: 0%;
        height: 100vh;
        overflow: auto;
        background-color: #022222;
        transition: 300ms all;
        position: fixed;
    }

    .left-panel-close {
        float: left;
        width: 3%;
        height: 100vh;
        overflow: hidden;
        background-color: black;
        transition: 200ms all;
        position: fixed;
    }

    #btn-close-menu, #btn-open-menu {
        border: none;
        padding: 15px;
        float: right;
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .panel-button {
        display: flex;
        justify-content: end;
        flex-wrap: wrap;
    }

    .logo {
        width: 40px;
        cursor: pointer;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #github {
        filter: invert(100%); /* Esto invertirá todos los colores de la imagen */
        margin-bottom: 40px;
    }
    #linkedin {
        width: 25px;
    }

    .left-panel-content {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 88vh;
    }

    #foto-personal {
        width: 180px;
        height: 180px;
        margin-top: 5px;
        border-radius: 6em;
        /*border-radius: 0.1em;*/
    }

    .data {
        margin: 10px;
        color: whitesmoke;
    }

    .data p {
        margin: 18px;
    }

    .data-big {
        font-size: 20px;
    }
    .data-small {
        font-size: 15px;
        font-weight: bold;
    }
    .cv {
        margin-top: auto;
    }

    #download {
        font-size: 24px;
        color: gainsboro;
    }

    #download:hover {
        cursor: pointer;
    }

    @media screen and (max-width: 1193px) {
        #btn-open-menu {
            margin-right: -3px;
        }
    }

    @media screen and (max-width: 1127px) {
        #btn-open-menu {
            margin-right: -4px;
        }
        #linkedin {
            width: 20px;
        }
        #github {
            width: 35px;
            height: 30px;
        }
    }

    @media screen and (max-width: 979px) {
        .left-panel-close {
            display: none;
        }
        #header {
            display: block;
        }
        .container {
            height: 90vh;
        }
    }

</style>

<?php 
# Modificar las rutas por si se encuentra en index.php (ya que este archivo esta en otro directorio)
(basename($_SERVER['SCRIPT_NAME'])=='index.php') ? 
$leftPanelPathPersonalPhoto = './Frontend/assets/img/foto-santiago(1).png' : $leftPanelPathPersonalPhoto = './assets/img/foto-santiago(1).png';

(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
$leftPanelPathLinkedin = './Frontend/assets/img/logos/logo-linkedin.png' : $leftPanelPathLinkedin = './assets/img/logos/logo-linkedin.png';

(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
$leftPanelPathGithub = './Frontend/assets/img/logos/logo-github.png' : $leftPanelPathGithub = './assets/img/logos/logo-github.png';

# Traer data de la db
(basename($_SERVER['SCRIPT_NAME'])=='index.php') ?
require_once './Backend/Models/Persona.php' : require_once '../Backend/Models/Persona.php';

$santiago = Persona::select(1);
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

<section class="left-panel">
    <div class="panel-button">
        <button id="btn-close-menu"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="left-panel-content">
        <?php if(isset($nombre)): ?>
        <!-- Contenido -->
        <img src="<?php echo $leftPanelPathPersonalPhoto ?>" alt="foto" id="foto-personal">
        <div class="data">
            <hr/>
            <p class="data-big"><?php echo $nombre ?>  <?php echo $apellido ?></p><hr/>
            <p class="data-big"><?php echo $edad ?> años</p><hr/>
            <p class="data-big"><?php echo $ciudad ?>, <?php echo $pais ?></p><hr/>
            <p class="data-small">+<?php echo $telefono ?></p><hr/>
            <p class="data-small"><?php echo $email ?></p><hr/>
        </div>
        <div class="cv">
            <a href="<?php echo $curriculum ?>" target="_blank" id="download"><i class="fa-solid fa-download"></i></a>
        </div>
        <?php else: ?>
            <div style="color: white">
                <i style="font-size: 150px;" class="fa-solid fa-face-frown-open"></i>
                <p style="font-weight: bold; margin-top: 15px">¡Ops! Algo salió mal</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="left-panel-close">
    <button id="btn-open-menu"><i class="fa-solid fa-arrow-right"></i></button>
    <?php if(isset($linkedin) && isset($github)): ?>
    <a href="<?php echo $linkedin ?>" target="_blank"><img class="logo" id="linkedin" src="<?php echo $leftPanelPathLinkedin; ?>" alt="Logo-Linkedin" /></a>
    <a href="<?php echo $github ?>" target="_blank"><img class="logo" id="github" src="<?php echo $leftPanelPathGithub; ?>" alt="Logo-Github" /></a>
    <?php endif; ?>
</section>

<script>
    $(document).ready(function(){
        if(localStorage.getItem("panel") === "open"){
            $(".left-panel").css({
                'width': '20%',
                'display': 'block'
            })
            $(".left-panel-close").css({
                'width': '0%'
            })
            $(".left-panel-content").show()
            $(".container").css({
                'width': '80%',
            })
        }


        $("#btn-close-menu").click(() => {
            localStorage.setItem("panel", "close")
            $(".left-panel").css({
                'width': '0%'
            })
            $(".left-panel-close").css({
                'width': '3%'
            })
            $(".left-panel-content").hide()
            $(".container").css({
                'width': '97%',
                'transition': '300ms all'
            })
        })

        $("#btn-open-menu").click(() => {
            localStorage.setItem("panel", "open")
            $(".left-panel").css({
                'display': 'block',
                'width': '20%'
            })
            $(".left-panel-close").css({
                'width': '0%'
            })
            $(".left-panel-content").show()
            $(".container").css({
                'width': '80%',
            })
        })
    })
</script>