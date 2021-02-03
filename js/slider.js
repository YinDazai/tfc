window.onload = function () {

    //SLIDER
    saberDiaActual();

    //Actualizacion dia estreno
    $('li.dia').click(function () {

        let index = $('li.dia').index($(this));
        $("#listItem").empty();

        let asdf = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        let dia = asdf[index];
        let diaMinuscula = dia.toLowerCase();

        buscarEstrenoDelDia(diaMinuscula);

        $(".dia").each(function () {

            $(this).removeClass("active");
            let index2 = $('.dia').index($(this));

            if (index2 == index) {

                $(this).addClass('active');
            }
        });
    });

    //TABLA
    saberAnio_Temporada();

    //////////////////BOTON BUSQUEDA
    let input = document.getElementById("inputBusqueda");
    input.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("botonBusqueda").onclick = busquedaGeneral;
        }
    });

    document.getElementById("botonBusqueda").onclick = busquedaGeneral;

    //////////////////CARGAR CARTA - SLIDER
    $(document).ready(function () {
        $(document).on("click", ".elementoSlider", function () {

            let id = this.id;
            let direccion = "https://api.jikan.moe/v3/anime/";
            direccion += id;

            localStorage.setItem("buscarAnime", direccion);
            window.location.replace("pagina.php");

        });
    });

    ///////////////////CARTAGAR CARTA NORMAL
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

    ///////CSS ACTIVE
    //SLIDER
    $(document).ready(function () {

        let now = new Date();

        $(".dia").each(function () {

            let index = $('.dia').index($(this));
            let dia = now.getDay();

            if (index == (dia - 1)) {

                $(this).addClass('active');
            }
        });
    });
}

//SLIDER
function saberDiaActual() {

    //saber el día de hoy
    let dias = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday',];

    let now = new Date();
    let dia = dias[now.getDay()];
    let diaMinuscula = dia.toLowerCase();

    buscarEstrenoDelDia(diaMinuscula);
}

function buscarEstrenoDelDia(diaHoy) {

    let url = 'https://api.jikan.moe/v3/schedule/' + diaHoy;

    let request = new XMLHttpRequest();
    request.dia = diaHoy;
    request.open('GET', url, true);

    request.onreadystatechange = function () {
        if (this.readyState === 4) {

            let diaActualHoy = request.dia;
            let info = JSON.parse(this.response);

            info[diaActualHoy].forEach(function (data) {

                armarSlider(data);
            });
        }
    };

    request.send();
}

function armarSlider(data) {

    let ul = document.getElementById("listItem");
    let li = document.createElement('li');
    li.classList.add("elementoSlider");
    li.id = data.mal_id;
    li.setAttribute("name", data.type);
    li.textContent = data.title;

    let img = document.createElement('img');
    img.src = data.image_url;
    img.alt = "Portada de " + data.title;
    img.width = 225;
    img.height = 340;

    let div = document.createElement("div");
    div.classList.add("uk-overlay", "uk-overlay-primary", "uk-position-bottom");
    let p = document.createElement('p');
    p.textContent = data.title;
    p.classList.add("uk-margin-remove");

    //juntarlo_todo
    div.append(p);
    li.append(img);
    li.append(div);
    ul.append(li);

}

//TABLA
function saberAnio_Temporada() {

    let mesActual = new Date().getMonth();
    let mes;
    let temporada = "";

    if ((mesActual >= 0) && (mesActual <= 2)) {

        mes=0;
        temporada = "winter";
    } else if ((mesActual >= 3) && (mesActual <= 5)) {
 
        mes=1;
        temporada = "spring";
    } else if ((mesActual >= 6) && (mesActual <= 8)) {

        mes=2;
        temporada = "summer";
    } else if ((mesActual >= 9) && (mesActual <= 11)) {

        mes=3;
        temporada = "fall";
    }

    let tipo = "TV";
    buscarEstrenoTemporada(temporada, tipo);

    //Actualizacion temporada
    $('li.temp').click(function () {
        $("#gridTemp").empty();
        $("#pagin").empty();

        let index = $('li.temp').index($(this));
        let asdf = ['winter', 'spring', 'summer', 'fall'];
        let temp = asdf[index];

        buscarEstrenoTemporada(temp, tipo);

        //Actualizacion tipo
        $('li.tipo').click(function () {
            $("#gridTemp").empty();
            $("#pagin").empty();

            let index = $('li.tipo').index($(this));
            let indice = ['TV', 'ONA', 'OVA', 'Movie', 'Special'];
            let type = indice[index];

            buscarEstrenoTemporada(temp, type);
        });

        $(".temp").each(function () {

            $(this).removeClass("active");
            let index2 = $('.temp').index($(this));

            if (index2 == index) {

                $(this).addClass('active');
            }
        });

        $(".tipo").each(function () {

            $(this).removeClass("active");
            let index2 = $('.tipo').index($(this));

            if (index2 == 0) {

                $(this).addClass('active');
            }
        });
    });

    //Actualizacion tipo
    $('li.tipo').click(function () {
        $("#gridTemp").empty();
        $("#pagin").empty();

        let index = $('li.tipo').index($(this));
        let indice = ['TV', 'ONA', 'OVA', 'Movie', 'Special'];
        let type = indice[index];

        buscarEstrenoTemporada(temporada, type);

        $(".tipo").each(function () {

            $(this).removeClass("active");
            let index2 = $('.tipo').index($(this));

            if (index2 == index) {

                $(this).addClass('active');
            }
        });
    });

    ////////CSS ACTIVE
    $(document).ready(function () {

        $(".temp").each(function () {

            let index = $('.temp').index($(this));

            if (index == mes) {

                $(this).addClass('active');
            }
        });

        $(".tipo").each(function () {

            let index = $('.tipo').index($(this));

            if (index == 0) {

                $(this).addClass('active');
            }
        });
    });
}

function buscarEstrenoTemporada(temporada, tipo) {

    let anioActual = new Date().getFullYear();
    let url = 'https://api.jikan.moe/v3/season/' + anioActual + '/' + temporada;
    let request = new XMLHttpRequest();

    request.open('GET', url, true);
    request.onreadystatechange = function () {
        if (this.readyState === 4) {

            let info = JSON.parse(this.response);
            let divCard = new Array();

            info["anime"].forEach(function (data) {

                if (data.type == tipo) {

                    divCard.push(dibujarTable(data));

                } else {
                }
            });
            paginacion(divCard);
        }
    };
    request.send();
}

function dibujarTable(data) {

    let divCard = document.createElement("div");
    divCard.classList.add("elementoCarta");
    divCard.id = data.mal_id;
    divCard.setAttribute("name", data.type);

    let divCardImg = document.createElement("div");
    divCardImg.classList.add("uk-card", "uk-card-default");

    let divCardImgMedia = document.createElement("div");
    divCardImgMedia.classList.add("uk-card-media-top");

    let img = document.createElement("img");
    img.src = data.image_url;
    img.alt = "Portada de" + data.title;

    let divCardImgBody = document.createElement("div");
    divCardImgBody.classList.add("uk-card-body");

    let titulo = document.createElement("p");
    titulo.innerText = data.title + "\n\nTipo: " + data.type;

    divCardImgBody.append(titulo);
    divCardImgMedia.append(img);

    divCardImg.append(divCardImgMedia);
    divCardImg.append(divCardImgBody);

    divCard.append(divCardImg);

    return divCard;
}

function paginacion(divCard) {

    $("#gridTemp").empty();
    $("#pagin").empty();

    let numCartas = divCard.length;
    let cartasPorPagina = 12;
    let numPaginas = Math.ceil(numCartas / cartasPorPagina);

    for (let i = 0; i < numPaginas; i++) {

        $("#pagin").append("<li class='numPagina list-group-item'>" + (i + 1) + "</li>");
        
    }

    let i = 0;
    //Primera vez
    do {

        if (i < numCartas) {

            document.getElementById("gridTemp").append(divCard[i]);

        } else {
            break;
        }

        i++;
    } while (i < cartasPorPagina);

    $('li.numPagina').click(function () {
        $("#gridTemp").empty();

        let i = 0;
        let index = $('li.numPagina').index($(this));

        if (index == 0) {

            document.getElementById("gridTemp").addClass("active");

            do {

                if (i < numCartas) {

                    document.getElementById("gridTemp").append(divCard[i]);



                } else {
                    break;
                }

                i++;
            } while (i < cartasPorPagina);

        } else {

            let numIndice = index * cartasPorPagina;

            do {

                if (numIndice < divCard.length) {

                    document.getElementById("gridTemp").append(divCard[numIndice]);
                } else {
                    break;
                }

                i++;
                numIndice++;
            } while (i < cartasPorPagina);
        }
    });
}

function busquedaGeneral() {

    let busqueda = document.getElementById("inputBusqueda").value;
    localStorage.setItem("busqueda", busqueda);
    window.location.replace("busqueda.php");

}