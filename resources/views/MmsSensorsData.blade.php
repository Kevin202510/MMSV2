<?php

class Sensors{
    public $link='';
    function __construct($servername,$username,$password,$dbname){
        $this->link = mysqli_connect($servername,$username,$password) or die('Cannot connect to the DB');
        mysqli_select_db($this->link,$dbname) or die('Cannot select the DB');
    }

    function temperatureInsert($temperature,$temperaturestat){
       $query = "insert into temperatures set temperature='".$temperature."',status='".$temperaturestat."'";
       $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
    }
   
    function humidityInsert($humidity,$humiditystat){
       $query = "insert into humidities set humidity='".$humidity."',status='".$humiditystat."'";
       $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
   }
   
   function soilMoistureInsert($soilmoisture){
       $query = "insert into soilmoistures set soilmoisture='".$soilmoisture."'";
       $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
   }
   
   function LightAmountInsert($lightAmount,$lightAmountstat){
       $query = "insert into lights set lightsAmount='".$lightAmount."',status='".$lightAmountstat."'";
       $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
   }
   
   function CO2AmountInsert($co2Amount,$co2Amountstat){
       $query = "insert into carbondioxides set carbondioxideAmount='".$co2Amount."',status='".$co2Amountstat."'";
       $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
   }
    
   }

   include("../InnovatechDbCrudFunctions.php");


   $temperaturelimitval;
   $temperaturemaxval;
   $humiditylimitval;
   $humiditymaxval;
   $lightlimitval;
   $lightmaxval;
   $co2limitval;
   $co2maxval;
   $temperaturestatusval;
   $humiditystatusval;
   $lightstatusval;
   $co2statusval;
   
   $servername = env('DB_HOST');
   $username=env('DB_USERNAME');
   $password=env('DB_PASSWORD');
   $dbname=env('DB_DATABASE');
   
   $b = new InnovatechDbCrudFunctions($servername,$username,$password,$dbname);
   $b->select("sensorsconfigurations","*","isActive=1");
   $result = $b->sql;
   
   
   while ($row = mysqli_fetch_assoc($result)) { 
       $jsonobj = $row['configuration_value'];
       $configval = json_decode($jsonobj);
       
           $temperaturelimitval = (float)$configval->temperatureSensorMinVal;
           $temperaturemaxval = (float)$configval->temperatureSensorMaxVal;
           $humiditylimitval = (float)$configval->humiditylimitval;
           $humiditymaxval = (float)$configval->humiditymaxval;
           $lightlimitval = (float)$configval->lightlimitval;
           $lightmaxval = (float)$configval->lightmaxval;
           $co2limitval = (float)$configval->co2limitval;
           $co2maxval = (float)$configval->co2maxval;
   
           $temperaturestatusval = (int)$configval->temperaturestatusval;
           $humiditystatusval = (int)$configval->humiditystatusval;
           $lightstatusval = (int)$configval->lightstatusval;
           $co2statusval = (int)$configval->co2statusval;
   }


    if(!empty($_GET)){
        $sensorsval=new Sensors($servername,$username,$password,$dbname);
        if(isset($_GET['temperature'])){
            if($temperaturestatusval==1){
               $tempval = (float)$_GET['temperature'];
               $tempstat;
               if($tempval<$temperaturelimitval){
                   $tempstat = 2;
               } else if($tempval>$temperaturemaxval){
                   $tempstat = 0;
               } else{
                   $tempstat = 1;
               }
               $sensorsval->temperatureInsert($_GET['temperature'],$tempstat);
           }
        }
       
        if(isset($_GET['humidity'])){
           if($humiditystatusval==1){
               $humidityval = (float)$_GET['humidity'];
               $humiditystat;
           if($humidityval<$humiditylimitval){
               $humiditystat = 2;
           } else if($humidityval>$humiditymaxval){
               $humiditystat = 0;
           } else{
               $humiditystat = 1;
           }
           $sensorsval->humidityInsert($_GET['humidity'],$humiditystat);
       }
       }
       
       if(isset($_GET['lightAmount'])){
           if($lightstatusval==1){
               $lightval = (float)$_GET['lightAmount'];
               $lightstat;
           if($lightval<$lightlimitval){
               $lightstat = 2;
           } else if($lightval>$lightmaxval){
               $lightstat = 0;
           } else{
               $lightstat = 1;
           }
           $sensorsval->LightAmountInsert($_GET['lightAmount'],$lightstat);
       }
       }
       
       if(isset($_GET['co2Amount'])){
           if($co2statusval==1){
               $co2val = (float)$_GET['co2Amount'];
               $co2stat;
           if($co2val<$co2limitval){
               $co2stat = 2;
           } else if($co2val>$co2maxval){
               $co2stat = 0;
           } else{
               $co2stat = 1;
           }
           $sensorsval->CO2AmountInsert($_GET['co2Amount'],$co2stat);
       }
       }
       }
?>