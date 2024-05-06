<?php
  $page_title = 'Headcount';
  require_once('include/load.php');
include_once('layouts/header.php'); ?>

<body>
    <div class="content" style="overflow: auto;">
        <div class="tab-content" style="display: block;">
            <section>
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard Producción</h1>
                            </div><!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

                <?php
            include_once('widgets/steam.php');
            include_once('widgets/tabla_produccion.php');
            include_once('widgets/grafico_semana.php');
            
            
            ?>
            
            </section>
        </div>
        <div class="tab-content" style="display: none;">
    <?php include_once('calendar.php'); 
    //include_once('widgets/calidad_Agua.php');
    ?>
    </div>
        <div class="tab-content" style="display: none;">Contenido de la pestaña 3</div>

        

        <?php 
        include_once('layouts/footer.php'); 
        ?>
    </div>
    
    <script src="js/servidorescrud.js"></script>

</body>

</html>
<?php include_once('modals/datos_departament.php'); ?>
<script src="js/calendar.js"></script>