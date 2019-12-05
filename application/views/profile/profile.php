<div class="card">
    <div class="card-header">Profile Update</div>
    <div class="card-body card-block">
<form method="POST" onsubmit="return UpdateStaff(this);" id="RegisterForm"  enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id="username" name="username" value="<?php echo $staffDetails->staff_name; ?>" placeholder="Username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" id="mobile" value="<?php echo $staffDetails->staff_contactnumber; ?>" name="mobile" placeholder="Mobile Number" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <input type="email" id="email" value="<?php echo $staffDetails->staff_email; ?>" name="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="form-actions form-group">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    function UpdateStaff(formElement) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>updateProfileOfStaff',
            data: $(formElement).serialize(),
            success: function (res) {
                if (res === '1') {
                    swal({
                        title: "Congratulation",
                        text: "Profile Has Been Updated",
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