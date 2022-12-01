<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <canvas id="bar-chart"></canvas>
            </div>
            <div class="col-sm">
                
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>

  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#bar-chart"); 

      //bar chart data
      var data = {

        labels: cData.label,

        datasets: [

          {

            label: cData.label,

            data: cData.data,

            backgroundColor: [

              "#DEB887",

              "#A9A9A9",

              "#DC143C",

              "#F4A460",

              "#2E8B57",

              "#1D7A46",

              "#CDA776",

              "#CDA776",

              "#989898",

              "#CB252B",

              "#E39371",

            ],

            borderColor: [

              "#CDA776",

              "#989898",

              "#CB252B",

              "#E39371",

              "#1D7A46",

              "#F4A460",

              "#CDA776",

              "#DEB887",

              "#A9A9A9",

              "#DC143C",

              "#F4A460",

              "#2E8B57",

            ],
            borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }

        ]

      };

      //options
      var options = {

        responsive: true,

        title: {

          display: true,

          position: "top",

          text: "Schools",

          fontSize: 18,

          fontColor: "#111"

        },

        legend: {

          display: false,

          position: "bottom",

          labels: {

            fontColor: "transparent",

            fontSize: 12

          }

        }

      }; 

      //create bar Chart class object
      var chart1 = new Chart(ctx, {

        type: "bar",

        data: data,

        options: options

      });

 

  });

</script>
<!--Container Main end-->
