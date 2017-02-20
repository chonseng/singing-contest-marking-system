<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>歌唱比賽評分</title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no" />
	<link rel="apple-touch-icon-precomposed"
	      sizes="144x144"
	      href="<?php $this->Path->myroot(); ?>img/ios_icon.png">
	<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/foundation.css" />
  <link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/web.css" />
	<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/materialize.css" />
    <script src="<?php $this->Path->myroot(); ?>js/modernizr.js"></script>
    
    
</head>
<body>

	<script src="<?php $this->Path->myroot(); ?>js/jquery.js"></script>
  <script src="<?php $this->Path->myroot(); ?>js/foundation.min.js"></script>
      <?php echo $this->fetch('content'); ?>
  
  <script src="<?php $this->Path->myroot(); ?>js/materialize.js"></script>
    <script src="<?php $this->Path->myroot(); ?>js/web.js"></script>
    <script>
      $(document).foundation();
      if (localStorage["radio"] == undefined || localStorage["radio"]=="") {

      }
      else {
      	var radio = localStorage["radio"];
      	$("#radio"+radio).prop("checked",true);
      }

      $("#radio0").click(function(){
      	localStorage["radio"] = 0;
      })

      $("#radio1").click(function(){
      	localStorage["radio"] = 1;
      })

    </script>
</body>
</html>
