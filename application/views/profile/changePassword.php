<div class="card">
    <div class="card-header">Update Password</div>
    <div class="card-body card-block">
        <form id="RegisterForm" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">
            <!--<input style="display: none;" type="text" id="staffId" value="<?php $this->session->userdata('userId') ?>" name="staffId" class="form-control">-->

            <div style="display: none;" class="form-group">
                <div class="input-group">
                    <input type="password" id="password" name="password2" placeholder="Current Password" class="form-control">
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="form-control">
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="ConfirmPassword" name="password2" placeholder="Confirm Password" class="form-control">
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
            </div>
            <span id="errormsg"></span>
            <div class="form-actions form-group">
                <button type="submit" onclick="return Validate(this)" class="btn btn-success btn-sm" id="save">Update</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
//    $('#newPassword, #ConfirmPassword').on('keyup', function () {
//        if ($('#newPassword').val() === $('#ConfirmPassword').val()) {
//            $('#errormsg').html('').css('color', 'green');
//            $('#save').prop('disabled', false);
//        } else
//            $('#errormsg').html('Password not matching').css('color', 'red');
//        $('#save').prop('disabled', true);
//    });
    function Validate() {
        var password = document.getElementById("newPassword").value;
        var confirmPassword = document.getElementById("ConfirmPassword").value;
        if (password != confirmPassword) {
             $('#errormsg').html('Password not matching').css('color', 'red');return false;
        } else {
            var formData = new FormData(document.querySelector('#RegisterForm'));
        $.ajax({
            url: '<?php echo base_url(); ?>updatePassword',
            method: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res === '1') {
                    swal({
                        title: "Congratulation",
                        text: "Password Has Been Updated",
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
    }
//    function updatePassword() {
//        var formData = new FormData(document.querySelector('#RegisterForm'));
//        $.ajax({
//            url: '<?php echo base_url(); ?>updatePassword',
//            method: "POST",
//            data: formData,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function (res) {
//                if (res === '1') {
//                    swal({
//                        title: "Congratulation",
//                        text: "Password Has Been Updated",
//                        icon: "success"
//                    }).then(function () {
//                        window.location.reload();
//                    });
//                } else {
//                    swal({
//                        title: "Error!",
//                        text: "Unable to submit the form. Please check validation and Try again!!",
//                        icon: "error"
//                    }).then(function () {
//                        window.location.reload();
//                    });
//                }
//            }
//        });
//        return false;
//    }




</script>