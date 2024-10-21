// $(document).ready(function() {
//     $("#guardar-landing").on("click", function() {
//         $("#form-landing").submit();
//     })

//     $('#form-landing').on('submit', function(event) {
//         event.preventDefault(); 

//         var formData = new FormData(this);
        
//         // // Mostrar los datos en la consola (opcional)
//         // for (const [key, value] of formData.entries()) {
//         //     console.log(`${key}: ${value}`);
//         // }
//         $.ajax({
//             url: $(this).attr('action'), // URL de la ruta
//             method: 'POST',
//             data: formData,
//             contentType: false, // Para enviar los datos como FormData
//             processData: false, // No procesar los datos
//             success: function(data) {
//                 // Procesar los datos devueltos
//                 // toastr.success(data.message); 
//                 if (data) {
//                     if (data.encabezado.logo_subir) {
//                         $("#logo-nav").attr('src', `/storage/${data.encabezado.logo_subir}`);
//                     }
//                     if (data.pagina_principal.banner_subir) {
//                         $("#header").css('background-image', `url(/storage/${data.pagina_principal.banner_subir})`);
//                     }
//                     if (data.pagina_principal["imagen-subir"]) {
//                         $("#imagen-header").attr('src', `/storage/${data.pagina_principal["imagen-subir"]}`);
//                     }
//                     if (data.como_participar.participar_1) {
//                         $("#item_participar_1").attr('src', `/storage/${data.como_participar.participar_1}`);
//                     }
//                     if (data.como_participar.participar_2) {
//                         $("#item_participar_2").attr('src', `/storage/${data.como_participar.participar_2}`);
//                     }
//                     if (data.como_participar.participar_3) {
//                         $("#item_participar_3").attr('src', `/storage/${data.como_participar.participar_3}`);
//                     }
//                 }

//                 $("#form_html").submit();
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
//                 toastr.error('Ocurrió un error al procesar la solicitud.');
//             }
//         });
//     });

//     $("#form_html").on("submit", function(event) {
//         event.preventDefault(); 
//         const html = $('#landing_page').html();

//         // Ajax para actualizar data
//         var formData2 = new FormData(this);
//         formData2.append('html', html)
                
//         $.ajax({
//             url: $(this).attr('action'), // URL de la ruta
//             method: 'POST',
//             data: formData2,
//             contentType: false, // Para enviar los datos como FormData
//             processData: false, // No procesar los datos
//             success: function(data) {
//                 // Procesar los datos devueltos
//                 toastr.success('Cambios guadados correctamente'); 
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
//                 toastr.error('Ocurrió un error al procesar la solicitud.');
//             }
//         });
//     })
// });

