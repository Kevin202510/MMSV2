<?php

   include("InnovatechDbCrudFunctions.php");


   $temperaturenameval="Temperature Sensor";
   $humiditynameval = "=Humidity Sensor";
   $lightnameval = "=Light Sensor";
   $co2nameval = "=CO2 Sensor";
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


   $configval;

   $b = new InnovatechDbCrudFunctions();
        $b->select("sensorsconfigurations","*","isActive=1");
        $result = $b->sql;


        while ($row = mysqli_fetch_assoc($result)) { 
            $jsonobj = $row['configuration_value'];
            $configval = json_decode($jsonobj);

            // var_dump($configval);
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

        if(isset($_POST['temperature'])){
            if($temperaturestatusval==1){
               $tempval = (float)$_POST['temperature'];
               $tempstat;
               if($tempval<$temperaturelimitval){
                   $tempstat = 2;
               } else if($tempval>$temperaturemaxval){
                   $tempstat = 0;
               } else{
                   $tempstat = 1;
               }
               $b->insert("temperatures",[
                'temperature'=>$_POST['temperature'],
                'status'=>$tempstat,
               ]);
                // $result = $b->sql;
           }
        }


    // if(!empty($_POST)){

    //     if(isset($_POST['temperature'])){
    //         if($temperaturestatusval==1){
    //            $tempval = (float)$_POST['temperature'];
    //            $tempstat;
    //            if($tempval<$temperaturelimitval){
    //                $tempstat = 2;
    //            } else if($tempval>$temperaturemaxval){
    //                $tempstat = 0;
    //            } else{
    //                $tempstat = 1;
    //            }
    //            $b->insert("temperatures",[
    //             'temperature'=>$_POST['temperature'],
    //             'status'=>$tempstat,
    //            ]);
    //             $result = $b->sql;
    //        }
    //     }

    //     if(isset($_POST['lightAmount'])){
    //         if($lightstatusval==1){
    //             $lightval = (float)$_POST['lightAmount'];
    //             $lightstat;
    //         if($lightval<$lightlimitval){
    //             $lightstat = 2;
    //         } else if($lightval>$lightmaxval){
    //             $lightstat = 0;
    //         } else{
    //             $lightstat = 1;
    //         }
    //         $sql20 = 'INSERT INTO lights("lightsAmount",status)VALUES('.$_POST['lightAmount'].','.$lightstat.')';
    //         $pdo->query($sql20);
    //     }
    //     }
       
    //     if(isset($_POST['humidity'])){
    //        if($humiditystatusval==1){
    //            $humidityval = (float)$_POST['humidity'];
    //            $humiditystat;
    //        if($humidityval<$humiditylimitval){
    //            $humiditystat = 2;
    //        } else if($humidityval>$humiditymaxval){
    //            $humiditystat = 0;
    //        } else{
    //            $humiditystat = 1;
    //        }
    //        $sql2 = 'INSERT INTO humidities(humidity,status)VALUES('.$_POST['humidity'].','.$humiditystat.')';
    //         $pdo->query($sql2);
    //    }
    //    }
       
    //    if(isset($_POST['co2Amount'])){
    //        if($co2statusval==1){
    //            $co2val = (float)$_POST['co2Amount'];
    //            $co2stat;
    //        if($co2val<$co2limitval){
    //            $co2stat = 2;
    //        } else if($co2val>$co2maxval){
    //            $co2stat = 0;
    //        } else{
    //            $co2stat = 1;
    //        }
    //         $sql10 = 'INSERT INTO carbondioxides("carbondioxideAmount",status)VALUES('.$_POST['co2Amount'].','.$co2stat.')';
    //         $pdo->query($sql10);
    //    }
    //    }
    //    }

       echo $temperaturenameval . '=' . $temperaturelimitval . '=' .  $temperaturemaxval . '=' . $temperaturestatusval.':';
       echo $humiditynameval . '=' . $humiditylimitval . '=' .  $humiditymaxval . '=' . $humiditystatusval.':';
        echo $lightnameval . '=' . $lightlimitval . '=' .  $lightmaxval . '=' . $lightstatusval.':';
        echo $co2nameval . '=' . $co2limitval . '=' .  $co2maxval . '=' . $co2statusval.':';
?>