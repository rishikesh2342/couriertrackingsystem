<div class="card">
    <div class="card-header">
        <strong>Branch Details</strong>
    </div>
    <form  method="post" id="RegisterForm" onsubmit="return SubmitBranch(this);" enctype="multipart/form-data" class="form-horizontal">
        <input name="branchId" style="display:none" value="<?php if(isset($branchDetails->branch_id)){echo $branchDetails->branch_id; }?>"/>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="branch-name" class=" form-control-label">Branch Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="branchName" name="branchName" value="<?php if(isset($branchDetails->branch_name)){echo $branchDetails->branch_name;
                    }  ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="branch-ContactNumber" class=" form-control-label">Branch Contact Number</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?php if(isset($branchDetails->branch_contactnumber)){echo $branchDetails->branch_contactnumber; }?>" id="branchContactNumber" name="branchContactNumber" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="branch-email" class=" form-control-label">Branch Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" value="<?php if(isset($branchDetails->branch_email)){echo $branchDetails->branch_email; }?>" id="branchEmail" name="branchEmail"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Branch Address</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="branchAddress" id="branchAddress" rows="4"  class="form-control"><?php if(isset($branchDetails->branch_address)){echo $branchDetails->branch_address; }?></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="State" class=" form-control-label">Branch State</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?php if(isset($branchDetails->branch_state)){echo $branchDetails->branch_state; }?>" id="State" name="State"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="City" class=" form-control-label">Branch City</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?php if(isset($branchDetails->branch_city)){echo $branchDetails->branch_city; }?>" id="password-input" name="City"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="Pincode" class=" form-control-label">Branch Pincode</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?php if(isset($branchDetails->branch_pincode)){echo $branchDetails->branch_pincode; }?>" id="pincode" name="pincode"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="country" class=" form-control-label">Branch Country</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?php if(isset($branchDetails->branch_country)){echo $branchDetails->branch_country; }?>" id="country" name="country"  class="form-control">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
</div>


<script>
    function SubmitBranch(formElement) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>branchRegistration',
            data: $(formElement).serialize(),
            success: function (res) {
                if (res === '1') {
                    swal({
                        title: "Congratulation",
                        text: "Branch has been created",
                        icon: "success"
                    }).then(function () {
                       window.location.href = '<?php echo base_url(); ?>manageBranch';
                    });
                }else if(res === '2'){
                swal({
                        title: "Congratulation",
                        text: "Branch has been updated",
                        icon: "success"
                    }).then(function () {
                       window.location.href = '<?php echo base_url(); ?>manageBranch';
                    });
                }
                else {
                    swal({
                        title: "Error!",
                        text: "Unable to submit the form. Please check validation and Try again!!",
                        icon: "error"
                    }).then(function () {
                        window.location.reload();
                    });
                }
            }
        });
        return false;
    }
</script>