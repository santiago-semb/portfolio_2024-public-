<style>
    .container-certificaciones {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 85%;
        margin: auto;
        flex-direction: column;
    }
    #titulo-certificaciones {
        margin-top: 100px;
        margin-bottom: 20px;
        border-bottom: 2px solid white;
    }
    .container-certificates {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        width: 100%;
        opacity: 0; /* Inicialmente, el div está oculto */
        animation: fadeIn 1.5s forwards; /* Aplicar animación de fade-in */
        animation-delay: 1s; /* Retardo de 2 segundos antes de que comience la animación */
    }
    .item {
        width: 100%;
        height: 120px;
        margin: 5px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        text-align: center;
    }
    .item h1 {
        margin-left: 15px;
        margin-right: 15px;
    }
    .img-certificado {
        width: 150px;
        height: 100px;
        margin-left: 10px;
        border-radius: 0.2em;
    }
    .btn-ver-certificado {
        margin-right: 10px;
        padding: 7px;
        background-color: whitesmoke;
        color: black;
        border: 2px solid #ccc;
        transition: 200ms all;
        font-weight: bold;
    }
    .btn-ver-certificado:hover {
        cursor: pointer;
        background-color: black;
        border: 2px solid  rgb(20, 20, 20);
        color: white;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .pagination {
        margin-top: 15px;
        width: 100%;
        text-align: right;
    }

    .pagination a {
        background-color: whitesmoke;
        margin: 4px;
        padding-left: 8px;
        padding-right: 8px;
        padding-bottom: 3px;
        padding-top: 3px;
        color: black;
        text-decoration: none;
        font-weight: bold;
        transition: 200ms all;
    }

    .pagination a:hover {
        background-color: #ccc;
    }

    .pagination a.active {
        /* Estilos para el número de página actual */
        background-color: black;
        color: white;
        border: 1px solid black;
    }
  
    @media screen and (max-width: 669px) {
        .item h1 {
            font-size: 18px;
        }
    }

    @media screen and (max-width: 537px) {
        .item h1 {
            font-size: 14px;
        }
    }

    @media screen and (max-width: 443px) {
        .item h1 {
            font-size: 14px;
        }
        .img-certificado {
            width: 120px;
            height: 70px;
        }
        .btn-ver-certificado {
            padding: 3px;
        }
    }

    @media screen and (max-width: 359px) {
        .img-certificado {
            width: 100px;
            height: 50px;
        }
        .item h1 {
            font-size: 11px;
        }
        .btn-ver-certificado {
            padding: 3px;
            font-size: 11px;
        }
    }
</style>

<?php 

require_once "$_SERVER[DOCUMENT_ROOT]/Backend/Models/Certificado.php";

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$certificadosData = Certificado::selectPaginate($page, 3);
$certificados = $certificadosData['certificados'];
$totalPages = $certificadosData['totalPages'];
$currentPage = $certificadosData['currentPage'];

?>

<section class="container-certificaciones">

    <?php if(count($certificados)===0): ?>
        <?php include "$_SERVER[DOCUMENT_ROOT]/Frontend/components/no_data/no_data.php" ?>
    <?php else: ?>

    <h1 id="titulo-certificaciones"></h1>
    <div class="container-certificates">
        <?php foreach ($certificados as $certificado): ?>
            <div class="item">
                <img src="<?php echo $certificado['img'] ?>" alt="certificado-<?php echo $certificado['titulo'] ?>" class="img-certificado">
                <h1><?php echo $certificado['titulo'] ?></h1>
                <a href="<?php echo $certificado['link'] ?>" target="_blank" id="btn-link-certificado"><button class="btn-ver-certificado">PDF</button></a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Paginación -->
    <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="#" data-page="<?php echo $i; ?>" class="page-link <?php echo ($currentPage == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>

    <?php endif; ?>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function() {
        const fullText = `Mis certificaciones`;
        let index = 0;

        function typeWriter() {
            if (index < fullText.length) {
            const currentChar = fullText.charAt(index);
            const element = document.getElementById("titulo-certificaciones");
            
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


        // Manejar clics en los enlaces de paginación 
        $(document).on('click', '.pagination .page-link', function (e) {
            e.preventDefault();

            // Obtener el número de página desde el atributo data-page
            var nextPage = $(this).data('page');

            // Cargar los datos de la siguiente página de forma asíncrona
            $.ajax({
                url: '?page=' + nextPage,
                type: 'GET',
                success: function (data) {
                    // Actualizar el contenido del contenedor con la nueva página
                    $('.container-certificates').html($(data).find('.container-certificates').html());

                    // Remover la clase .active de todos los enlaces de paginación
                    $('.pagination .page-link').removeClass('active');

                    // Agregar la clase .active al enlace de la página actual
                    $('.pagination .page-link[data-page="' + nextPage + '"]').addClass('active');
                },
                error: function (error) {
                    console.error('Error al cargar la página: ', error);
                }
            });
        });
    });
</script>