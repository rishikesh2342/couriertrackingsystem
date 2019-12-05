<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="images/icon/logo.png" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form id="RegisterForm" onsubmit="return submitUser(this);" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="au-input au-input--full" type="text" name="mobile" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="au-input au-input--full" type="password" name="password2" placeholder="Confirm Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="aggree">Agree the terms and policy
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" onclick="return checkPassword(this)" type="submit">register</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="<?php echo base_url(); ?>">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function submitUser(formElement) {
      console.log(formElement);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>userRegistration',
            data: $(formElement).serialize(),
            success: function (res) {
                if (res.trim() === "1") {
                    alert("Your Account created successfully !");
                    window.location.href = "<?php echo base_url(); ?>";
                } else {
                    alert(res);
                }
            }
        });
        return false;
    }
    // Function to check Whether both passwords 
    // is same or not. 
    function checkPassword(form) {
        password1 = form.password1.value;
        password2 = form.password2.value;

        // If password not entered 
        if (password1 == '')
            alert("Please enter Password");

        // If confirm password not entered 
        else if (password2 == '')
            alert("Please enter confirm password");

        // If Not same return False.     
        else if (password1 != password2) {
            alert("\nPassword did not match")
            return false;
        }

        // If same return True. 
        else {
            window.location.href = "<?php echo base_url(); ?>"
        }
    }

  
</script> 