<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Grafik Kalkulator</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    </head>
    <body>
      <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading"><b>Grafik Lama Pengunjung Aplikasi Kalkulator</b></div>
               <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
       </div>
     </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script>
        var url = "{{url('waktu/chart')}}";
        var Time = new Array();
        var Nama = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                if(data.hasiltime != 0 || data.hasiltime != '0') {
                    Time.push(data.hasiltime);
                    Nama.push(data.name);
                }
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Nama,
                      datasets: [{
                          label: 'Waktu (Menit)',
                          data: Time,
                          borderWidth: 1,
                          backgroundColor: "#4582ec" ,
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>
    </body>
</html>
