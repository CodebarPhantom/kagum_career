<!DOCTYPE html>
<html lang="en">

	<head>	   
	    <?php include 'includes_top.php';?>
	</head>

	<body class="stretched">
        <div id="wrapper" class="clearfix">
        <!-- Start Main Navbar -->
        <?php include 'main_navbar.php';?>
        <!-- END Main Navbar -->
        
        <!-- Start Page content -->
        <?php include $page_name . '.php'; ?>
        <?php include 'includes_bottom.php';?>           
        <!-- END Page content -->
        <?php include 'includes_js.php';?>   
        </div>
	</body>
</html>