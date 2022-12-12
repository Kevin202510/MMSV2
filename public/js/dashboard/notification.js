$(document).ready(function(){

    $("body").on("click", "#clickmethis", () =>
        redirectme()
    );

    function redirectme(){
        window.location.href = "notifications";
    }
    
    getAllNotif();
    insertToNotifBell();

    setInterval(function(){
        getAllNotif();
        }, 10000);

    setInterval(function(){
        insertToNotifBell();
        }, 20000);

    function getAllNotif(){
        let temperaturedata;
        let lightsdata;
        let co2data;
        let humiditydata;

        

        $.ajax({
            url: 'api/temperature/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                temperaturedata = data[0].temperature;
                $("#curtemp").html(data[0].temperature+" °C");
            }
        });
    
        $.ajax({
            url: 'api/humidity/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                humiditydata = data[0].humidity;
                $("#curhum").html(data[0].humidity+" %");
            }
        });
    
        $.ajax({
            url: 'api/light/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                lightsdata = data[0].lightsAmount;
                $("#curlig").html(data[0].lightsAmount+" lm");
            }
        });
    
        $.ajax({
            url: 'api/carbondioxide/getNewVal',
            type: 'GET',
            dataType: 'json',
            success: function (data){
                co2data = data[0].carbondioxideAmount;
                $("#curco2").html(data[0].carbondioxideAmount+" ppm");
            }
        });
    }

    function insertToNotifBell(){
        
        $("#notificationContainer").empty();

        $.ajax({
            url: 'api/notifications',
            type: 'GET',
            dataType: 'json',
            success: function (datas){
                $.each (datas, function (bb) {
                    if(datas[bb].sensor_id==1){
                        if(datas[bb].status==0){
                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread" id="clickmethis"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-temperature-high"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }else if(datas[bb].status==2){
            
                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread" id="clickmethis"><div class="dropdown-item-icon bg-warning text-white"><i class="fas fa-temperature-high"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }
                    }else if(datas[bb].sensor_id==2){
                        if(datas[bb].status==0){

                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-humidity"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }else if(datas[bb].status==2){
            
                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-warning text-white"><i class="fas fa-humidity"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }
                    }else if(datas[bb].sensor_id==3){
                        if(datas[bb].status==0){

                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-lightbulb-on"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }else if(datas[bb].status==2){
            
                            $("#notificationContainer").append('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-warning text-white"><i class="fas fa-lightbulb-on"></i></div><div class="dropdown-item-desc">'+datas[bb].notification_description+'<div class="time text-primary">'+datas[bb].date + " | "+ datas[bb].time+'</div></div></div>');
                            
                        }
                    }
                });
            }
        });
    }
});