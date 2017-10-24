<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet" href="css/styl.css">

  </head>

  <body>
    <div class="form">
      <?php $a=@$_GET[x]; if($a==1) { echo"<tr bgcolor=red><td colspan=2><font size=4 color=red><center>User Id Already exists</font></td></tr>"; } if($a==2) { echo"<tr bgcolor=yellow><td colspan=2><font color=red><center>User created
      succesfully</font></td></tr>"; } ?>
      <ul class="tab-group">
        <li class="tab active">
          <a href="#signup">Sign Up</a>
        </li>
        <li class="tab">
          <a href="#login">Log In</a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="signup.php" name="myform" method="POST" onsubmit="return validation()">

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input type="text" name=t1/>
              </div>

              <div class="field-wrap">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input type="text" name=t2>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Metro Card Number<span class="req">*</span>
              </label>
              <input type="text" name=t3>
            </div>

            <div class="field-wrap">
              <label>
                Mobile Number<span class="req">*</span>
              </label>
              <input type="number" name=t4>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name=t5>
            </div>

            <div class="field-wrap">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input type="password" name=t6>
            </div>

            <button type="submit" class="button button-block"/>Get Started</button>

        </form>

      </div>

      <div id="login">
        <h1>Welcome Back!</h1>

        <form action="log.php" method="POST" name="myform1" onsubmit="return validation1()">

          <div class="field-wrap">
            <label>
              Metro Card Number<span class="req">*</span>
            </label>
            <input type="text" name=t9>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name=t10>
          </div>

          <p class="forgot">
            <a href="pwd1.php">Change Password....</a>
          </p>

          <button class="button button-block"/>Log In</button>

      </form>
      <?php $a=@$_GET[x]; if($a==3) { echo "<script type='text/javascript'>"; echo "alert('UserID Invalid....');"; echo"</script>"; } if($a==4) { echo "<script type='text/javascript'>"; echo "alert('UserID Invalid....');"; echo"</script>"; } ?>
    </div>

  </div>
  <!-- tab-content -->

</div>
<!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
<script type="text/javascript">
  function validation() {
    var result = true;
    var dt = Date();
    var x = document.getElementsByTagName('input');
    if (x[0].value.length == 0) {
      window.alert("First name field cannot be empty....");
      document.myform.t1.focus();
      return false;
    }
    if (x[1].value.length == 0) {
      alert("Last name field cannot be empty....");
      document.myform.t2.focus();
      return false;
    }
    if (x[2].value.length == 0 || x[2].value.length > 5) {
      alert("Metro card number Invalid....");
      document.myform.t3.focus();
      return false;
    }
    if (x[3].value.length != 10) {
      alert("Invalid Mobile Number....");
      document.myform.t4.focus();
      return false;
    }
    if (x[4].value.length == 0) {
      alert("Invalid Email Id....");
      document.myform.t5.focus();
      return false;
    }
    if (x[5].value.length < 4) {
      alert("Password Should be of minimum length 4....");
      document.myform.t4.focus();
      return false;
    }
    return true;
  }
</script>
</body>
</html>
