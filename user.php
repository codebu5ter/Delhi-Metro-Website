<?php
session_start();
$mcn=$_SESSION[mcn];
if($mcn==NULL)
{
	header("location:login.php?x=4");
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DMRC</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animations.css" rel="stylesheet">
  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body  background="img/bg.jpg"  class="home">
  <!-- wrapper -->
  <div id="wrapper" class="win-min-height">
    <header id="header" class="header block background01">
      <div class="container header_block">
        <div class="row">
          <div class="social-icon">
          </div>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                  <img class="img-responsive" src="images/logo.png" alt="">
                </a>
                <div class="menu-btn">
                  <button type="button" class="navbar-toggle collapsed color02" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <strong> <span class="sr-only">Toggle navigation</span> <span class="icon-bar background02"></span> <span class="icon-bar background02"></span> <span class="icon-bar background02"></span> </strong> <strong> MENU</strong>
                  </button>
                </div>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav color02">
                  <li class="active"><a href="#wrapper">Home</a></li>
                  <li> <a href="#rides">Past Rides</a></li>
                  <li> <a href="#balance">balance</a></li>
                  <li> <a href="#recharge">recharge</a></li>
                  <li> <a href="#counter">Features</a></li>
                  <li> <a href="#team">team</a></li>

				  <li> <a href="logout.php"><font color="red">Logout</font></a></li>

                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <section id="home" class="block background01 animatedParent animateOnce">
        <?php
mysql_connect("localhost","root");
mysql_select_db("metro");
$res=mysql_query("SELECT * FROM signup WHERE mcn='$mcn'");
$cnt=mysql_num_rows($res);

for($i=0;$i<$cnt;$i++)
{
	$a1=mysql_result($res,$i,"fname");
}
?>

<?php		echo"<tr bgcolor=yellow><td colspan=2><center><h2>Welcome $a1</h2></td></tr>" ?>
   <form action='user.php' method='POST'>
   	<br>


   <table width="70%" align="center">
     <tr>
      <td class="brdss" style="color: #000000;"><b>From</b></td>
  		<td class="brdss">
    <select name=t7>
	<option selected="selected">CHOOSE A STATION</option>
		<option value="AKSHARDHAM">AKSHARDHAM</option>
		<option value="DWARKA">DWARKA</option>
		<option value="GOLF COURSE">GOLF COURSE</option>
		<option value="INDRAPRASTHA">INDRAPRASTHA</option>
		<option value="KAROL BAGH">KAROL BAGH</option>
		<option value="MANDI HOUSE">MANDI HOUSE</option>	
		<option value="PRAGATI MAIDAN">PRAGATI MAIDAN</option>
		<option value="RAJOURI GARDEN">RAJOURI GARDEN</option>
		<option value="YAMUNA BANK">YAMUNA BANK</option>
	</select>
      </td>
     <td class="brdss" style="color: #000000;"><b>To</b></td>
       <td class="brdss">
    <select name=t8>
    	<option selected="selected">CHOOSE A STATION</option>
		<option value="AKSHARDHAM">AKSHARDHAM</option>
		<option value="DWARKA">DWARKA</option>
		<option value="GOLF COURSE">GOLF COURSE</option>
		<option value="INDRAPRASTHA">INDRAPRASTHA</option>
		<option value="KAROL BAGH">KAROL BAGH</option>
		<option value="MANDI HOUSE">MANDI HOUSE</option>
		<option value="PRAGATI MAIDAN">PRAGATI MAIDAN</option>
		<option value="RAJOURI GARDEN">RAJOURI GARDEN</option>
		<option value="YAMUNA BANK">YAMUNA BANK</option>
	</select>
    </td>
	  <td class="brdss">
	  <input type='hidden' name='s' value='<?php if(isset($mcn)){ echo $mcn;}?>' />
       <input type="submit" name="ctl00$MainContent$btnShowFare" value="Submit" id="ctl00_MainContent_btnShowFare" class="slt_stnr_btn" />
     </td>
    </tr>
    </table>
    </form>
    </div>
 
       <section id="rides"> <br><br><br><br><h2>Last 5 rides</h2>
       <table style="width:50%" border="1" align="center" >
       </section>

<?php
include_once("db.php");

$mcn2=@$_POST[s];
$res=mysql_query("SELECT * FROM signup WHERE mcn='$mcn2'");
$cnt=mysql_num_rows($res);

$st1=@$_POST[t7];
$st2=@$_POST[t8];
$result = mysql_query("CALL p_station('$st1','$st2',@dist)") ;	
$result1=mysql_query("Select @dist");
  //loop the result set
 $row = mysql_fetch_array($result1);
     // echo "<h><center>$row[0]</h1>"  ; 
$row1= 1.8*$row[0];

//shikhar.nehru@teamsg.in

for($i=0;$i<$cnt;$i++)
{
	$nm=mysql_result($res,$i,"fname");
}
$res99=mysql_query("SELECT * FROM signup WHERE mcn='$mcn' ");
$cnt=mysql_num_rows($res99);

for($i=0;$i<$cnt;$i++)
{
	$bal1=mysql_result($res99,$i,"balance");
}
if($bal1>20 & isset($_POST["t7"]))
{
mysql_query("delete from rides where mcn1=0");
mysql_query("insert into rides values('$mcn2','$nm','$st1','$st2','$row1',current_timestamp)");
mysql_query("update signup set balance=balance-'$row1' where  mcn='$mcn2' ");
}
else 
{
	echo "<h2><font color=red>Not enough balance ....Recharge..</font></h2>";
}
?>
<?php
mysql_connect("localhost","root");
mysql_select_db("metro");
$res=mysql_query("SELECT * FROM rides WHERE mcn1='$mcn' order by date1 desc limit 5");
$cnt=mysql_num_rows($res);
mysql_query("delete from rides where fare=0.00");
for($i=0;$i<$cnt;$i++)
{
	$a1=mysql_result($res,$i,"mcn1");

	$a2=mysql_result($res,$i,"user_name1");

	$a3=mysql_result($res,$i,"frm1");

	$a4=mysql_result($res,$i,"to1");

	$a6=mysql_result($res,$i,"fare");

	$a5=mysql_result($res,$i,"date1");

	mysql_query("delete from rides where fare=0.00");

	echo"<tr><td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a6</td><td>$a5</td></tr>";
}

?>


</table>
	
      </section>


		

</section>
    
    <section id="recharge" class="block background01 animatedParent animateOnce">
      <div class="container">
        <div class="row">
          <div class="projects">
            <h2 class="animated fadeIn slow"><font color=red size=5px>Recharge</font>
            <div id="Carousel06d" class="carousel slide">
              <div class="portfolio">
                <div id="ourprojects" class="carousel-inner">
                  <div class="holder animated fadeIn slow">

			      </div>
                </div>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   <center>
    <form action="user.php" method="POST">

    	<select name=t20>
    		<option selected="selected">Choose your recharge plan</option>
			<option value="150" >₹ 150</option>
			<option value="200">₹ 200</option>
			<option value="250">₹ 250</option>
			  <input type='hidden' name='s' value='<?php if(isset($mcn)){ echo $mcn;}?>' />

		      <input type="submit"  value="Pay Now"  />

		</select>
	</form>
</center>


<?php
mysql_connect("localhost","root");
mysql_select_db("metro");
$bal3=@$_POST[t20];
$sad=$bal3;
mysql_query("update signup set balance=balance+'$sad' where  mcn='$mcn' ");
mysql_query("delete from rides where fare=0");

?>


<section id="balance" class="block background01 animatedParent animateOnce">
<div class="tab-content background09">
<h2>Balance</h2>
	
            <div role="tabpanel" id="tab1" class="boxes active tab-pane">
              <div class="container">
                <div class="holder">
                  <div class="col color01 col-sm-6 m-item">
                    <div class="box-holder background01">
                      <div class="icone_box color01 col-sm-5 col-xs-4">
                        <img class="img-responsive" src="img/r.jpg" alt="Project">
                      </div>
                      <div class="col-sm-7 col-xs-8 text_box color02">
                        <div class="text-holder">

                    </div>
                      </div>
                    </div>
                  </div>
				</div>
				</div>
				</div>
				</div>

<?php
mysql_connect("localhost","root");
mysql_select_db("metro");
$res99=mysql_query("SELECT * FROM signup WHERE mcn='$mcn' ");
$cnt=mysql_num_rows($res99);

for($i=0;$i<$cnt;$i++)
{
	$bal=mysql_result($res99,$i,"balance");
}


mysql_query("delete from rides where fare=0");
echo "<center><font color=purple size=10px>₹ $bal </font></center>";
if($bal<20)
{
	echo "<font color=red>Not enough balance</font>";
}

            
?>

  <section id="counter" class="block background09 animatedParent animateOnce">
      <div class="container">
        <div class="row">
          <div class="feature animated fadeIn slow">
            <h2>Features</h2>
   
          </div>
          <div class="boxes animated fadeIn slow">
            <div class="col col-sm-3 col-xs-12">
              <div class="icone_box counter">4,000,000</div>
              <h3>Daily Ridership</h3>
              <div class="text-holder color04">
                <p>As of 2016, the Delhi Metro network carries over 4 million passengers daily.</p>
              </div>
            </div>
            <div class="col col-sm-3 col-xs-12">
              <div class="icone_box counter">213</div>
              <h3>Kms Metro Network</h3>
              <div class="text-holder color04">
                <p>The Delhi Metro network covers over 213 kms and is being expanded even further.</p>
              </div>
            </div>
            <div class="col col-sm-3 col-xs-12">
              <div class="icone_box counter">216</div>
              <h3>Trains</h3>
              <div class="text-holder color04">
                <p>The Delhi Metro network has 216 metro trains in operation.</p>
              </div>
            </div>
            <div class="col col-sm-3 col-xs-12">
              <div class="icone_box counter">37</div>
              <h3>Awards</h3>
              <div class="text-holder color04">
                <p>The Delhi Metro Rail Corporation has won 37 awards till date.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
    </section>
   <section id="team" class="block background01 animatedParent animateOnce">
      <div class="container">
        <div class="row">
          <div class="team">
            <h2 class="animated fadeIn slow">The Team</h2>
            <div class="holder animated fadeIn slow">
              <div class="col col-md-3 col-sm-3 col-xs-12">
                <div class="img_hoilder">
                  <a href="javascript:void(0)">
                    <img class="img-responsive" src="img/t1.jpg" alt="Article">
                  </a>
                </div>
                <div class="text_holder">
                  <h3><a class="color02 color01-hover03" href="javascript:void(0)">Achintya Sharma</a></h3> <span class="color04">15103374</span>
                  <a class="btn more color02 color01-hover border-color06" href="https://www.facebook.com/Achintya999"><i class="fa fa-facebook">&nbsp;</i></a> <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-twitter">&nbsp;</i></a>
                  <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-google-plus">&nbsp;</i>
                                    </a>
                </div>
              </div>
              <div class="col col-md-3 col-sm-3 col-xs-12">
                <div class="img_hoilder">
                  <a href="javascript:void(0)">
                    <img class="img-responsive" src="img/t2.jpg" alt="Article">
                  </a>
                </div>
                <div class="text_holder">
                  <h3><a class="color02 color01-hover03" href="javascript:void(0)">Nikhil Nayak</a></h3> <span class="color04">15103074</span>
                  <a class="btn more color02 color01-hover border-color06" href="https://www.facebook.com/iNikhilNayak"><i class="fa fa-facebook">&nbsp;</i></a> <a class="btn more color02 color01-hover border-color06" href="https://twitter.com/iNikhilNayak"><i class="fa fa-twitter">&nbsp;</i></a>
                  <a class="btn more color02 color01-hover border-color06" href="https://plus.google.com/115527847078525799030"><i class="fa fa-google-plus">&nbsp;</i>
                                    </a>
                </div>
              </div>
              <div class="col col-md-3 col-sm-3 col-xs-12">
                <div class="img_hoilder">
                  <a href="javascript:void(0)">
                    <img class="img-responsive" src="img/t3.jpg" alt="Article">
                  </a>
                </div>
                <div class="text_holder">
                  <h3><a class="color02 color01-hover03" href="javascript:void(0)">Rahul Agrawal</a></h3> <span class="color04">15803035</span>
                  <a class="btn more color02 color01-hover border-color06" href="https://www.facebook.com/rsteven2087"><i class="fa fa-facebook">&nbsp;</i></a> <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-twitter">&nbsp;</i></a>
                  <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-google-plus">&nbsp;</i>
                                    </a>
                </div>
              </div>
              <div class="col col-md-3 col-sm-3 col-xs-12">
                <div class="img_hoilder">
                  <a href="javascript:void(0)">
                    <img class="img-responsive" src="img/t4.jpg" alt="Article">
                  </a>
                </div>
                <div class="text_holder">
                  <h3><a class="color02 color01-hover03" href="javascript:void(0)">Sukrit Mehta</a></h3> <span class="color04">15103083</span>
                  <a class="btn more color02 color01-hover border-color06" href="https://www.facebook.com/sukrit.mehta.5"><i class="fa fa-facebook">&nbsp;</i></a> <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-twitter">&nbsp;</i></a>
                  <a class="btn more color02 color01-hover border-color06" href="#"><i class="fa fa-google-plus">&nbsp;</i>
                                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer" class="footer block background01 animatedParent animateOnce">
      <div class="container">
        <div class="row">
          <div class="footerinner animated fadeIn slow">
            <div class="logo_bottom">
              <a href="#">
                <img class="img-responsive" src="images/logo.png" alt="">
              </a>
            </div> <span class="color02 col-xs-12 col-sm-6 col-md-6">Design and Developed by <a href="https://nasa.com" target="_blank" >NASA</a></span>
            <div class="social-icon">
              <ul>
                <li><a class="color02" href="#"><i class="fa fa-facebook">&nbsp;</i></a>
                </li>
                <li><a class="color02" href="#"><i class="fa fa-linkedin">&nbsp;</i></a>
                </li>
                <li><a class="color02" href="#"><i class="fa fa-twitter">&nbsp;</i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <a style="display: block;" href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>

  </div>
  <script type="text/javascript" src="js/jquery-min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/responsive-slider.js"></script>
  <script src="js/countUp.js"></script>
  <script src="js/touch-slide.js"></script>
  <script src="js/jquery.nav.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/jquery.custom-scrollbar.js"></script>
  <script src="js/royalslider-min.js"></script>
  <script src="js/custom.js"></script>
  <script type="text/javascript">
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement('style')
      msViewportStyle.appendChild(
        document.createTextNode(
          '@-ms-viewport{width:auto!important}'
        )
      )
      document.querySelector('head').appendChild(msViewportStyle)
    }
  </script>
</body>
