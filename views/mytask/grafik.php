<h3 class="box-body">Grafik My Task IT Berdasarkan Users Finished</h3>

<!-- <script type="text/javascript">
var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Task IT '
         },
         xAxis: {
            categories: ['nama']
         },
         yAxis: {
            title: {
               text: 'Jumlah Task'
            }
         },
              series:             
            [
            <?php 

    		$query = $mysqli->query("SELECT users_finished from `task` GROUP BY users_finished");
            while( $ret = $query->fetch_array() ){
             	 $nama=$ret['users_finished'];  
                 $query_jumlah = $mysqli->query("SELECT COUNT(*) as jumlah FROM task WHERE users_finished='$nama'") ;
                 while( $data = $query_jumlah->fetch_array() ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $nama; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script> -->
<div id='container'></div>	


<script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'container',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
            		text: 'Grafik Task IT '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
    					$query = $mysqli->query("SELECT users_finished from task GROUP BY users_finished");
                     
                        while ($ret = $query->fetch_array()) {
             	 			$nama=$ret['users_finished'];  
                         	$query_jumlah = $mysqli->query("SELECT COUNT(*) as jumlah FROM task WHERE users_finished='$nama'") ;
                         	$data = $query_jumlah->fetch_array();
	                        $jumlah = $data['jumlah'];     
                            ?>
                            [ 
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
             
                    ]
                }]
              });
        }); 
    </script>