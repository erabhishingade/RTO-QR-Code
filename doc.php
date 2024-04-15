<?php require_once("lockc.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
<title> | Inbox :: TIAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Katareinfo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

</head>
<body>
<div id="wrapper">
       <!----->
       <?php require_once("header.php");  ?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		    <!-- <div class="banner">
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Inbox</span>
				</h2>
		    </div>-->
		<!--//banner-->
 	<!--grid-->
<!-- tab content -->
<div class="col-md-8 tab-content tab-content-in" style="padding: 15px;">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
                <table class="table">
                    <tbody>
                        <tr class="table-row">
                            <td class="table-img">
                              <!-- <img src="images/in.jpg" alt="" />-->
                            </td>
                            <td class="table-text">
                            	<h6>Adhar</h6>
                                <!-- <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>-->
                            </td>
                            <td>
								
								<a class="fam" target="blank" href="uploads/<?php echo $adhar;?>">View</a>
                            	<!--<span class="fam">View</span>-->
                            </td>
                            <td class="march">
                             <!--  in 5 days--> 
                            </td>
                          
                             <td >
								<a href="editadhar.php"><i class="fa fa-pencil icon-pencil"></i></a>
                                
                            </td>
                        </tr>
                       <tr class="table-row">
                            <td class="table-img">
                              <!-- <img src="images/in1.jpg" alt="" />-->
                            </td>
                            <td class="table-text">
                            	<h6> Lisence</h6>
                                <!-- <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>-->
                            </td>
                            <td>
                            	<a class="fam" target="blank" href="uploads/<?php echo $lisence;?>">View</a>
                            </td>
                            <td class="march">
                             <!--   in 5 days--> 
                            </td>
                          
                             <td >
                               <a href="editlisence.php"><i class="fa fa-pencil icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                              <!-- <img src="images/in2.jpg" alt="" />-->
                            </td>
                            <td class="table-text">
                            	<h6> RC</h6>
                                <!-- <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>-->
                            </td>
                            <td>
                            	<a class="fam" target="blank" href="uploads/<?php echo $rc;?>">View</a>
                            </td>
                            <td class="march">
                                <!--in 5 days--> 
                            </td>
                          
                             <td >
                               <a href="editrc.php"><i class="fa fa-pencil icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <!--<img src="images/in3.jpg" alt="" />-->
                            </td>
                            <td class="table-text">
                            	<h6> PUC</h6>
								<!-- <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>-->
                            </td>
                            <td>
                            	<a class="fam" target="blank" href="uploads/<?php echo $puc;?>">View</a>
                            </td>
                            <td class="march">
                              <!--n 4 days--> 
                            </td>
                          
                             <td >
                                <a href="editpuc.php"><i class="fa fa-pencil icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <!--<img src="images/in4.jpg" alt="" />-->
                            </td>
                            <td class="table-text">
                            	<h6> Insurance</h6>
                               <!-- <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>-->
                            </td>
                            <td>
                            	<a class="fam" target="blank" href="uploads/<?php echo $insurance;?>">View</a>
                            </td>
                            <td class="march">
                             <!--   in 4 days--> 
                            </td>
                          
                             <td >
                               <a href="editinsu.php"><i class="fa fa-pencil icon-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
               </div>
            </div>
</div>

<div class="copy">
            <p> &copy; 2016 Katareinfo. All Rights Reserved | Design by <a href="http://Katareinfo.com/" target="_blank">Katareinfo</a> </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

