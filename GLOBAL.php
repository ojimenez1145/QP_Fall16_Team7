<?php
  date_default_timezone.set('America/Los_Angeles');
  
  include "../navbar.html";
?>

/*Image to be used as header for website*/
  <div class="header">
    <br><br>
    <img src="Danger_Banner.jpg" alt="banner" />
    
<?php
  include "navabar.html";
    echo "</dib>";
    
    function connectMongo(){
      $connection = new MoncoClient("mongodb://mongodb://admin:admin@ds019746.mlab.com:19746/qpfallteam7");
      $database = $connection->qpfallteam7;
      return $database;
    } 
?>
