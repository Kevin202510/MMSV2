$(document).ready(function(){

    $("body").on("click", "#clickmethis", () =>
        redirectme()
    );

    function redirectme(){
        window.location.href = "notifications";
    }
    
    getAllNotif();

    setInterval(function(){
        getAllNotif();
        }, 20000);

    function getAllNotif(){
        $.ajax({
            url: 'api/temperature/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                $("#curtemp").html(data[0].temperature+" °C");
                if(data[0].status==0){
    
                    $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread" id="clickmethis">><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-temperature-high"></i></div><div class="dropdown-item-desc">'+data[0].temperature+'°C Temperature is to High<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                    
                }else if(data[0].status==2){
    
                    $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread" id="clickmethis"><div class="dropdown-item-icon bg-warning text-white"><i class="fas fa-temperature-high"></i></div><div class="dropdown-item-desc">'+data[0].temperature+'°C Temperature is to Low<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                    
                }
                
            }
        });
    
        $.ajax({
            url: 'api/humidity/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                $("#curhum").html(data[0].humidity+" %");
                if(data[0].status==0){
    
                    $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-humidity"></i></div><div class="dropdown-item-desc">'+data[0].humidity+' °C Humidity is to High<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                    
                }
                
            }
        });
    
        $.ajax({
            url: 'api/light/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                $("#curlig").html(data[0].lightsAmount+" lm");
                if(data[0].status==0){
    
                    $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-lightbulb-on"></i></div><div class="dropdown-item-desc">'+data[0].lightsAmount+' lm Light is to High<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                    
                }
                
            }
        });
    
        $.ajax({
            url: 'api/carbondioxide/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                $("#curco2").html(data[0].carbondioxideAmount+" ppm");
                if(data[0].status==0){
    
                    $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-sensor-smoke"></i></div><div class="dropdown-item-desc">'+data[0].carbondioxideAmount+' ppm CarbonDioxide is to High<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                    
                }
                
            }
        });
    }
});