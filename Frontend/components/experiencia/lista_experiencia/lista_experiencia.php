<style>
    .container-experiencia {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 85%;
        margin: auto;
        flex-direction: column;
    }
    .experience-list {
        width: 100%;
        opacity: 0; /* Inicialmente, el div está oculto */
        animation: fadeIn 1.5s forwards; /* Aplicar animación de fade-in */
        animation-delay: 0.5s; /* Retardo de 2 segundos antes de que comience la animación */
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    #titulo-experiencia {
        margin-top: 100px;
        margin-bottom: 20px;
        border-bottom: 2px solid white;
    }
    .exp-item {
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: center;
        flex-wrap: nowrap;
        width: 100%;
        height: 300px;
        margin: 15px;
    }
    .exp-img {
        width: 220px;
        height: 220px;
        margin-left: 18px;
    }
    .exp-data{
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        width: 75%;
        height: 100%;
        margin: 0 auto;
        margin-top: 80px;
        max-width: 75%;
        max-height: 100%;
        flex-wrap: nowrap;
    }
    .exp-data h3 {
        margin: 0 auto;
        padding-top: 5px;
        padding-bottom: 5px;
        color: whitesmoke;
        text-transform: uppercase;
        border-bottom: 2px solid #ccc;
    }
    .exp-data span {
        color: whitesmoke;
        padding: 15px;
    }

    @media screen and (max-width: 1173px) {
        .exp-img {
            width: 180px;
            height: 180px;
        }
    }

    @media screen and (max-width: 997px) {
        .exp-data span {
            padding: 12px;
            font-size: 14px;
        }
    }

    @media screen and (max-width: 825px) {
        .exp-img {
            margin-right: 30px;
            margin-top: 70px;
        }
        .exp-data {
            height: 70%;
            overflow: auto;
        }
    }

    .exp-item-responsive {
        display: none;
        text-align: center;
        margin-top: 35px;
    }
    .exp-item-responsive h3 {
        text-transform: uppercase;
        border-bottom: 2px solid white;
        color: white;
        width: 50%;
        margin-bottom: 15px;
        margin: 0 auto;
    }
    .exp-item-responsive span {
        color: white;
    }
    .exp-img-responsive {
        width: 200px;
        height: 200px;
        border-radius: 2em;
    }
    .exp-img-responsive:hover {
        cursor: pointer;
    }

    @media screen and (max-width: 531px) {
        .exp-item {
            display: none;
        }
        .exp-item-responsive {
            display: block;
        }
    }

    @media screen and (max-width: 411px) {
        .exp-img-responsive {
        width: 150px;
        height: 150px;
        border-radius: 2em;
    }
        .exp-item-responsive span {
           font-size: 12px; 
        }
    }

</style>

<?php 

require_once "$_SERVER[DOCUMENT_ROOT]/Backend/Models/Experiencia.php";

$experiencias = Experiencia::select();

?>

<section class="container-experiencia">

    <?php if(count($experiencias)===0): ?>
        <?php include "$_SERVER[DOCUMENT_ROOT]/Frontend/components/no_data/no_data.php" ?>
    <?php else: ?>

    <h1 id="titulo-experiencia"></h1>
    <div class="experience-list">
        <?php $index=1; foreach($experiencias as $experiencia): ?>
            <?php if($index % 2 == 1): ?>
            <div class="exp-item">
                <img src="<?php echo $experiencia['img'] ?>" alt="experiencia-<?php echo $experiencia['empresa'] ?>" class="exp-img">
                <div class="exp-data">
                    <h3><?php echo $experiencia['empresa'] ?></h3>
                    <span><?php echo $experiencia['descripcion'] ?></span>
                </div>
            </div>
            <?php else: ?>
            <div class="exp-item">
                <div class="exp-data">
                <h3><?php echo $experiencia['empresa'] ?></h3>
                    <span><?php echo $experiencia['descripcion'] ?></span>
                </div>
                <img src="<?php echo $experiencia['img'] ?>" alt="experiencia-<?php echo $experiencia['empresa'] ?>" class="exp-img">
            </div>
            <?php endif; ?>

            <!-- responsive --> 

            <div class="exp-item-responsive">
                <img src="<?php echo $experiencia['img'] ?>" alt="experiencia-<?php echo $experiencia['empresa'] ?>" class="exp-img-responsive">
                <div>
                    <br>
                    <h3><?php echo $experiencia['empresa'] ?></h3>
                    <br>
                    <span><?php echo $experiencia['descripcion'] ?></span>
                </div>
            </div>

        <?php $index++; endforeach; ?>
    </div>

    <?php endif; ?>
</section>

<script>
    $(document).ready(function(){
        $(".exp-data-responsive").hide()
        $(".exp-img-responsive").click(() => {
            $(".exp-data-responsive").show()
        })
        $("#btn-close-data-responsive").click(() => {
            $(".exp-data-responsive").hide()
        })
    })


   document.addEventListener("DOMContentLoaded", function() {
        const fullText = `Mi experiencia`;
        let index = 0;

        function typeWriter() {
            if (index < fullText.length) {
            const currentChar = fullText.charAt(index);
            const element = document.getElementById("titulo-experiencia");
            
            // Agregar el carácter actual al texto en el elemento
            element.textContent += currentChar;

            // Si el carácter actual es un espacio, añadir un espacio adicional
            if (currentChar === " ") {
                element.textContent += " ";
            }

            index++;
            setTimeout(typeWriter, 40); // Ajusta este valor para cambiar el retardo
            }
        }

        typeWriter();
    });
</script>