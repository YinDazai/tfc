window.onload = function () {

    let elemento = localStorage.getItem("busqueda");
    let url = "https://api.jikan.moe/v3/search/";
    let globalType = "anime?";
    let busqueda = "q=" + elemento;

    let direccion = url + globalType + busqueda;

    armarRespuesta(direccion);

    $(".selectorBusqueda").click(function () {

        let index = $(".selectorBusqueda").index($(this));

        if(index == 0){

            globalType = "anime?";
            direccion = url + globalType + busqueda;

            armarRespuesta(direccion);
        }
        if(index == 1){

            globalType = "manga?";
            direccion = url + globalType + busqueda;

            armarRespuesta(direccion);
        }

    });

    ////////////////////BOTON BUSQEUDA GLOBAL
    let input = document.getElementById("inputBusqueda");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("botonBusqueda").onclick = busquedaGeneral;
        }
    });

    document.getElementById("botonBusqueda").onclick = busquedaGeneral;

    ///////////////CARGAR CARTA
    $(document).ready(function () {
        $(document).on("click", ".elementoCarta", function () {

            let id = this.id;
            let tipo = this.getAttribute("name");

            if (tipo == "TV" || tipo == "ONA" || tipo == "OVA" ||
                tipo == "Movie" || tipo == "Special" || tipo == "Music") {

                let direccion = "https://api.jikan.moe/v3/anime/";
                direccion += id;

                localStorage.setItem("buscarAnime", direccion);
                window.location.replace("pagina.php");

            } else {

                let direccion = "https://api.jikan.moe/v3/manga/";
                direccion += id;

                localStorage.setItem("buscarAnime", direccion);
                window.location.replace("pagina.php");

            }
        });
    });
}

