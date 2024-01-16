<style>
    .container-presentacion {
        max-width: 65%;
        margin-top: 5%;
    }

    #typedText {
        font-size: 42px;
        color: white;
        overflow: hidden;
        font-weight: bold;
        white-space: nowrap;
    }

    .options-menu {
        display: flex;
        width: 100%;
        flex-wrap: nowrap;
        justify-content: space-around;
        flex-direction: row;
        opacity: 0;
        animation: fadeIn 3s forwards; /* Aplicar animación de fade-in */
        animation-delay: 3s; /* Retardo de 2 segundos antes de que comience la animación */
    }  

    .options-menu ul {
        width: 100%;
        float: left;
        list-style: none;
    }

    .options-menu ul li a {
        color: white;
        transition: 200ms all;
        text-decoration: none;
        font-size: 20px;
    }

    b {
        opacity: 0%;
        transition: 300ms all;
        color: black;
    }

    .options-menu ul li a:hover {
        cursor: pointer;

        b {
            opacity: 100%;
        }

    }

    .images img {
        width: 50px;
        height: 30px;
        margin-right: 5px;
        opacity: 0; /* Inicialmente, el div está oculto */
        animation: fadeIn 3s forwards; /* Aplicar animación de fade-in */
        animation-delay: 2s; /* Retardo de 2 segundos antes de que comience la animación */
        filter: saturate(300%);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    #n2024 {
        font-size: 42px;
        color: gray;
        margin-left: 15px;
    }

    .container-title-responsive {
            display: none;
            font-size: 42px;
            color: white;
    }
    .container-title-responsive p {
            font-weight: bold;
    }

    @media screen and (max-width: 813px) {
        #n2024 {
            display: block;
        }
    }

    @media screen and (max-width: 699px) {
        .container-presentacion {
            margin-left: -50px;
        }
    }

    @media screen and (max-width: 595px) {
        .container-presentacion {
            margin-left: -150px;
        }
    }

    @media screen and (max-width: 507px) {
        #typedText {
            font-size: 36px;
        }
        #n2024 {
            font-size: 22px;
        }
        .container-title {
           display: none;
        }
        .container-title-responsive {
            display: block;
        }
    }

    @media screen and (max-width: 451px) {
        .container-presentacion {
            margin-left: 1px;
        }
    }

    @media screen and (max-width: 400px) {
        .container-presentacion {
            margin-left: 1px;
        }
        .container-title-responsive p {
            font-size: 35px;
        }
    }

    @media screen and (max-width: 297px) {
        .container-title-responsive p {
            font-size: 28px;
        }
    }

    @media screen and (max-width: 235px) {
        .options-menu ul li a {
            font-size: 16px;
        }
        .container-presentacion {
            margin-right: 30px;
        }
    }
</style>

<div class="container-presentacion">
    <div class="container-title-responsive">
        <p>PORTFOLIO</p><p>SANTIAGO<span id="n2024">#2024</span></p>
    </div>
    <div class="container-title">
        <span id="typedText"></span><span id="n2024">#2024</span>
    </div>
    <br>
    <br>
    <div class="images">
        <img src="Frontend/assets/img/banderas/bandera-argentina.png" alt="bandera-argentina">
        <img src="Frontend/assets/img/banderas/bandera-cordoba.png" alt="bandera-cordoba">
    </div>
    <br>
    <br>
    <div class="options-menu">
        <ul>
            <li><a href="Frontend/estudios.php"><b>»</b> Estudios</a></li><br>
            <li><a href="Frontend/experiencia.php"><b>»</b> Experiencia</a></li><br>
            <li><a href="Frontend/proyectos.php"><b>»</b> Proyectos</a></li><br>
            <li><a href="Frontend/certificados.php"><b>»</b> Certificaciones</a></li><br>
            <li><a href="Frontend/configuracion.php"><b>»</b> Configuración</a></li>
        </ul>
    </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
        const fullText = `PORTFOLIO SANTIAGO`;
        let index = 0;

        function typeWriter() {
            if (index < fullText.length) {
            const currentChar = fullText.charAt(index);
            const element = document.getElementById("typedText");
            
            // Agregar el carácter actual al texto en el elemento
            element.textContent += currentChar;

            // Si el carácter actual es un espacio, añadir un espacio adicional
            if (currentChar === " ") {
                element.textContent += " ";
            }

            index++;
            setTimeout(typeWriter, 100); // Ajusta este valor para cambiar el retardo
            }
        }

        typeWriter();
    });
</script>