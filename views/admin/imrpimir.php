<div id="reporte">
    <!-- <h1 class="text-center fs-1 fw-bold mb-5 text-uppercase">Alitas Legendarias</h1> -->
    <picture class="d-flex justify-content-center">
        <source srcset="/build/img/LogoNegro.avif" type="image/avif">
        <source srcset="/build/img/LogoNegro.webp" type="image/webp">
        <img src="/build/img/LogoNegro.jpg" alt="LogoNegro" class="w-50 my-5">
    </picture>
    <div class="d-flex justify-content-end">
        <table class="table table-bordered w-auto text-center fs-2">
            <thead>
                <tr class="bg-body-secondary">
                    <th scope="col">Reporte de Ventas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fs-3">
                        <?php echo $inicio . ' / ' . $fin; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <table class="table table-bordered text-center fs-2">
        <thead>
            <tr class="bg-body-secondary">
                <th scope="col">Código</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenes as $orden) : ?>
                <tr>
                    <td><?php echo $orden->id; ?></td>
                    <td><?php echo $orden->fecha; ?></td>
                    <td><?php echo $orden->nombre; ?></td>
                    <td>$<?php echo $orden->precio; ?></td>
                    <td><?php echo $orden->cantidad; ?></td>
                    <td>$<?php echo $orden->total; ?></td>
                </tr>
                <?php $total = $total + $orden->total; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="fs-2 my-5">Total: <span class="fw-bold text-danger">$<?php echo $total; ?></span></p>
</div>

<div id="reporteBotones">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <button type="button" id="btnImprimir" class="btn btn-primary fs-3 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-printer text-white" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
            Imprimir
        </button>
        <a href="/admin/reporte" class="btn btn-secondary fs-3 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-return-left text-white" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
            </svg>
            Regresar
        </a>
    </div>
</div>

<?php $script = '<script src="/build/js/app.js"></script>'; ?>