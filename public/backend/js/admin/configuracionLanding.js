
$(document).ready(function() {

    var arrayProbabilidad = [0, 10 , 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

    $('#form-info-pro').on('submit', function(event) {
        event.preventDefault();

        var select = $( '#small-bootstrap-class-multiple-field' ).val()

        var formData = new FormData(this);
        formData.append("marca_select", select.join(', '))

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    $('#form-dominio').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    $('#form-vigencia').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
                $("#fecha_fin_participar_estado").val($("#fecha_fin_participar").val());
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    $('#form-estilo').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    $('#form-premio').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var premioId = document.getElementsByName("idPremio[]");
        var nro_premio = document.getElementsByName("nro_premio[]");
        var premioNombre = document.getElementsByName("nombre_premio_1[]");
        var premioStock = document.getElementsByName("stock_premio_1[]");
        var premioProbabilidad = document.getElementsByName("probabilidad_premio_1[]");

        var lPremioConcat = [];
        var lPremioConcatDelete = [];
        console.log(lPremio)
        for (let i = 0; i < lPremio.length; i++) {
            const nroPremio = i + 1;
            const nombre = premioNombre[i].value;
            const stock = premioStock[i].value;
            const probabilidad = premioProbabilidad[i].value;
            const id = premioId[i].value;
            lPremioConcat.push([nroPremio,nombre,stock,probabilidad,id])
        }

        const lPremioDelete = lPremiobd.map( premio => {
            console.log(lPremio.find(pre => Number(pre.id) === Number(premio.id)))
            if (!lPremio.find(pre => Number(pre.id) === Number(premio.id))) {
                return [premio.id]
            }
        }).filter(pre => pre)

        formData.append('lPremioConcat', JSON.stringify(lPremioConcat))
        formData.append('lPremioConcatDelete', JSON.stringify(lPremioDelete))

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown, jqXHR.responseJSON.message);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    var lPremio = []
    var lPremiobd = []

    $("#cantidad_premio").change((e) => {

        const NroPremio = $("#cantidad_premio").val();

        if (lPremio.length > 0 && lPremio.length != NroPremio) {
            lPremio = lPremio.filter(premio => premio.nro_premio <= NroPremio);
        }

        if (lPremio.length === 0) {
            lPremio = []
        }

        var premioId = document.getElementsByName("idPremio[]");
        var premioNombre = document.getElementsByName("nombre_premio_1[]");
        var premioStock = document.getElementsByName("stock_premio_1[]");
        var premioProbabilidad = document.getElementsByName("probabilidad_premio_1[]");
        const lPremioTemp = []

        for (let i = 0; i < +NroPremio; i++) {

            if (!lPremio || !lPremio.find(premio => premio.nro_premio === i + 1)) {
                console.log(lPremiobd.find(premio => premio.nro_premio === i + 1))
                if (lPremiobd.find((premio, index) => index === i)) {
                    const premioV = lPremiobd.find((premio, index) => index === i);
                    lPremioTemp.push({
                        id: premioV.id ?? 0,
                        nro_premio: i + 1,
                        nombre_premio: premioV.nombre_premio,
                        stock: premioV.stock,
                        probabilidad: premioV.probabilidad
                    })
                } else {
                    lPremioTemp.push({
                        nro_premio: i + 1,
                        nombre_premio: '',
                        stock: 0,
                        probabilidad: 0
                    })
                }
            } else {
                lPremioTemp.push({
                    id: premioId[i].value ?? 0,
                    nro_premio: i + 1,
                    nombre_premio: premioNombre[i].value ?? '',
                    stock: premioStock[i].value ?? 0,
                    probabilidad: premioProbabilidad[i].value ?? 0
                })
            }
        }

        lPremio = lPremioTemp;

        agregarPremio(lPremio);
    })

    function agregarPremio(lPremio) {

        var html = ``;

        lPremio.forEach(premio => {
            html += `
                <div class="col-12 row border-bottom pb-3 mb-4">

                    <div class="col-12 col-md-6 col-lg-3">
                        <label for=""><small><b>Premio ${premio.nro_premio}</b></small></label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7">
                        <input type="hidden" name="nro_premio[]" id="nro_premio[]" value="${premio.nro_premio}">
                        <input type="hidden" name="idPremio[]" id="idPremio[]" value="${premio.id ?? 0}">
                        <div class="mb-2 row">
                            <label for="nombre_premio_1[]" class="col-sm-4">Nombre del Premio ${premio.nro_premio}</label>
                            <div class="col-sm-8">
                                <input type="text" name="nombre_premio_1[]" id="nombre_premio_1[]" class="form-control w-100 mb-3" value="${premio.nombre_premio}" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="stock_premio_1[]" class="col-sm-4">Stock</label>
                            <div class="col-sm-8">
                                <input type="text" name="stock_premio_1[]" id="stock_premio_1[]" class="form-control w-100 mb-3" value="${premio.stock}" min="1" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="probabilidad_premio_1[]" class="col-sm-4">Probabilidad</label>
                            <div class="col-sm-8">
                                <input type="number" name="probabilidad_premio_1[]" id="probabilidad_premio_1[]" min="0" max="100" class="form-control" value="${premio.probabilidad}">
                            </div>
                        </div>
                    </div>
                </div>
            `;
        })
{/* <select name="probabilidad_premio_1[]" id="probabilidad_premio_1[]" class="form-select w-100" required>
                                    ${
                                        arrayProbabilidad.map(a => (
                                            `<option value="${a}" ${premio.probabilidad == a ? 'selected' : ''} >${a}</option>`
                                        ))
                                    }
                                </select> */}
        $('#content_premio').html(html)
    }

    // Obtener los premios
    function obtenerPremios() {

        lPremio = [];
        var url = $("#urlPremios").val();

        console.log('sdsd')
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response) {
                    if (response?.data != undefined || response?.data != null) {
                        lPremioAll = response.data.premio ?? []
                        $("#prob_no_premio").val(response.data.project.prob_no_premio);
                        lPremio = lPremioAll.filter(pre => pre.status == 1).map(premio => {
                            return {
                                ...premio,
                                nro_premio: premio.orden
                            }
                        })
                        lPremiobd = [...lPremioAll]
                        console.log(lPremiobd)
                        agregarPremio(lPremio)
                    }
                }
            }
        });
    }

    $('#form-estado').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // URL de la ruta
            method: 'POST',
            data: formData,
            contentType: false, // Para enviar los datos como FormData
            processData: false, // No procesar los datos
            success: function(data) {
                // Procesar los datos devueltos
                Swal.fire({
                    icon: 'success',
                    title: 'Cambios guardados'
                })
                $("#fecha_fin_participar").val($("#fecha_fin_participar_estado").val());
                if ($("#status").val() == '0') {
                    $("#btn_status").removeClass('btn-inactivo');
                    $("#btn_status").removeClass('btn-activo');
                    $("#btn_status").addClass('btn-inactivo');
                    $("#btn_status").removeClass('btn-finalizado');
                    $("#btn_status").html('Inactivo');
                }
                if ($("#status").val() == '1') {
                    $("#btn_status").removeClass('btn-activo');
                    $("#btn_status").removeClass('btn-inactivo');
                    $("#btn_status").removeClass('btn-finalizado');
                    $("#btn_status").addClass('btn-activo');
                    $("#btn_status").html('Activo');
                }
                if ($("#status").val() == '2') {
                    $("#btn_status").removeClass('btn-activo');
                    $("#btn_status").removeClass('btn-inactivo');
                    $("#btn_status").addClass('btn-finalizado');
                    $("#btn_status").html('Finalizado');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                })
            }
        });
    });

    obtenerPremios();

});
