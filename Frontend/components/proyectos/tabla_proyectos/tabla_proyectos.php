<style>
    .container-proyectos {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 85%;
        margin: auto;
        flex-direction: column;
    }
    #titulo-proyectos {
        margin-top: 100px;
        margin-bottom: 20px;
        border-bottom: 2px solid white;
    }
    #link-proyecto {
        color: #0793b4 !important; 
    }
    #link-proyecto:visited {
        color: #0793b4 !important;
    }
    .tabla-proyectos {
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        opacity: 0; /* Inicialmente, el div está oculto */
        animation: fadeIn 1.5s forwards; /* Aplicar animación de fade-in */
        animation-delay: 0.5s; /* Retardo de 2 segundos antes de que comience la animación */
        background-color: #ccc;
    }
    .tabla-proyectos th {
        padding: 5px;
        background-color: black;
        color: whitesmoke;
    }
    .tabla-proyectos td {
        background-color: whitesmoke;
        padding: 5px;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .online {
        color: green;
    }
    .offline {
        color: red;
    }

    @media screen and (max-width: 605px) {
        .tabla-proyectos th, .tabla-proyectos td {
            padding: 8px;
            font-size: 12px;
        }
    }

    @media screen and (max-width: 441px) {
        .tabla-proyectos th, .tabla-proyectos td {
            font-size: 9px;
        }
    }

    @media screen and (max-width: 411px) {
        .tabla-proyectos th, .tabla-proyectos td {
            padding: 6px;
            font-size: 10px;
        }
    }

    @media screen and (max-width: 365px) {
        .tabla-proyectos th, .tabla-proyectos td {
            font-size: 7px;
        }
    }

</style>

<?php 

require_once "$_SERVER[DOCUMENT_ROOT]/Backend/Models/Proyecto.php";

$proyectos = Proyecto::select();

?>

<section class="container-proyectos">

    <?php if(count($proyectos)===0): ?>
        <?php include "$_SERVER[DOCUMENT_ROOT]/Frontend/components/no_data/no_data.php" ?>
    <?php else: ?>

    <h1 id="titulo-proyectos"></h1>
    <table class="tabla-proyectos">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Tecnologías</th>
                <th>Link</th>
                <th>Status</th>
            </tr>   
        </thead>
        <tbody>
           <?php $index=1; foreach($proyectos as $proyecto): ?>
            <tr class="tr-data">
                <td style="background-color: rgb(12, 11, 11); color: white"><?php echo $index ?></td>
                <td><?php echo $proyecto['descripcion'] ?></td>
                <td><?php echo $proyecto['tecnologias'] ?></td>
                <td><a href="<?php echo $proyecto['link'] ?>" id="link-proyecto" target="_blank"><?php echo $proyecto['link'] ?></a></td>
                <td class="status-project">
                    <?php
                        ($proyecto['status_project']) ? $state = '<b class=online>Online</b>' : $state = '<b class=offline>Offline</p>';
                        echo $state;
                    ?>
                </td>
            </tr>
            <?php $index++; endforeach; ?>
        </tbody>
    </table>

    <?php endif; ?>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function() {
        const fullText = `Mis proyectos`;
        let index = 0;

        function typeWriter() {
            if (index < fullText.length) {
            const currentChar = fullText.charAt(index);
            const element = document.getElementById("titulo-proyectos");
            
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