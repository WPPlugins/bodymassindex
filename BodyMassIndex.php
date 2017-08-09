<?php
/*
Plugin Name: Body Mass Index Calculator
Plugin URI: http://www.adriangeismaier.dk/apps/plugins/BodyMassIndex
Description: Body Mass Index calculator
Author: Adrian Geismaier
Version: 0.1
Author URI: http://www.adriangeismaier.dk
*/

function BodyMassIndex() 
{
  $url=WP_PLUGIN_URL; ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $url; ?>/BodyMassIndex/style.css" />
 	<script type="text/javascript">
		function calculator(form)  
                {
			var w = form.weight.value * 1;
			var h = form.height.value * 1;
                        bmi =  w / ((h * h)/10000);
                        var new_bmi = bmi.toFixed(2);                      
                        var bmi_value = true;
                        
			if ( (w <= 35) || (w >= 500)  || (h <= 120) || (h >= 220) ) 
                        {
				document.getElementById("bmi_result").innerHTML = "Insert you weight and height !";
				bmi_value = false;
				return false;
			}

			if (bmi_value) 
                        {                        
                          document.getElementById("bmi_result").innerHTML= "Your Body Mass Index is: " + new_bmi;
                        }
			return false;
		}
	</script> 
        
	<form id="form" onsubmit="return calculator(this);" method="post">
		<fieldset class="weight_height">
			<legend>Please complete the form below:</legend>
			<div>
				<label for="weight">Mass (kg):</label> <input type="text" id="weight" name="weight">
			</div>
			<div>
				<label for="height">Height (cm):</label> <input type="text" id="height" name="height">
			</div>
            <div id="bmi_result"></div>
		</fieldset>
		<div><button type="submit" id="submit">Calculate</button></div>
	</form>
  <?
}

function widgetBodyMassIndex($args) 
{
  extract($args);
  echo $before_widget;
  echo $before_title;?>Body Mass Index Calculator<?php echo $after_title;
  BodyMassIndex();
  echo $after_widget;
}

function BodyMassIndexInit()
{
  register_sidebar_widget(__('Body Mass Index Calculator'), 'widgetBodyMassIndex'); 
}

add_action("plugins_loaded", "BodyMassIndexInit");
?>