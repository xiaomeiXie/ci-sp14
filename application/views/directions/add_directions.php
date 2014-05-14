<?php
//add_mailing_list.php
//an add form to add an item to the table
/*
userid:1
first_name:John
last_name:Doe
email:john@example.com
address:123 Any Street
state_code:WA
zip_postal:98111
username:johnd
password:abc123
bio:Hi! I'm John, and here's my Bio!
interests:golf,hiking,billiards
num_tours:1
*/
echo '<p></p>';
echo validation_errors();
?>
<h1>Add Address!</h1>
<?=form_open('directions/map');?>
<?php
	$address = array(
		'address' => 'address',
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