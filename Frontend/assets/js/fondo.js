switch(localStorage.getItem("fondo")){
    case "verde":
        $("body").css({
            'background': 'rgb(40,139,98)',
            'background': 'linear-gradient(0deg, rgba(40,139,98,1) 0%, rgba(5,69,68,1) 100%)'
        })
        $(".left-panel").css({
            'background-color': '#022222'
        })
        $("#link-proyecto").css({
            'color': 'rgb(40,139,98)'
        })
        break
    case "naranja":
        $("body").css({
            'background': 'rgb(167,81,41)',
            'background': 'linear-gradient(0deg, rgba(167,81,41,1) 0%, rgba(230,70,2,1) 100%)'
        })
        $(".left-panel").css({
            'background-color': '#812304'
        })
        $("#link-proyecto").css({
            'color': 'black'
        })
        break
    case "azul":
        $("body").css({
            'background': 'rgb(27,52,119)',
            'background': 'linear-gradient(0deg, rgba(27,52,119,1) 0%, rgba(55,7,190,1) 100%)'
        })
        $(".left-panel").css({
            'background-color': '#0c0236'
        })
        $("#link-proyecto").css({
            'color': 'black'
        })
        break
    case "rojo":
        $("body").css({
            'background': 'rgb(116,5,5)',
            'background': 'linear-gradient(0deg, rgba(116,5,5,1) 0%, rgba(170,10,10,1) 100%)'
        })
        $(".left-panel").css({
            'background-color': '#660202'
        })
        $("#link-proyecto").css({
            'color': 'black'
        })
        break
}