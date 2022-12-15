$(document).ready(function(){
  table();

  $("#sprinklerstate1").click(function(e){
    // alert($(e.currentTarget).data("id"));
    var formData = {
      id: $(e.currentTarget).data("id"),
      sensor_status_val: 0,
    };

    $.ajax({
      type: "PUT",
      url: "api/controldevices/"+formData.id+"/sprinklerchangestate",
      data: formData, // serializes the form's elements.
      dataType: "json",
      encode: true,
      success: function(data)
      {
        table();
      }
    });
  });

  $("#sprinklerstate2").click(function(e){
    var formData = {
      id: $(e.currentTarget).data("id"),
      sensor_status_val: 1,
    };

    $.ajax({
      type: "PUT",
      url: "api/controldevices/"+formData.id+"/sprinklerchangestate",
      data: formData, // serializes the form's elements.
      dataType: "json",
      encode: true,
      success: function(data)
      {
        table();
      }
    });
  });

  $("#lightsstate1").click(function(e){
    // alert($(e.currentTarget).data("id"));
    var formData = {
      id: $(e.currentTarget).data("id"),
      sensor_status_val: 0,
    };

    $.ajax({
      type: "PUT",
      url: "api/controldevices/"+formData.id+"/lightschangestate",
      data: formData, // serializes the form's elements.
      dataType: "json",
      encode: true,
      success: function(data)
      {
        table();
      }
    });
  });

  $("#lightsstate2").click(function(e){
    var formData = {
      id: $(e.currentTarget).data("id"),
      sensor_status_val: 1,
    };

    $.ajax({
      type: "PUT",
      url: "api/controldevices/"+formData.id+"/lightschangestate",
      data: formData, // serializes the form's elements.
      dataType: "json",
      encode: true,
      success: function(data)
      {
        table();
      }
    });
  });

});

function table(){
    $.ajax({
      url: 'api/controldevices',
      type: 'GET',
      dataType: 'json',
      success: function (data){
          $.each (data, function (bb) {
                  if(data[bb].id==1){
                    $('#sprinklerstate1').attr('data-id', data[bb].id);
                    $('#sprinklerstate2').attr('data-id', data[bb].id);
                    if(data[bb].sensor_status_val==1){
                      $("#sprinklerstate1").prop('disabled', false);
                      $("#sprinklerstate2").prop('disabled', true);
                    }else if(data[bb].sensor_status_val==0){
                      $("#sprinklerstate2").prop('disabled', false);
                      $("#sprinklerstate1").prop('disabled', true);
                    }
                  }else if(data[bb].id==2){
                    $('#lightsstate1').attr('data-id', data[bb].id);
                    $('#lightsstate2').attr('data-id', data[bb].id);
                    if(data[bb].sensor_status_val==1){
                      $("#lightsstate1").prop('disabled', false);
                      $("#lightsstate2").prop('disabled', true);
                    }else if(data[bb].sensor_status_val==0){
                      $("#lightsstate2").prop('disabled', false);
                      $("#lightsstate1").prop('disabled', true);
                    }
                  }
              });
            }
    });
  }