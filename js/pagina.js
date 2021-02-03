window.onload = function () {

    let direccionAnime = localStorage.getItem("buscarAnime");

    paginaAnime(direccionAnime);

    ////////////////////BOTON BUSQEUDA GLOBAL
    let input = document.getElementById("inputBusqueda");
    input.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("botonBusqueda").onclick = busquedaGeneral;
        }
    });

    document.getElementById("botonBusqueda").onclick = busquedaGeneral;

    //REVISAR SI TIENE ALGO GUARDADO
    $(document).ready(function ($) {

        $.ajax({
            url: './php/revisar.php',
            type: 'GET',
        })
            .done(function (respose) {

                let resultado = $.parseJSON(respose);

                let table = document.getElementById("listaGuardados");

                for (let j = 0; j < resultado.length; j++) {

                    let tr = document.createElement("tr");

                    for (let i = 0; i < 2; i++) {

                        let td = document.createElement("td");

                        if (i == 1) {

                            let button = document.createElement("input");
                            button.type = "submit";
                            button.classList.add("botonEliminar");
                            button.value = "Eliminar";

                            td.append(button);
                        } else {

                            td.innerText = resultado[j];
                        }

                        tr.append(td);
                    }

                    table.append(tr);
                }

                ///ELIMINAR
                $(".botonEliminar").click(function () {

                    let index = $(".botonEliminar").index($(this));
                    let eliminar = resultado[index];

                    $.ajax({
                        url: './php/eliminar.php',
                        type: 'POST',
                        data: ({ 'eliminar': eliminar })
                    })
                        .done(function (a) {
    
                            alert(a);
                            location.reload(); 
                        });

                });
            });
    });
}

function paginaAnime(direccion) {

    let request = new XMLHttpRequest();

    request.open('GET', direccion, true);
    request.onreadystatechange = function () {
        if (this.readyState === 4) {

            let info = JSON.parse(this.response);

            let img = document.getElementById("imagen");
            let title = document.getElementById("tituloRespuesta");
            let status = document.getElementById("estadoRespuesta");
            let synopsis = document.getElementById("resumenRespuesta");
            let genre = document.getElementById("generosRespuesta");
            let rank = document.getElementById("rangoRespuesta");
            let type = document.getElementById("tipoRespuesta");
            let score = document.getElementById("puntuacionRespuesta");

            if (info.type == "TV" || info.type == "ONA" || info.type == "OVA" ||
                info.type == "MOVIE" || info.type == "SPECIAL" || info.type == "MUSIC") {

                img.src = info.image_url;
                img.alt = "portada de " + info.title;

                title.innerText = info.title;

                status.innerText = "Estado: " + info.status;

                rank.innerText = "Ranking: " + info.rank;

                type.innerText = "Tipo: " + info.type;

                let episode = document.getElementById("epiRespuesta");
                episode.innerText = "Episodios: " + info.episodes;

                score.innerText = "Puntuación: " + info.score;

                genre.innerText = "Generos: ";

                for (let i = 0; i < (info.genres).length; i++) {

                    if (((info.genres).length) - 1 == i) {

                        genre.innerText += info.genres[i].name + ".";
                    } else {

                        genre.innerText += info.genres[i].name + ', ';
                    }
                }

                let studio = document.getElementById("estudioRespuesta");
                studio.innerText = "Estudio: " + info["studios"][0].name;


                synopsis.innerText = "Synopsis: " + info.synopsis;

            } else {

                img.src = info.image_url;
                img.alt = "portada de " + info.title;

                title.innerText = info.title;

                status.innerText = "Estado: " + info.status;

                rank.innerText = "Ranking: " + info.rank;

                type.innerText = "Tipo: " + info.type;

                let volumen = document.getElementById("epiRespuesta");
                volumen.innerText = "Volúmenes: " + info.volumenes;

                let chapter = document.getElementById("epiRespuesta");
                chapter.innerText = "Capítulos: " + info.chapters;

                score.innerText = "Puntuación: " + info.score;

                genre.innerText = "Generos: ";

                for (let i = 0; i < (info.genres).length; i++) {

                    if (((info.genres).length) - 1 == i) {

                        genre.innerText += info.genres[i].name + ".";
                    } else {

                        genre.innerText += info.genres[i].name + ', ';
                    }
                }

                let autor = document.getElementById("estudioRespuesta");
                autor.innerText = "Autor: " + info["authors"][0].name;

                synopsis.innerText = "Synopsis: " + info.synopsis

            }

            $(document).ready(function ($) {
                let datoGuardar = title.innerText;

                console.log("asdfasdf");

                $.ajax({
                    url: './php/function.php',
                    type: 'POST',
                    data: ({ 'revisar': datoGuardar })
                })
                    .done(function (respose) {

                        console.log(respose);

                        if (respose == "true") {

                            document.getElementById("botonGuardar").value = "Dejar de seguir";
                        } else {

                            document.getElementById("botonGuardar").value = "Seguir";
                        }

                        console.log("hola que tal");
                    });
            });

            $(document).ready(function ($) {
                $('#botonGuardar').click(function () {
                    let datoGuardar = title.innerText;

                    $.ajax({
                        url: './php/function.php',
                        type: 'POST',
                        data: ({ 'nombre': datoGuardar })
                    })
                        .done(function (respose) {

                            if (respose == "Por favor, inicie sesión para poder seguir.") {

                                document.getElementById("alertaSeguir").innerHTML = respose;
                            } else {

                                if (respose == "New record created successfully") {

                                    document.getElementById("botonGuardar").value = "Dejar de seguir";

                                } else {

                                    document.getElementById("botonGuardar").value = "Seguir";
                                }
                            }
                        })
                });
            })
        }
    };
    request.send();
}