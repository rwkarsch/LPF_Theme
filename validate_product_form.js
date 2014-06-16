// JavaScript Document
function validateProductForm()
{
// Name on Card (Personalized)
var x=document.forms["product_form"]["personalized_name"].value
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }

// DATE OF EVENT
var x=document.forms["product_form"]["lpf_month"].value
var y=document.forms["product_form"]["lpf_day"].value
var z=document.forms["product_form"]["lpf_year"].value
if (x==null || x==""|| y==null || y=="" || z==null || z=="")
  {
  alert("The date of your event is not completely filled out");
  return false;
  }
   
// return address
var x=document.forms["product_form"]["card_ret_addr"].value
if (x==null || x=="")
  {
  alert("Your return address must be filled out");
  return false;
  }
  
// Billing Name
var x=document.forms["product_form"]["billing_name"].value
if (x==null || x=="")
  {
  alert("Billing name must be filled out");
  return false;
  }

// Email Address    
var x=document.forms["product_form"]["lpf_email"].value
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

// Phone number  
var x=document.forms["product_form"]["lpf_area_code"].value
var y=document.forms["product_form"]["lpf_phone_num2"].value
var z=document.forms["product_form"]["lpf_phone_num3"].value
if (x==null || x==""|| y==null || y=="" || z==null || z=="")
  {
  alert("Phone number is not completely filled out");
  return false;
  }
   

}

