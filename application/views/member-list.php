
<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container">
        <div class="row">
            <a href="<?php echo base_url(); ?>export-member-list"><i class="bx bx-file"></i>Export CSV</a>
            <div class="col-sm">
                <div class="table-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">School</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($members) && isset($members)){ ?>
                                <?php $count = 1; ?>
                                <?php foreach($members as $member => $member_value){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $member_value['name']; ?></td>
                                        <td><?php echo $member_value['email_address']; ?></td>
                                        <td>
                                            <?php  
                                                $schools = explode(',', $member_value['school']); 
                                                echo '<ol>';
                                                for($i = 0; $i < count($schools); $i++){
                                                    echo '<li>'.$this->members_model->getSchool($schools[$i]).'</li>';
                                                }
                                                echo '</ol>';
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
                
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/member.js"></script>
<!--Container Main end-->