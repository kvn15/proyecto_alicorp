@include('cabecera.header-2')
<section class="contacto">
    <div class="container">
        <div class="row">
            <form action="">
                <div class="col-md-12 formulario">
                    <div class="contact-title">
                        <h2>Contacta </h2>
                        <h3>con nosotros</h3>
                        <hr class="hr-contact">
                    </div>
                    
                    <div class="mb-3 row align-items-center">
                        <label for="staticEmail" class="col-sm-5 nombres">Nombres y Apellidos</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="staticEmail">
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="inputPassword" class="col-sm-5 col-form-label">Correo</label>
                        <div class="col-sm-7">
                        <input type="email" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="mb-4">Escribe una consulta</label>
                        <div class="col-md-12">
                            <textarea name="consulta" id="" class="form-control"></textarea>
                        </div>                        
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <button class="btn btn-light">Enviar</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
  </section>

@include('footer')