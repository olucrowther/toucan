
<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Enter Member Details</h1>
                <div class="member-alert alert" role="alert">
                    
                </div>
                <form id="addForm" class="row g-3 needs-validation" novalidate>
                    <div class="form-group">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control name" id="validationCustom01" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                        <!--<span class="input-group-text" id="inputGroupPrepend">abc@xyz.com</span>--->
                        <input type="email" class="form-control email" id="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email format
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04" class="form-label">Select school (You can select more than one)</label>
                        <select class="form-select school" multiple aria-label="multiple select example" required>
                            <option selected value="">Open this select menu</option>
                            <?php if(!empty($schools) && isset($schools)){ ?>
                                <?php foreach($schools as $school => $value){ ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['school_name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary member-btn" type="submit">Add member</button>
                    </div>
                </form>
            </div>
            <div class="col-sm">
                <!---One of three columns--->
                
            </div>
        </div>
    </div>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/member.js"></script>
<!--Container Main end-->