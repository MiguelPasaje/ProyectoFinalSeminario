<h1 class="row p-5 m-3 bg-info text-white">CONTÁCTANOS!</h1>
<div class="container bg-info p-3">
    <form id="formularioContacto" action="" method="POST"></form>
    <div class="p-3" id="contactForm">
        <div class="form-group row">
            <label class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><h3>Nombre</h3></label>
            <div class="col p-2 text-white col-sm-12 col-xs-12"><input form="formularioContacto" class="form-control" id="nombreContacto" type="text" name="nombre" required></div>
        </div>
        <div class="form-group row">
            <label class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><h3>Correo</h3></label>
            <div class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><input form="formularioContacto" class="form-control" id="correoContacto" type="text" name="correo" required></div>
        </div>
        <div class="form-group row">
            <label class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><h3>Asunto</h3></label>
            <div class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><input form="formularioContacto" class="form-control" id="asuntoContacto" type="text" name="asunto" required></div>
        </div>
        <div class="form-group row">
            <label class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><h3>Mensaje</h3></label>
            <div class="col p-2 text-white col-sm-12 col-xs-12 col-md-6 col-lg-6"><textarea form="formularioContacto" class="form-control" id="mensajeContacto" type="text" name="mensaje" required></textarea></div>
        </div>
        <div class="form-group row">
            <div class="col">
                <button form="formularioContacto" id="btnEnviarMail" type="button" class="col btn btn-success"><h2>Enviar</h2></button>
            </div>
        </div>

    </div>
</div>
<div id="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3988.90944115024!2d-77.28235588590792!3d1.222988562312202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1558104377137!5m2!1ses!2sco" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>