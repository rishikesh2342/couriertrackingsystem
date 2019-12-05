<div class="card">
    <form  method="post" onsubmit="return submitStaff(this);" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Staff Details</strong>
        </div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="branch-name" class=" form-control-label">Branch Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="branchName" id="select" class="form-control">
                        <option>Select Branch Name</option>
                        <?php
                        for ($x = 0; $x < count($branchList); $x++) {
                            ?>
                            <option value="<?php echo $branchList[$x]->branch_id; ?>"><?php echo $branchList[$x]->branch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="staff-name" class=" form-control-label">Staff Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="staffName" name="staffName" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="staff-ContactNumber" class=" form-control-label">Staff Contact Number</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="staffContactNumber" name="staffContactNumber" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="staff-email" class=" form-control-label">Staff Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="staffEmail" name="staffEmail"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="staff-password" class=" form-control-label">Staff Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="staffPassword" name="staffPassword"  class="form-control">
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
    function submitStaff(formElement) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>registerStaff',
            data: $(formElement).serialize(),
            success: function (res) {
                if (res === '1') {
                    swal({
                        title: "Congratulation",
                        text: "Staff has been created",
                        icon: "success"
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
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