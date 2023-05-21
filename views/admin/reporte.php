<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <p class="descripcion-pagina">Selecciona el rango de fechas que deseas imprimir el reporte</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/admin/reporte" method="post">
                <div class="row">
                    <div class="col-md-6 fs-3 mb-5 mb-md-0">
                        <label for="inicio" class="form-label fw-bold">Fecha Inicial</label>
                        <input type="date" name="inicio" id="inicio" class="form-control fs-3" required>
                    </div>
                    <div class="col-md-6 fs-3">
                        <label for="fin" class="form-label fw-bold">Fecha Final</label>
                        <input type="date" name="fin" id="fin" class="form-control fs-3" required>
                    </div>
                </div>
                <p class="logoRojo mt-3 fs-4">* Si quieres el reporte de un solo día coloca en ambos campos el mismo día</p>
                <input type="submit" value="Enviar" class="boton mt-5 fs-3">
            </form>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>