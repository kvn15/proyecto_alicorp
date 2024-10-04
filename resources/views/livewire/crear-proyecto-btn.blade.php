<div>
    <button type="button" class="btn btn-alicorp" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal-nuevo">
        <i class="bi bi-plus-circle"></i> Crear Proyecto
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close-modal" data-bs-dismiss="modal">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#323232"/>
                        </svg>
                    </button>
                    <form wire:submit.prevent="submit" id="form-proyecto">
                        <!-- Progress bar -->
                        <div class="progressbar">
                            <div class="progress" id="progress"></div>
                            
                            <div
                                class="progress-step progress-step-active"
                                data-title="Promoción"
                            ></div>
                            <div class="progress-step" data-title="Datos"></div>
                            <div class="progress-step" data-title="Resumen"></div>
                        </div>
                    
                        <!-- Steps -->
                        <div class="form-step form-step-active">
                            <div class="container-modal-alicorp">
                                <div class="w-100">
                                    <h4>¿Qué promoción necesitas?</h4>
                                    <p class="subtitle-modal">Selecciona una de los siguientes opciones para continuar con la creación</p>
                                </div>
                                <div class="row">
                                    <input wire:model="tipo_proyecto" type="hidden" name="tipo_promocion" id="tipo_promocion">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <button type="button" class="img-tipo-proyecto" id="btn-landing">
                                            <img class="img-fluid" src="{{asset('backend/img/proyecto-landing.png')}}" alt="Landing Promocional">
                                            <p>Landing Promocional</p>
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <button type="button" class="img-tipo-proyecto" id="btn-web">
                                            <img class="img-fluid" src="{{asset('backend/img/proyecto-juego-web.png')}}" alt="Landing Promocional">
                                            <p>Juego Web</p>
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <button type="button" class="img-tipo-proyecto" id="btn-campana">
                                            <img class="img-fluid" src="{{asset('backend/img/proyecto-juego-campana.png')}}" alt="Landing Promocional">
                                            <p>Juego Campaña</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-next width-50 ml-auto" id="next-first" disabled>Continuar</button>
                            </div>
                        </div>
                        <div class="form-step">
                            <div class="container-modal-alicorp">
                                <div class="w-100 mb-4">
                                    <h4>Llena los datos</h4>
                                    <p class="subtitle-modal">Escribe los datos iniciales de la promoción <span class="tipo_promo_bold">Juego Web</span></p>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="nombrePromocion" class="form-label">Nombre del promoción</label>
                                        <input type="text" id="nombrePromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="descPromocion" class="form-label">Descripción de la promoción</label>
                                        <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3" id="selectJuegoContent">
                                        <label for="selectJuego" class="form-label">Seleccionar Juego</label>
                                        <select name="selectJuego" id="selectJuego" class="form-control form-input-alicorp">
                                            <option selected>-- Seleccionar --</option>
                                            @foreach ($game as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3" id="selectMarcaContent">
                                        <label for="selectMarca" class="form-label">Seleccionar Marca</label>
                                        {{-- <input type="text" id="nombrePromocion" class="form-control form-input-alicorp" placeholder="Escribir"> --}}
                                        <select class="form-select form-input-alicorp" id="selectMarca" data-placeholder="Escoja las marcas" multiple>
                                            <option>Christmas Island</option>
                                            <option>South Sudan</option>
                                            <option>Jamaica</option>
                                            <option>Kenya</option>
                                            <option>French Guiana</option>
                                            <option>Mayotta</option>
                                            <option>Liechtenstein</option>
                                            <option>Denmark</option>
                                            <option>Eritrea</option>
                                            <option>Gibraltar</option>
                                            <option>Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option>Haiti</option>
                                            <option>Namibia</option>
                                            <option>South Georgia and the South Sandwich Islands</option>
                                            <option>Vietnam</option>
                                            <option>Yemen</option>
                                            <option>Philippines</option>
                                            <option>Benin</option>
                                            <option>Czech Republic</option>
                                            <option>Russia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btns-group d-flex justify-content-between">
                                <a href="#" class="btn btn-prev">Atras</a>
                                <button type="button" class="btn btn-next" id="next-second">Continuar</button>
                            </div>
                        </div>
                        <div class="form-step">
                            <div class="container-modal-alicorp">
                                <div class="w-100 mb-4">
                                    <h4>Resumen</h4>
                                    <p class="subtitle-modal">Revisa el resumen de la promoción creada </p>
                                </div>
                                <div class="w-100 resumen-modal">
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>Tipo de Promoción</label>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none" id="juego-resumen">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>Juego</label>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>Nombre del promoción</label>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>Descripción del promoción</label>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>Marca</label>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" id="descPromocion" class="form-control form-input-alicorp" placeholder="Escribir">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btns-group d-flex justify-content-between">
                                <a href="#" class="btn btn-prev">Atras</a>
                                <button type="submit" class="btn btn-configuracion" id="next-fin">Crear promoción</button>
                            </div>
                        </div>
                    </form>
                    <div class="content-success d-none" id="form-success">
                        <div class="content-exito">
                            <h5>Creación Exitosa</h5>
                            <p class="subtitle-modal">El <span class="tipo_promo_bold">Juego Web</span> a sido creado</p>
                            <img src="{{ asset('backend/img/check.png') }}" alt="Check">
                            <p class="titulo-pro">Nuevo Proyecto</p>
                            <p class="id-pro"><b>ID: 1233125</b></p>
                            <button type="button" class="btn btn-configuracion">Ir a Configuración del proyecto</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="{{ asset('backend/js/admin/step.js') }}"></script>
    @endsection

    @section('script_jquery')
        <script>
            $( '#selectMarca' ).select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
                dropdownParent: $( '#selectMarca' ).parent(),
            } );
        </script>
    @endsection
</div>
