
<!-- inner banner -->
<div class="inner-banner" id="home">
    <div class="container">

    </div>	
</div>
<!-- inner banner -->

<!-- contact -->
<section class="contact py-5 my-lg-5">
    <h2 class="heading text-center mb-sm-5 mb-4"> Login User</h2>
    <div class="map">
        <div class="main_grid_contact">
            <div class="form">
                <h3 class="text-capitalize mb-2">Log In</h3>
                <form id="loginForm"  method="post">
                    <div class="input-group">
                        <input type="text" class="margin2" name="username"  placeholder="User Name" required="">
                    </div>
                    <div class="input-group">
                        <input type="password" class="margin2" name="password1" placeholder="Password" required="">
                    </div>
                    <div class="input-group1">
                        <button onclick="submitLogin();return false;" class="submit btn">Send </button>
                    </div>
                </form>
            </div>
            <div class="w3ls-contact">

            </div>
        </div>
    </div>
</section>
<!-- //contact -->
<script type="text/javascript">
    function submitLogin() {
        var formData = $('#loginForm').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>submitLogin",
            dataType: 'html',
            data: formData,
            success: function (res) {
                if (res.trim() === "1") {
                    window.location.href = '<?php echo base_url() ?>dashboard';
                } else {
                    alert("Invalid Username and Password !!!");
                }
            }
        });
    }
</script>

