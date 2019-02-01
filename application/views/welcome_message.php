<!DOCTYPE html>
<html>
<head>
	<title>Location Picker</title>
	<meta charset="utf-8">

	<!--Boostrap Librey -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!--END Boostrap Librey -->

	  <!-- Map-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=&libraries=places'></script>
	<script src="<?php echo base_url()?>include/js/locationpicker.jquery.js"></script>
</head>
<body>
<div class="container">
  
  <center><a href="<?php echo base_url('index.php/Welcome/GetLastlocation')?>" class="btn btn-primary" target="_blank">Get the Last Location </a></center>
  <br>

  <center><b>First You Create The Google Map API Key !!!!!</b></center>
  <br>

  <?php if(!empty($this->session->flashdata('msg'))){?>
  <div class="alert alert-success">
  <?php echo $this->session->flashdata('msg'); ?>
  </div>
<?php } ?>
  <form class="form-horizontal" action="<?php echo base_url('index.php/welcome/do_location');?>" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Location OR Address : </label>
      <div class="col-sm-10">
        <textarea class="form-control" id="us2-address" name="activityaddress"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Map : </label>
      <div class="col-sm-10">
        <div id="us2" style="width: 600px; height: 300px;"></div>
      </div>
    </div>
    
    <div class="row">
     <div class="col-sm-6"><div class="form-group">
	      <label class="control-label col-sm-4" for="pwd">Latitude:</label>
	      <div class="col-sm-8">          
	        <input type="text" class="form-control" id="us2-lat" placeholder="Latitude" name="latitude" readonly="" />
	      </div>
	    </div>
	 </div>

	 <input type="hidden" class="form-control" id="us2-radius" value="500"/>
    	
     <div class="col-sm-6">
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Longitude:</label>
			<div class="col-sm-8">          
			<input type="text" class="form-control" id="us2-lon" placeholder="Longitude" name="longitude" readonly="" />
			</div>
			</div>
	  </div>
	</div> 


	<div class="row">
     <div class="col-sm-6"><div class="form-group">
	      <label class="control-label col-sm-4" for="pwd">Street:</label>
	      <div class="col-sm-8">          
	        <input class="form-control" id="us2-street1" placeholder="Street" name="street" readonly="" value="<?php echo $location['street'];?>"/>
	      </div>
	    </div>
	 </div>
    	
     <div class="col-sm-6">
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">City:</label>
			<div class="col-sm-8">          
			<input class="form-control" id="us2-city" placeholder="City" name="city" readonly="" value="<?php echo $location['city'];?>"/>
			</div>
			</div>
	  </div>
	</div>

	<div class="row">
     <div class="col-sm-6"><div class="form-group">
	      <label class="control-label col-sm-4" for="pwd">State:</label>
	      <div class="col-sm-8">          
	       <input class="form-control" id="us2-state" placeholder="State" name="state" readonly="" value="<?php echo $location['state'];?>"/>
	      </div>
	    </div>
	 </div>
    	
     <div class="col-sm-6">
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Country:</label>
			<div class="col-sm-8">          
			<input class="form-control" id="us2-country" placeholder="Country" name="country" readonly="" value="<?php echo $location['country'];?>" />
			</div>
			</div>
	  </div>
	</div>

	<div class="row">
     <div class="col-sm-3"><div class="form-group">
	      <label class="control-label col-sm-4" for="pwd"></label>
	      <div class="col-sm-8">          
	      
	      </div>
	    </div>
	 </div>
    	
     <div class="col-sm-6">
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Zip Code:</label>
			<div class="col-sm-8">          
			<input class="form-control" id="us2-zip" placeholder="Zipcode" name="zipcode" readonly="" value="<?php echo $location['zipcode'];?>" />
			</div>
			</div>
	  </div>
	</div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" type="submit" class="btn btn-info" value="submit" />
      </div>
    </div>
  </form>
</div>


   <script type="text/javascript">
   	(function(){
   		$('#us2').locationpicker({
                            location: {
                            latitude:<?php echo $location['latitude'];?>,
                            longitude:<?php echo $location['longitude'];?>
                        },
                        radius:700,
                        inputBinding: {
                            latitudeInput: $('#us2-lat'),
                            longitudeInput: $('#us2-lon'),
                            radiusInput: $('#us2-radius'),
                            locationNameInput: $('#us2-address')
                        },
                        onchanged: function (currentLocation, radius, isMarkerDropped) {
                                var addressComponents = $(this).locationpicker('map').location.addressComponents;
                                $('#us2-street1').val(addressComponents.addressLine1);
                                $('#us2-city').val(addressComponents.city);
                                $('#us2-state').val(addressComponents.stateOrProvince);
                                $('#us2-zip').val(addressComponents.postalCode);
                                $('#us2-country').val(addressComponents.country);
                                    //updateControls(addressComponents);
                            },
                        enableAutocomplete: true
                    });
})();
   </script>

</body>
</html>