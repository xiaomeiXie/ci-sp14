<?php
//directions/view_directions.php
?>
<h1>Add Address!</h1>
<?=form_open('directions/map');?>
<?php
	$address = array(
		'name' => 'address',
		'id' => 'address',
		'value' => set_value('address',''),
	);
	/*
	$js = 'onClick="some_function()"';
    echo form_input('username', 'johndoe', $js);
	*/
	$req = 'required="required"';
	 echo form_label('Address','address') . ': ';
	echo form_input($address,'',$req) . '<br />';
   

  
		 
?>
<?=form_submit('submit','Add To Address');?>
<?=form_close();?>