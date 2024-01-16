<style>
    .container-configuracion {
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .colores {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        text-align: center;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
    }

    #btn-save-color {
        margin-top: 20px;
        width: 100%;
        background-color: whitesmoke;
        color: black;
        border: 2px solid #ccc;
    }

    #btn-save-color:hover {
        cursor: pointer;
        background-color: lightgray;
    }

    .color {
        width: 30px;
        height: 30px;
        margin: 10px;
        border: 2px solid #ccc;
    }

    .color:hover {
        cursor: pointer;
    }

    #verde {
        background: rgb(40,139,98);
        background: linear-gradient(0deg, rgba(40,139,98,1) 0%, rgba(5,69,68,1) 100%); 
    }
    #naranja {
        background: rgb(167,81,41);
        background: linear-gradient(0deg, rgba(167,81,41,1) 0%, rgba(230,70,2,1) 100%);  
    }
    #azul {
        background: rgb(27,52,119);
        background: linear-gradient(0deg, rgba(27,52,119,1) 0%, rgba(55,7,190,1) 100%); 
    }
    #rojo {
        background: rgb(200,41,41);
        background: linear-gradient(0deg, rgba(200,41,41,1) 0%, rgba(181,0,0,1) 100%); 
    }

    @media screen and (max-width: 353px) {
        .container-configuracion h1 {
            font-size: 16px;
        }
        .colores {
            flex-direction: column;
        }
    }
</style>

<section class="container-configuracion">
    <h1>Cambiar color de fondo</h1>
    <div class="colores">
        <div class="color" id="verde"></div>
        <div class="color" id="naranja"></div>
        <div class="color" id="azul"></div>
        <div class="color" id="rojo"></div>
    </div>
    
</section>

<script>
    $(document).ready(function(){
        $('#verde').click(function() {
            $("body").css({
                'background': 'rgb(40,139,98)',
                'background': 'linear-gradient(0deg, rgba(40,139,98,1) 0%, rgba(5,69,68,1) 100%)'
            })
            $(".left-panel").css({
                'background-color': '#022222'
            })
            localStorage.setItem("fondo", "verde")
        })
        $('#naranja').click(function() {
            $("body").css({
                'background': 'rgb(167,81,41)',
                'background': 'linear-gradient(0deg, rgba(167,81,41,1) 0%, rgba(230,70,2,1) 100%)'
            })
            $(".left-panel").css({
                'background-color': '#812304'
            })
            localStorage.setItem("fondo", "naranja")
        })
        $('#azul').click(function() {
            $("body").css({
                'background': 'rgb(27,52,119)',
                'background': 'linear-gradient(0deg, rgba(27,52,119,1) 0%, rgba(55,7,190,1) 100%)'
            })
            $(".left-panel").css({
                'background-color': '#0c0236'
            })
            localStorage.setItem("fondo", "azul")
        })
        $('#rojo').click(function() {
            $("body").css({
                'background': 'rgb(116,5,5)',
                'background': 'linear-gradient(0deg, rgba(116,5,5,1) 0%, rgba(170,10,10,1) 100%)'
            })
            $(".left-panel").css({
                'background-color': '#660202'
            })
            localStorage.setItem("fondo", "rojo")
        })
    })
</script>