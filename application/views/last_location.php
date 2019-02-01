<!DOCTYPE html>
<html>
<head>
	<title>Location On Map</title>
	<meta charset="utf-8">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=XXxxXXXXXXX&libraries=places'></script>
	<script src="<?php echo base_url()?>include/js/locationpicker.jquery.js"></script>
</head>
<body>
	<br>
<center>
<div class="form-group">
      <label class="control-label col-sm-2" for="email"></label>
      <div class="col-sm-10">
        <div id="us2" style="width: 1000px; height: 600px;"></div>
      </div>
   </div>
</center>
    
 
</div>


   <script type="text/javascript">
   	(function(){
   		$('#us2').locationpicker({
					location: {
					latitude: <?php echo $location['latitude'];?>,
					longitude: <?php echo $location['longitude'];?>
					},
					radius: 700,

					});
	})();
   </script>

</body>
</html>