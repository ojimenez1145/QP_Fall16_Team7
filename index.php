<!DOCTYPE html>
<html  lang="en-US">

<head>
  
  <!--js css *-->

  <title>
    Hazard Level of Environment
  </title>
  
  <style>
    body{
      font-family: arial,verdana,sans-serif,Georgia, "Times New Roman", Times, serif;
      color: black;
      text-align:left;
      background:#fa8072
    }
    h1{
      font-size: 2.5em;
      font-weight: bold;
    }
    
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
            
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: blue;
    }
            
  </style>
  
</head>

<body>
  <?php
    include "GLOBAL.php";
    include "GPIO.php";
  ?>
  
  <hr>
  
  <div class="sunrise_time">
    <?php
      date_default_timezone_set('America/Los_Angeles');
      echo "Today (" . date("m/d/y",time()) . ") sunrise for San Diego is at " .
        date_sunrise(time(), SUNFUNCS_RET_STRING, 32, -117, 90, -7);
        
      $db = connectMongo();
      $collection1 = $db->temp;
      $collection2 = $db->hum;
      $num_entries = $collection1->count();
      
      $cursorT = $collection1->find(array('num'=>$num_entries));
      $docT = $cursor->getNext();
      
      $cursorH = $collection2->find(array('num'=>$num_entries));
      $docH = $cursorH->getNext();
      
    ?>
    
    <!--create variables and get value above/ Display them below *-->
    
    <br><br>
    
    <table layout="fixed" width="100%">
      <tr>
        <td>Temperature is
          <?php
            echo number_format($docT['val'],1);
          ?>
        F</td>
        
        <td>Humidity is
          <?php
            echo number_format($docH['val'],1;
          ?>
        %</td>
      </tr>
    </table>
  </div>
  
  <hr>
  
  <?php
    $r = new GPIO(22, "out");
    $b = new GPIO(5, "out");
    
    $db = connectMongo();
    $cPref = $db->pref;
    
    //get temp value
    $curTemp = $db->temp;
    $num_entires = $curTemp->count();
    $cursor = $curTemp->find(array('num'=>$num_entries));
    $temperature = $cursor->getNext();
    
    if($temperature['val'] > 80){
      $r->write(1);
      $b->write(0);
    }
    else{
      $r->write(0);
      $b->write(1);
    }
    
  ?>
</body>

</html>

  
  
  
  
