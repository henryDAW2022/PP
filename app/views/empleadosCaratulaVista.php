<?php include_once("header.php"); ?>

<!-- Graficos -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart","table"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Status');
        data.addRows([
            <?php 
           
           if(isset($datos["data"])){
            for($i=0; $i<count($datos['data']); $i++){
                echo "['".$datos["data"][$i]["nombre"]."',".$datos["data"][$i]["status"]."],";
                //echo "['status',".$datos["data"][$i]["status"]."],";
            }
        }?>
        //   ['Mike',  {v: 10000, f: '$10,000'}, true],
        //   ['Jim',   {v:8000,   f: '$8,000'},  false],
        //   ['Alice', {v: 12500, f: '$12,500'}, true],
        //   ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Nombre', 'Total Activos'],
           <?php 
           
           if(isset($datos["data2"])){
            for($i=0; $i<count($datos['data2']); $i++){
                echo "['".$datos["data2"][$i]["status"]."',".$datos["data2"][$i]["cant"]."],";
                //echo "['status',".$datos["data"][$i]["status"]."],";
            }
        }
            
?>
        //   ['Work',     11],
        //   ['no Work',      2]
        
        ]);

        var options = {
          title: 'Activos vs Bajas',
          pieHole: 0.8,
          colors : ['#198754' ,'#DC3545']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <p></p>
    <div>
        <table class="table table-striped" width="100%">
            <thead>
                <tr>
                    <th>KPIs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><div id="donutchart" style="width: 260px; height: 200px;"></div></td>
                    <td><div id="table_div" ></div></td>
                </tr>
            </tbody>
    </div>
           <!--<div id="donutchart" style="width: 260px; height: 200px;display:inline;"></div><div id="table_div" style="display:inline;"></div></div>-->

<h1 class="text-center"><?php
  if (isset($datos["subtitulo"])) {
    print $datos["subtitulo"];
  }
 
  ?>
</h1>
<div>
<table class="table table-striped" width="100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>fecha alta</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            for($i=0; $i<count($datos['data']); $i++){
                print "<tr>";
                print "<td>".$datos["data"][$i]["id"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["nombre"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["apellidos"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["creado_dt"]."</td>";
                print "<td><a href='".RUTA."gestempleados/modificar/".$datos["data"][$i]["id"]."'class='btn btn-info'>Modificar</a></td>";
                print "<td><a href='".RUTA."gestempleados/baja/".$datos["data"][$i]["id"]."'class='btn btn-danger'>Eliminar</a></td>";
                print "</tr>";
            }
        ?>
    </tbody>
</table>
</div>

<a href="<?php print RUTA;  ?>gestempleados/alta" class="btn btn-success">
Nuevo Conductor</a>
  
<?php include_once("footer.php"); ?>