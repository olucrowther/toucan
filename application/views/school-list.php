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
                <div class="table-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">School name</th>
                            <th scope="col">No of students</th>
                            <th scope="col">Members</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($schools) && isset($schools)){ ?>
                                <?php $count = 1; ?>
                                <?php foreach($schools as $school => $school_value){ ?>
                                <?php $names = array(); ?>
                                <?php (@$school_value['name'])? $names = explode(',', $school_value['name']): ''; ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $school_value['school_name']; ?></td>
                                        <td><?php echo $school_value['no_of_students']; ?></td>
                                        <td>
                                        <?php 
                                            if(!empty(@$names)){
                                                echo '<ol>';
                                                for($i = 0; $i < count($names); $i++){
                                                    echo '<li>'.$names[$i].'</li>';
                                                }
                                                echo '</ol>';
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm">
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<!--Container Main end-->