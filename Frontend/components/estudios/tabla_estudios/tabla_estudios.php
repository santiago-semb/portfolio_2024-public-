<style>
    .container-estudios {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 85%;
        margin: auto;
        flex-direction: column;
    }
    #titulo-estudios {
        margin-top: 100px;
        margin-bottom: 20px;
        border-bottom: 2px solid white;
    }
    .tabla-estudios {
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        color: black;
        opacity: 0; /* Inicialmente, el div está oculto */
        animation: fadeIn 1.5s forwards; /* Aplicar animación de fade-in */
        animation-delay: 0.5s; /* Retardo de 2 segundos antes de que comience la animación */
        background-color: #ccc;
    }
    .tabla-estudios th {
        padding: 5px;
        background-color: black;
        color: whitesmoke;
    }
    .tabla-estudios td {
        padding: 3px;
        background-color: whitesmoke;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @media screen and (max-width: 605px) {
        .tabla-estudios th, .tabla-estudios td {
            padding: 8px;
            font-size: 12px;
        }
    }

    @media screen and (max-width: 441px) {
        .tabla-estudios th, .tabla-estudios td {
            padding: 15px;
            font-size: 14px;
        }
    }

    @media screen and (max-width: 411px) {
        .tabla-estudios th, .tabla-estudios td {
            padding: 6px;
            font-size: 10px;
        }
    }

    @media screen and (max-width: 283px) {
        .tabla-estudios th, .tabla-estudios td {
            padding: 8px;
            font-size: 8px;
        }
    }
</style>

<?php 

require_once "$_SERVER[DOCUMENT_ROOT]/Backend/Models/Estudio.php";

$estudios = Estudio::select();

?>

<section class="container-estudios">
    
    <?php if(count($estudios)===0): ?>
        <?php include "$_SERVER[DOCUMENT_ROOT]/Frontend/components/no_data/no_data.php" ?>
    <?php else: ?>

    <h1 id="titulo-estudios"></h1>
    <table class="tabla-estudios">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Institución</th>
                <th>Estado</th>
            </tr> 
            
        </thead>
        <tbody>
            <?php $index=1; foreach ($estudios as $estudio): ?>
                <tr class="tr-data">
                    <td style="background-color: rgb(12, 11, 11); color: white"><?php echo $index ?></td>
                    <td><?php echo $estudio['descripcion']; ?></td>
                    <td><?php echo $estudio['institucion'] ?></td>
                    <td><?php echo $estudio['estado'] ?></td>
                </tr>
            <?php $index++; endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function() {
        const fullText = `Mis estudios`;
        let index = 0;

        function typeWriter() {
            if (index < fullText.length) {
            const currentChar = fullText.charAt(index);
            const element = document.getElementById("titulo-estudios");
            
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