<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container">
        <div class="row">            
            <div class="col-sm">
                <div style="padding-top:20px;">
                    <form action="<?php echo base_url('search-school-list'); ?>" method="POST">
                        <div class="row g-3">
                            <div class="col-10">
                                <select class="form-select" name="country" aria-label="Default select example">
                                    <option selected value="">Search by country</option>
                                    <?php if(!empty($countries) && isset($countries)){ ?>
                                        <?php foreach($countries as $country => $country_value){ ?>
                                            <option value="<?php echo $country_value['country']; ?>"><?php echo $country_value['country']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-block btn-primary">Search</button>   
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">School name</th>
                        <th scope="col">No of students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($schools) && isset($schools)){ ?>
                            <?php $count = 1; ?>
                            <?php foreach($schools as $school => $school_value){ ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $school_value['school_name']; ?></td>
                                    <td><?php echo $school_value['no_of_students']; ?></td>
                                </tr>
                                <?php $count++; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm">
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/member.js"></script>
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

          fontSize: 16,

          fontColor: "#111"

        },

        legend: {

          display: true,

          position: "bottom",

          labels: {

            fontColor: "#333",

            fontSize: 16

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