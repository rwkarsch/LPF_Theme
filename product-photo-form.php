<form id="product_form" name="product_form" method="post" onsubmit="return validateProductForm();" action="<?php bloginfo('stylesheet_directory'); ?>/productmail.php">
                		
 <table width="100%" border="0">
	<tr>  
    	<td class = "lpf_table" width="30%">Quantity:</td>
    	<td class = "lpf_right_side" width="60%">
      		<select name = "quantity_cards">
  			
  				<option>50</option>
  				<option>75</option>
				<option>100</option>
            	<option>125</option>
				<option>150</option>
				<option>more</option>
			</select>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><br />Enter Personalized Text Below</td></tr> 
    <tr>
    	<td class = "lpf_table">Names:</td>
    	<td class = "lpf_right_side">
      		<input type="text" name="personalized_name" id="personalized_name" size="35" maxlength="100"/>
		</td>
    </tr>
  		
  	<tr>
    	<td class = "lpf_table" >Event Date:</td>
    	<td class = "lpf_right_side">
      		<input type="text" name="lpf_month"  id="lpf_month" size="2" maxlength="2" /> 
      		/
      		<input type="text" name="lpf_day"  id="lpf_day" size="2" maxlength="2" /> 
      		/ 
      		<input type="text" name="lpf_year" id="lpf_year" size="3" maxlength="4" />
		</td>
    </tr>
    <tr>
		<td class = "lpf_table" >Return Address: </td>
 		<td class = "lpf_right_side"><textarea name="card_ret_addr" rows="2" cols="35"></textarea></td>
 	</tr>
    
    <tr>
    <td colspan="2" align="center" ><label for='uploaded_file'>Upload Photo:</label><input type="file" name="uploaded_file"><td>
    
<input type="file" name="uploaded_file">
 
 	<tr>
    	<td colspan="2" align="center"><br />Order Details</td>
	</tr> 
    
  	<tr>
    	<td class = "lpf_table">Name:</td>
    	<td class = "lpf_right_side">
    	  	<input type="text" name="billing_name" id="billing_name" size="35" maxlength="100"/></td>
    </tr>
    
    <tr>
    	<td class = "lpf_table" >Phone:</td>
    	<td class = "lpf_right_side">
      		<input name="lpf_area_code" type="text" id="lpf_area_code" size="2" maxlength="3" />
      		-
	    	<input name="lpf_phone_num2" type="text" id="lpf_phone_num2" size="2" maxlength="3" /> 
    	  	-
	       <input name="lpf_phone_num3" type="text" id="lpf_phone_num3" size="3" maxlength="4" /></td>
    </tr>      
  	<tr>
    	<td class = "lpf_table" >Email:</td>
    	<td class = "lpf_right_side">
      		<input type="text" name="lpf_email" id="lpf_email" size="35"/></td>
    </tr>
  
 	<tr>
		<td class = "lpf_table" >Shipping Address: </td>
 		<td class = "lpf_right_side"><textarea name="shipping_address" rows="2" cols="35"></textarea>
        <input type="hidden" name="invite_type" value="<?php echo $invitetyp;?>" />
        </td>
        
 	</tr>
 
 	 
</table>
			
<p align="center">    <em>You're almost done!</em><br />
Now, all you need to do is click submit, and we'll call you for payment, and send over your digital proof for approval!
<input type="submit" name="submit" value="Submit My Order" align="center"></p>
</form> 
 