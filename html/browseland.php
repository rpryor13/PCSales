<!doctype html>
<html lang="en">
<?php
session_start();

$servername = "database-1.ce7u2riqktl4.us-east-2.rds.amazonaws.com";
$username = "rpryor13";
$password = "Polopolo#3";
$dbname = "default";

$strCountSelect = "SELECT COUNT(hardwareid) FROM hardware";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$result = $conn->query($strCountSelect);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $intCount = $row["COUNT(hardwareid)"];
    }}
?>
<?php

$chkALL = $_GET['chkALL'];
$chkCPU = $_GET['chkCPU'];
$chkGPU = $_GET['chkGPU'];
$chkPSU = $_GET['chkPSU'];
$chkMOBO = $_GET['chkMOBO'];
$chkHDD = $_GET['chkHDD'];
$chkRAM = $_GET['chkRAM'];
$chkSSD = $_GET['chkSSD'];
$chkNVME = $_GET['chkNVME'];
$chkMonitor = $_GET['chkMonitor'];
$chkSpeaker = $_GET['chkSpeaker'];
$chkCooling = $_GET['chkCooling'];
$chkFurniture = $_GET['chkFurniture'];
$chkMouse = $_GET['chkMouse'];
$chkKeyboard = $_GET['chkKeyboard'];
$chkCables = $_GET['chkCables'];
$chkLaptop = $_GET['chkLaptop'];
$chkHeadphones = $_GET['chkHeadphones'];
$chkNetworking = $_GET['chkNetworking'];
$chkStorage = $_GET['chkStorage'];
$chkCase = $_GET['chkCase'];
$chkBundle = $_GET['chkBundle'];
$chkWebcam = $_GET['chkWebcam'];
$chkMic = $_GET['chkMic'];
$chkConsole = $_GET['chkConsole'];
$chkChair = $_GET['chkChair'];
$chkControllers = $_GET['chkControllers'];
$chkOther = $_GET['chkOther'];


$strSelect = "SELECT * FROM hardware WHERE category = 'o' ";

if ($chkCPU == 1) {
    $strSelect .= "OR category = 'CPU' ";
}
if ($chkGPU == 1) {
    $strSelect .= "OR category = 'GPU' ";
}
if ($chkPSU == 1) {
    $strSelect .= "OR category = 'PSU' "; 
}
if ($chkMOBO == 1) {
    $strSelect .= "OR category = 'MOBO' ";
}
if ($chkHDD == 1) {
    $strSelect .= "OR category = 'HDD' ";
}
if ($chkRAM == 1) {
    $strSelect .= "OR category = 'RAM' ";
}
if ($chkSSD == 1) {
    $strSelect .= "OR category = 'SSD' ";
}
if ($chkNVME == 1) {
    $strSelect .= "OR category = 'NVMe' ";
}
if ($chkMonitor == 1) {
    $strSelect .= "OR category = 'MONITOR' ";
}
if ($chkSpeaker == 1) {
    $strSelect .= "OR category = 'SPEAKER' ";
}
if ($chkCooling == 1) {
    $strSelect .= "OR category = 'COOLER' ";
}
if ($chkFurniture == 1) {
    $strSelect .= "OR category = 'FURNITURE' ";
}
if ($chkMouse == 1) {
    $strSelect .= "OR category = 'MOUSE' ";
}
if ($chkKeyboard == 1) {
    $strSelect .= "OR category = 'KEYBOARD' ";
}
if ($chkCables == 1) {
    $strSelect .= "OR category = 'CABLES' ";
}
if ($chkLaptop == 1) {
    $strSelect .= "OR category = 'LAPTOP' ";
}
if ($chkHeadphones == 1) {
    $strSelect .= "OR category = 'HEADPHONES' ";
}
if ($chkNetworking == 1) {
    $strSelect .= "OR category = 'NETWORK' ";
}
if ($chkStorage == 1) {
    $strSelect .= "OR category = 'STORAGE' ";
}
if ($chkCase == 1) {
    $strSelect .= "OR category = 'CASE' ";
}
if ($chkBundle == 1) {
    $strSelect .= "OR category = 'BUNDLE' ";
}
if ($chkWebcam == 1) {
    $strSelect .= "OR category = 'WEBCAM' ";
}
if ($chkMic == 1) {
    $strSelect .= "OR category = 'MIC' ";
}
if ($chkConsole == 1) {
    $strSelect .= "OR category = 'CONSOLE' ";
}
if ($chkChair == 1) {
    $strSelect .= "OR category = 'CHAIR' ";
}
if ($chkControllers == 1) {
    $strSelect .= "OR category = 'CONTROLLER' ";
}
if ($chkOther == 1) {
    $strSelect .= "OR category = 'OTHER' ";
}
if ($chkAll == 1){
    $strSelect = "SELECT * FROM hardware";
}
$strSelect .= " ORDER BY hardwareid DESC ";

$strCount = str_replace('*','COUNT(hardwareid)',$strSelect);

?>

<?php

$result = $conn->query($strCount);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $intCount = $row["COUNT(hardwareid)"];
    }}  
    
$intCount = 50 * ceil($intCount/50);
$intPages = $intCount/50;
    ?>

<?php 

$arrPages = array();
$arrLower = array(0);
$arrUpper = array(50);
$arrID = array();
$arrCat = array();
$arrTitle = array();
$arrRedLink = array();
$arrItemLink= array();
$arrPrice = array();
$arrDTM = array();



for ($x = 1; $x <= $intPages; $x++) {
    array_push($arrPages, $x);
    if (( isset( $arrLower[$x - 1] ) )){

    }
    else {
        array_push($arrLower, (($x-1)*50) + 1);
    }
    if (( isset( $arrUpper[$x - 1] ) )){

    }
    else {
        array_push($arrUpper, (($x-1)*50 + 50));
    }
  }

  $strSelectLimit = $strSelect."LIMIT 0, 50";


  $result = $conn->query($strSelectLimit);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          array_push($arrID, $row["hardwareid"]);
          array_push($arrCat, $row["category"]);
          array_push($arrTitle, $row["title"]);
          array_push($arrRedLink, $row["redditlink"]);
          array_push($arrItemLink, $row["itemlink"]);
          array_push($arrPrice, $row["price"]);
          array_push($arrDTM, $row["hardwareDTM"]);
      }} 
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Browse great deals on PC parts!</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/fresh-bootstrap-table"/>

  <!--  Social tags    -->
  <meta name="keywords" content="creative tim, html table, html css table, web table, freebie, free bootstrap table, bootstrap, css3 table, bootstrap table, fresh bootstrap table, frontend, modern table, responsive bootstrap table, responsive bootstrap table">

  <meta name="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Fresh Bootstrap Table by Creative Tim">
  <meta itemprop="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

  <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg">
  <!-- Twitter Card data -->

  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Fresh Bootstrap Table by Creative Tim">

  <meta name="twitter:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg">
  <meta name="twitter:data1" content="Fresh Bootstrap Table by Creative Tim">
  <meta name="twitter:label1" content="Product Type">
  <meta name="twitter:data2" content="Free">
  <meta name="twitter:label2" content="Price">

  <!-- Open Graph data -->
  <meta property="og:title" content="Fresh Bootstrap Table by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://wenzhixin.github.io/fresh-bootstrap-table/full-screen-table.html" />
  <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg"/>
  <meta property="og:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need." />
  <meta property="og:site_name" content="Creative Tim" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />

  <!--   Fonts and icons   -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.js"></script>

  <!--  Just for demo purpose, do not include in your project   -->
  <script src="assets/js/demo/gsdk-switch.js"></script>
  <script src="assets/js/demo/jquery.sharrre.js"></script>
  <script src="assets/js/demo/demo.js"></script>

  <link rel="shortcut icon" href="images/LOGOSMALL.ico" />

</head>
<body>

<div class="wrapper">
   <!--   Creative Tim Branding   -->
  <a href="http://pcsales.io/index.html">
    <div class="logo-container full-screen-table-demo">
    <img src="images/logo-dark.png">
    </div>
  </a>

  <div class="fresh-table full-color-azure full-screen-table">
  <!--
    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
  -->
    <table id="fresh-table" class="table">
      <thead>
        <th data-field="id">Category</th>
        <th data-field="name" data-sortable="true">Product Name</th>
        <th data-field="salary" data-sortable="true">Price</th>
        <th data-field="actions" data-sortable="true">Date/Time</th>
        <th data-field="city">Discussion Link</th>
      </thead>
      <tbody>
            <?php 

for ($x = $arrLower[0]; $x <= ($arrUpper[0]-1); $x++) {
    echo "<tr> <td> ";
    echo $arrCat[$x];
    echo " </td> <td> ";
    echo "<a style='color:white' href='";
    echo $arrItemLink[$x];
    echo "' target='_blank'><u>";
    echo $arrTitle[$x];
    echo "'</u></a> ";
    echo " </td> <td> ";
    echo $arrPrice[$x];
    echo " </td> <td> ";
    $new_date = date("m-d-Y",strtotime($arrDTM[$x]));
    $regular_time_str = date( 'g:i A', strtotime( $arrDTM[$x] ) );
    echo $new_date;
    echo "\n  @  ";
    echo $regular_time_str;
    echo " </td> <td> ";
    echo "<a style='color:white' href='";
    echo $arrRedLink[$x];
    echo "'target='_blank'>REDDIT POST</a>";
    echo " </td> ";

    


    //echo $arrDTM[$x];
    echo "</tr>";
 
}

?> 

            </tbody>
    </table>
  </div>




<script>
  var $table = $('#fresh-table')




  $(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',

      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      height: $(window).height(),
      pageSize: 25,
      pageList: [25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })


    $(window).resize(function () {
      $table.bootstrapTable('resetView', {
        height: $(window).height()
      })
    })
  })

  
</script>


</body>

</html>
