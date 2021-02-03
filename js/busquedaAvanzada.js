window.onload = function () {

    //si busca la primera vez
    let url = "https://api.jikan.moe/v3/search/";
    let globalType = "anime?";

    //Async ANIME
    $("#selectorAnime").click(function () {

        //vacia antes de volver a crear
        $("#generosDiferentes").empty();
        $(".orderDiferentes").empty();
        $(".tipoDiferente").empty()
        $(".estadoDiferente").empty()
        $("input:checkbox").prop("checked", false);

        armarAnime();
        globalType = "anime?"
    });

    //Async MANGA
    $("#selectorManga").click(function () {

        $("#generosDiferentes").empty();
        $(".orderDiferentes").empty();
        $(".tipoDiferente").empty();
        $(".estadoDiferente").empty();
        $("input:checkbox").prop("checked", false);

        armarManga();
        globalType = "manga?";
    });

    document.getElementById("botoBusquedaAvanzada").onclick = function () {

        busqueda(url, globalType);
    }

    ////////////////////BOTON BUSQEUDA GLOBAL
    let input = document.getElementById("inputBusqueda");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("botonBusqueda").onclick = busquedaGeneral;
        }
    });

    document.getElementById("botonBusqueda").onclick = busquedaGeneral;

    ////////////////////CARGAR CARTA
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

function armarAnime() {

    genero();
    orderBy();
    type();
    status();
    clasificacion();

    function genero() {

        let tr = document.getElementById("generosDiferentes");
        let td = document.createElement("td");
        td.textContent = "Thriller";
        let input = document.createElement("input");
        input.type = "checkbox";
        input.classList.add("genero");

        td.append(input);
        tr.append(td);

        let td2 = document.createElement("td");
        td2.textContent = "Seinen";
        let input2 = document.createElement("input");
        input2.type = "checkbox";
        input2.classList.add("genero");

        td2.append(input2);
        tr.append(td2);

        let td3 = document.createElement("td");
        td3.textContent = "Josei";
        let input3 = document.createElement("input");
        input3.type = "checkbox";
        input3.classList.add("genero");

        td3.append(input3);
        tr.append(td3);

    }

    function orderBy() {

        let tdOrg = document.querySelectorAll("td.orderDiferentes");
        tdOrg[0].textContent = "Episodios";
        let inputOrg = document.createElement("input");
        inputOrg.type = "checkbox";
        inputOrg.classList.add("organizacion");

        tdOrg[0].append(inputOrg);

        tdOrg[1].textContent = "Rating";
        let inputOrg2 = document.createElement("input");
        inputOrg2.type = "checkbox";
        inputOrg2.classList.add("organizacion");

        tdOrg[1].append(inputOrg2);

    }

    function type() {

        let tdType = document.querySelectorAll("td.tipoDiferente");
        for (let i = 0; i < tdType.length; i++) {

            let inputType = document.createElement("input");
            inputType.type = "checkbox";
            inputType.classList.add("tipo");

            if (i == 0) {

                tdType[i].textContent = "TV";
                tdType[i].append(inputType);

            } else if (i == 1) {

                tdType[i].textContent = "OVA";
                tdType[i].append(inputType);

            } else if (i == 2) {

                tdType[i].textContent = "Movie";
                tdType[i].append(inputType);

            } else if (i == 3) {

                tdType[i].textContent = "Special";
                tdType[i].append(inputType);

            } else if (i == 4) {

                tdType[i].textContent = "ONA";
                tdType[i].append(inputType);

            } else if (i == 5) {

                tdType[i].textContent = "Music";
                tdType[i].append(inputType);

            }
        }
    }

    function status() {

        let tdSort = document.querySelectorAll("td.estadoDiferente");
        for (let i = 0; i < tdSort.length; i++) {

            let inputType = document.createElement("input");
            inputType.type = "checkbox";
            inputType.classList.add("estado");

            if (i == 0) {

                tdSort[i].textContent = "En emisión";
                tdSort[i].append(inputType);

            } else if (i == 1) {

                tdSort[i].textContent = "Terminado";
                tdSort[i].append(inputType);

            } else if (i == 2) {

                tdSort[i].textContent = "Por emitir";
                tdSort[i].append(inputType);

            }

        }
    }

    function clasificacion() {

        let clas = document.querySelectorAll(".clasi");

        clas[0].hidden = false;
        clas[1].hidden = false;
    }
}

function armarManga() {

    genero();
    orderBy();
    type();
    status();
    clasificacion()

    function genero() {

        let tr = document.getElementById("generosDiferentes");
        let td = document.createElement("td");
        td.textContent = "Seinen";
        let input = document.createElement("input");
        input.type = "checkbox";
        input.classList.add("genero");

        td.append(input);
        tr.append(td);

        let td2 = document.createElement("td");
        td2.textContent = "Josei";
        let input2 = document.createElement("input");
        input2.type = "checkbox";
        input2.classList.add("genero");

        td2.append(input2);
        tr.append(td2);

        let td3 = document.createElement("td");
        td3.textContent = "Doujinshi";
        let input3 = document.createElement("input");
        input3.type = "checkbox";
        input3.classList.add("genero");

        td3.append(input3);
        tr.append(td3);

        let td4 = document.createElement("td");
        td4.textContent = "Gender Bender";
        let input4 = document.createElement("input");
        input4.type = "checkbox";
        input4.classList.add("genero");

        td4.append(input4);
        tr.append(td4);

        let td5 = document.createElement("td");
        td5.textContent = "Thriller";
        let input5 = document.createElement("input");
        input5.type = "checkbox";
        input5.classList.add("genero");

        td5.append(input5);
        tr.append(td5);

    }

    function orderBy() {

        let tdOrg = document.querySelectorAll("td.orderDiferentes");
        tdOrg[0].textContent = "Capítulos";
        let inputOrg = document.createElement("input");
        inputOrg.type = "checkbox";
        inputOrg.className = "organizacion";

        tdOrg[0].append(inputOrg);

        tdOrg[1].textContent = "Volúmenes";
        let inputOrg2 = document.createElement("input");
        inputOrg2.type = "checkbox";
        inputOrg2.className = "organizacion";

        tdOrg[1].append(inputOrg2);

    };

    function type() {

        let tdType = document.querySelectorAll("td.tipoDiferente");
        for (let i = 0; i < tdType.length; i++) {

            let inputType = document.createElement("input");
            inputType.type = "checkbox";
            inputType.classList.add("tipo");

            if (i == 0) {

                tdType[i].textContent = "Manga";
                tdType[i].append(inputType);

            } else if (i == 1) {

                tdType[i].textContent = "Novel";
                tdType[i].append(inputType);

            } else if (i == 2) {

                tdType[i].textContent = "Oneshot";
                tdType[i].append(inputType);

            } else if (i == 3) {

                tdType[i].textContent = "Doujin";
                tdType[i].append(inputType);

            } else if (i == 4) {

                tdType[i].textContent = "Manhwa";
                tdType[i].append(inputType);

            } else if (i == 5) {

                tdType[i].textContent = "Manhua";
                tdType[i].append(inputType);

            }
        }
    }

    function status() {

        let tdSort = document.querySelectorAll("td.estadoDiferente");
        for (let i = 0; i < tdSort.length; i++) {

            let inputType = document.createElement("input");
            inputType.type = "checkbox";
            inputType.classList.add("estado");

            if (i == 0) {

                tdSort[i].textContent = "Publicando";
                tdSort[i].append(inputType);

            } else if (i == 1) {

                tdSort[i].textContent = "Terminado";
                tdSort[i].append(inputType);

            } else if (i == 2) {

                tdSort[i].textContent = "Por publicar";
                tdSort[i].append(inputType);

            }

        }
    }

    function clasificacion() {

        let clas = document.querySelectorAll(".clasi");

        clas[0].hidden = true;
        clas[1].hidden = true;
    }
}

function busqueda(url, globalType) {

    let direccion = url.concat(globalType);
    let gender = genero();
    let orderBy = order();
    let type = tipo();
    let status = estado();
    let sort = sortear();
    let rating = clasificacion();

    function genero() {

        let genero = "genre=";

        $(".genero").each(function () {

            let index = $('.genero').index($(this));

            if ($(this).prop("checked") == true) {

                genero += ((index + 1) + ",");
            }
        });

        if (genero.length > 6) {
            genero += "&";
        }

        return genero;
    }

    function order() {

        let orderBy = "order_by=";
        let indexOrderBy = "";

        $(".organizacion").each(function () {

            let index = $('.organizacion').index($(this));

            if ($(this).prop("checked") == true) {

                indexOrderBy = index;
            }
        });

        if (indexOrderBy.length != 0) {

            let tipoOrderBy = ["title", "start_date", "end_date", "score", "type", "members", "id", "episodes", "rating"];

            if (globalType == "manga?") {

                tipoOrderBy[7] = "chapters";
                tipoOrderBy[8] = "rating";
            }

            let palabraOrder = tipoOrderBy[indexOrderBy];
            orderBy = orderBy + palabraOrder + "&";
        }

        return orderBy;
    }

    function tipo() {

        let type = "type=";
        let indexType = "";

        $(".tipo").each(function () {

            let index = $('.tipo').index($(this));

            if ($(this).prop("checked") == true) {

                indexType = index;
            }
        });

        if (indexType.length != 0) {

            let tipoType = ["tv", "ova", "movie", "special", "ona", "music"];

            if (globalType == "manga?") {

                tipoType = ["manga", "novel", "oneshot", "doujin", "manhwa", "manhua"];
            }

            let palabra = tipoType[indexType];
            type += palabra + "&";
        }

        return type;
    }

    function estado() {

        let status = "status="
        let indexStatus = "";

        $(".estado").each(function () {

            let index = $('.estado').index($(this));

            if ($(this).prop("checked") == true) {

                indexStatus = index;
            }
        });

        if (indexStatus.length != 0) {

            let statusType = ["airing", "completed", "to_be_aired"];

            if (globalType == "manga?") {

                statusType[0] = "publishing";
                statusType[2] = "to_be_published";
            }

            let palabra = statusType[indexStatus];
            status += palabra + "&";
        }

        return status;

    }

    function sortear() {

        let sort = "sort="
        let indexSort = "";

        $(".sort").each(function () {

            let index = $('.sort').index($(this));

            if ($(this).prop("checked") == true) {

                indexSort = index;
            }
        });

        if (indexSort.length != 0) {

            let sortType = ["ascending", "descending"];

            let palabra = sortType[indexSort];
            sort += palabra + "&";
        }

        return sort;
    }

    function clasificacion() {

        let rating = "rated="
        let indexRating = "";

        $(".rated").each(function () {

            let index = $('.rated').index($(this));

            if ($(this).prop("checked") == true) {

                indexRating = index;
            }
        });

        if (indexRating.length != 0) {

            let ratingType = ["g", "pg", "pg13", "r17", "r", "rx"];

            let palabra = ratingType[indexRating];
            rating += palabra + "&";
        }

        return rating;
    }

    ////////////UNIR DIRECCION
    direccion += gender;

    if (orderBy.length > 9) {

        direccion += orderBy;
    }
    if (type.length > 5) {

        direccion += type;
    }
    if (status.length > 7) {

        direccion += status;
    }
    if (sort.length > 5) {

        direccion += sort;
    }
    if (rating.length > 6) {

        direccion += rating;
    }

    armarRespuesta(direccion);

}

function armarRespuesta(direccion) {

    let request = new XMLHttpRequest();

    request.open('GET', direccion, true);
    request.onreadystatechange = function () {
        if (this.readyState === 4) {

            let info = JSON.parse(this.response);
            let divCard = new Array();

            info['results'].forEach(function (data) {

                divCard.push(dibujarTable(data));
            });
            paginacion(divCard);
        }
    };
    request.send();
}