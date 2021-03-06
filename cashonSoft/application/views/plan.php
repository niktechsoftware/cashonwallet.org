<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
	<title></title>
	<style type="text/css">

<style>

.pricingdiv{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  font-family: 'Source Sans Pro', Arial, sans-serif;
}

.pricingdiv ul.theplan{
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  border-top-left-radius: 50px;
  border-bottom-right-radius: 50px;
  color: white;
  background: #7c3ac9;
  position: relative;
  width: 250px; /* width of each table */
  margin-right: 10px; /* spacing between tables */
  margin-bottom: 1em;
  transition: all .5s;
}

.pricingdiv ul.theplan:hover{ /* when mouse hover over pricing table */
  transform: scale(1.05);
  transition: all .5s;
  z-index: 100;
  box-shadow: 0 0 10px gray;
}

.pricingdiv ul.theplan li{
  margin: 10px 20px;
  position: relative;
}

.pricingdiv ul.theplan li.title{
  font-size: 150%;
  font-weight: bold;
  text-align: center;
  margin-top: 20px;
  text-transform: uppercase;
  border-bottom: 5px solid white;
}

.pricingdiv ul.theplan:nth-of-type(2){
  background: #e53499;
}
    
.pricingdiv ul.theplan:nth-of-type(3){
  background: #2a2cc8;
}

.pricingdiv ul.theplan:last-of-type{ /* remove right margin in very last table */
  margin-right: 0;
}

/*very last LI within each pricing UL */
.pricingdiv ul.theplan li:last-of-type{
  text-align: center;
  margin-top: auto; /*align last LI (price botton li) to the very bottom of UL */
}  

.pricingdiv a.pricebutton{
  background: white;
  text-decoration: none;
  padding: 10px;
  display: inline-block;
  margin: 10px auto;
  border-radius: 5px;
  color: navy;
  text-transform: uppercase;
}

@media only screen and (max-width: 500px) {
  .pricingdiv ul.theplan{
    border-radius: 0;
    width: 100%;
    margin-right: 0;
  }
  
  .pricingdiv ul.theplan:hover{
    transform: none;
    box-shadow: none;
  }
  
  .pricingdiv a.pricebutton{
    display: block;
  }
}

</style>
</style>
</head>
<body>
<div class="pricingdiv">
	<ul class="theplan">
		<li class="title"><b>Plan 1</b></li>
		<li><b>Dimensions:</b> 24.8W x 47.3H</li>
		<li><b>Material:</b> Nylon w/ Breathable Glass Fiber</li>
		<li><b>Weight:</b> 55 lbs</li>
		<li><b>Max Weight:</b> 330 lbs</li>
		<li><b>Tilt Degrees:</b> 135</li>
		<li><b>Tilt Degrees:</b> 135</li>
		<li><b>Head Rest:</b> Yes</li>
		<li><a class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
	</ul>
	<ul class="theplan">
		<li class="title"><span class="icon-trophy" style="color:yellow"></span> <b>Plan 2</b></li>
		<li><b>Dimensions:</b> 24.8W x 47.3H</li>
		<li><b>Material:</b> Nylon w/ Breathable Glass Fiber</li>
		<li><b>Weight:</b> 55 lbs</li>
		<li><b>Max Weight:</b> 330 lbs</li>
		<li><b>Head Rest:</b> Yes</li>
		<li><b>Arm Rest:</b> <span class="icon-check"></span></li>
		<li><b>Lumbar Support:</b> <span class="icon-check"></span></li>
		<li><b>Warranty:</b> 30 Days Money Back</li>
		<li><a class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
		</ul>
	<ul class="theplan">
		<li class="title"><b>Plan 3</b></li>
		<li class="ethighlight"><b>Dimensions:</b> 24.8W x 47.3H</li>
		<li><b>Material:</b> Nylon w/ Breathable Glass Fiber</li>
		<li><b>Weight:</b> 55 lbs</li>
		<li><b>Max Weight:</b> 330 lbs</li>
		<li><b>Head Rest:</b> Yes</li>
		<li><b>Arm Rest:</b> <span class="icon-close"></span></li>
		<li><b>Lumbar Support:</b> <span class="icon-check"></span></li>
		<li><b>Warranty:</b> 30 Days Money Back</li>
		<li><a class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
	</ul>
</div>

</body>
</html>