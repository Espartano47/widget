<!--card -->
<?php
  $page_title = 'Headcount';
  require_once('include/load.php');
include_once('layouts/header.php'); ?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Calidad de Agua</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <!--imagen de una gota de agua-->
                <img src="https://th.bing.com/th/id/OIP.dHnBPu7t0dDTqnn7GBMfUQHaH7?rs=1&pid=ImgDetMain"
                    alt="Gota de agua" style="width: 100px; height: 100px;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr style="background-color: #0AD2FA;">
                                <th>Meta</th>
                                <th style="text-align: center; vertical-align: middle;">< 280 Pt.Co. <br>Color</th>
                                <th style="text-align: center; vertical-align: middle;">< 50 mg/l<br>SST</th>
                                <th style="text-align: center; vertical-align: middle;">< 150 mg/l<br>DQO</th>
                                <th style="text-align: center; vertical-align: middle;">> 4.00 mg/l<br>Oxigeno D.</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>Influente</td>
                                <td>48</td>
                                <td>mg/L</td>
                                <td>6.5 - 8.5</td>
                            </tr>
                            <tr>
                                <td>Efluente</td>
                                <td>25</td>
                                <td>°C</td>
                                <td>25 - 30</td>
                            </tr>
                            <tr>
                                <td>% Remosión</td>
                                <td>0.5</td>
                                <td>µS/cm</td>
                                <td>0.5 - 0.8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>