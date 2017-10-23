 <html>
	<head>
		<meta charset="UTF-8">
  <title>Change Password</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link rel="stylesheet" href="css/style1.css">
	</head>

	<body>
  <div class="form">

          <h1>Change password</h1>
		<form name=form_pwd action="pwd2.php" method="POST">
            <div  class="field-wrap">
              <label>
                Metro Card Number<span class="req">*</span>
              </label>
              <input type="text" name=t1>
            </div>

            <div class="field-wrap">
              <label>
                Old Password<span class="req">*</span>
              </label>
              <input type="password" name=t2>
            </div>

          <div class="field-wrap" >
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="password" name=t3 >
          </div>
          <button type="submit" class="button button-block"/>Change Password</button>
          		</div>
		</form>
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

	<?php
          $a=@$_POST[x];
          if($a==1)
          {
    
          		echo "Invalid Entries";
          }
          if($a==2)
          {
      echo "Password Successfully Changed";
          }

    ?>
            
	</body>
</html>