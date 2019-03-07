
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">

<!-- img resposive
<meta name="viewport" content="width=device-width, initial-scale=1">-->

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

<!-- img responsive  -->


    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon/1.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon/1.png" type="image/x-icon"/>

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js" ></script>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/themify.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/color1.css" media="screen" id="color">

    <!-- iinks for data table -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js" ></script>

    <!--  End iinks for data table -->

    <style>
    .card {
    display: inline-block;
    position: relative;
    width: 100%;
    margin: 25px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.23);
    border-radius: 4px;
    color: rgba(0, 0, 0, 0.87);
    background: #fff;
    /* border: solid 3px #fff; */
}

.card [data-background-color] {
    color: #FFFFFF;
    direction: inherit;
    display: -webkit-box;
}
.card-stats .card-header {
    float: left;
    text-align: center;
    margin-left: 29%;
    border-radius: 100%;
    border: solid 3px #fff;
}
.card [data-background-color] {
    color: #FFFFFF;
    direction: inherit;
    display: none;
}
.card [data-background-color="orange"] {
    background: linear-gradient(60deg, #f5b78c, #ff7f27);
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
}
.card [data-background-color] {
    box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    margin: -38px 8px 0;
    border-radius: 3px;
    padding: 6px;
    background-color: #999999;
    position: relative;
}
.card .card-header {
    padding: 15px 20px 0;
    z-index: 3;
}
.card-stats .card-content {
    text-align: center;
    padding-top: w;
    width: 100%;
    float: left;
}
.card .card-content {
    padding: 15px 22px;
    position: relative;
}
.card .card-content .category {
    margin-bottom: 0;
}
.card .category:not([class*="text-"]) {
    color: #ff7f27;
    font-size: 16px;
    font-weight: 600;
}
.card-stats .card-title {
    margin: 0;
    text-align: center;
    font-family: 'Cabin', sans-serif;
}





.catalog-grid .tile {
    width: 100%;
    max-width: 356px;
    position: relative;
    border: 1px solid #b2b2b2;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    margin: 16px auto 24px auto;
    text-align: left;
}
.catalog-grid .tile .price-label {
    background: #c7b07b;
}
.catalog-grid .tile .price-label {
    position: absolute;
    padding: 11px 10px 11px 12px;
    height: 47px;
    background: #ff9016;
    top: 0;
    right: 0;
    z-index: 12;
    font-size: 1.125em;
    color: #fff;
    font-weight: 900;
}
.catalog-grid .tile a .tile-overlay {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    min-height: 100%;
    z-index: 10;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}
.catalog-grid .tile .footer {
    border-top: 1px solid #b2b2b2;
    padding: 24px 12px 12px 12px;
    background: #fff;
    position: relative;
    text-align: center;
    -webkit-border-radius: 0 0 0px 0px;
    -moz-border-radius: 0 0 0px 0px;
    border-radius: 0 0 0px 0px;
}
.catalog-grid .tile img {
    display: block;
    margin: auto;
    -webkit-border-radius: 0px 0px 0 0;
    -moz-border-radius: 0px 0px 0 0;
    border-radius: 0px 0px 0 0;
}
img {
    display: block;
    max-width: 100%;
    height: auto;
        vertical-align: middle;
}
.quantity{
    display: inline-block;
    width: 36px;
    height: 38px;
    margin: 0 2px;
    padding-left: 3px;
    padding-right: 3px;
    text-align: center;
}
.thumb{
        width: 6%;
    padding: 8px 0 12px 0;
    vertical-align: middle;
    font-size: 1.125em;
    font-weight: 300;
    position: relative;
}
.delete{
        vertical-align: middle;
       padding: 8px 0 12px 0;
    vertical-align: middle;
    font-size: 1.125em;
    font-weight: 300;
    position: relative;
}
.icon-delete{
    color: #607d8b;
    display: inline-block;
    font-size: 1.5em;
    color: #ff9016;
    cursor: pointer;
    -webkit-transition: color 0.3s;
    -moz-transition: color 0.3s;
    transition: color 0.3s;
}
.incr-btn{
    display: inline-block;
    width: 20px;
    height: 38px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    background: #292c2e !important;
    color: #fff;
    text-align: center;
    font-size: 1.3em;
    font-weight: normal;
    line-height: 34px;
    -webkit-transition: background 0.3s;
    -moz-transition: background 0.3s;
    transition: background 0.3s;
}
th{
     width: 18%;
}
.thumb img {
  width: 45%;
}
.Update{
  cursor: pointer;
}

.col-xs-12 {
    width: 100%;
}

.card {
    display: inline-block;
    position: relative;
    width: 100%;
    margin: 10px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.23);
    border-radius: 4px;
    color: rgba(0, 0, 0, 0.87);
    background: #fff;
    /* border: solid 3px #fff; */
}
html * {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.card-content {
    padding-top: 3px!important;
}
div {
    display: block;
}
.leftdownline {
    width: 50%;
    padding: 5px 10px;
    background-color: #3c6595;
    margin-top: -13px;
    color: #fff;
    font-weight: 400;
    font-size: 18px;
    text-align: center;
    border-radius: 15px;
}


 </style>

</head>