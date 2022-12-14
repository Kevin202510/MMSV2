$(document).ready(function(){
  table();
  showLightChart();

  setInterval(function(){
    table();
    }, 10000);
    datePickerId.max = new Date().toISOString().split(".")[0];
});

$("body").on("click", ".btn-generate", async (e) =>
    $("#generateReport").modal("show")
);

$("#datePickerId").focusout(function(){
  
  console.log($("#datePickerId").val());
  var tzoffset = (new Date()).getTimezoneOffset() * 60000;
  var localISOTime = (new Date(Date.now() - tzoffset)).toISOString().slice(0, -1);

  datePickerId2.max = new Date().toISOString().split(".")[0];
  datePickerId2.min = $("#datePickerId").val()

});

var lightLabel = [];
var lightData = [];
var lightChart;

function table(){
    $.ajax({
      url: 'api/light/getNewVal',
      type: 'GET',
      dataType: 'json',
      success: function (data){
        if(data.length>1){
        var html = '';
        var state='';
        $.each (data, function (bb) {
                if(data[bb].status==0){
                    state = "badge-danger";
                }else if(data[bb].status==1){
                  state = "badge-success";
                }else if(data[bb].status==2){
                  state = "badge-warning";
                }
                html += '<tr><td class="text-break">' + data[bb].lightsAmount + ' lm</td><td class="text-break"><div class="badge '+state+'">' + data[bb].statusName + '</div></td><td class="text-break">' + data[bb].date + '</td><td class="text-break">' + data[bb].time + '</td></tr>'
            });
            $('#table-main').html(html);
          }else{
            $('#table-main').html('<tr><td colspan="5"><center>NO AVAILABLE DATA<center></td></tr>');
          }
      }
    });

    $.ajax({
      type: "GET",
      url: "api/sensorsconfigurations",
      dataType: "json",
      encode: true,
      success: function(data)
      {
          $("#success").text(data[0].lightlimitval + " lm above is Neutral");
          $("#warning").text(data[0].lightlimitval + " lm below is Cold");
          $("#danger").text(data[0].lightmaxval + " lm above is Warm");

          if(data[0].lightstatusval==0){
            // myTemperatureChart.destroy();
            // showTemperatureChart();
            lightChart.reset();
            lightChart.data.labels.pop();
            lightChart.data.datasets[0].data = [];
            lightChart.update();
            $("#lightstat").html('<div class="badge badge-secondary">Sensor is OFF</div>');
          }else{
            fetchLight();
          }
      }
  });
}

$("#searchData").keyup(function(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchData");
  filter = input.value.toUpperCase();
  table = document.getElementById("table-main");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
      } else {
          tr[i].style.display = "none";
      }
      }
  }
});

$("#generateReportss").click(function(){

  var formData = {
    datef: $("#datePickerId").val(),
    datet: $("#datePickerId2").val(),
  };

  $.ajax({
    type: "POST",
    url: "api/exportlight/generatereport",
    data: formData, // serializes the form's elements.
    dataType: "json",
    encode: true
  });

  let success=0;

  if(success==0){
    swal.fire({
      position: "top-end",
      icon: "success",
      title: "Your Report is Downloading",
      showConfirmButton: false,
      timer: 1500,
      footer: "<a href>CleverTech</a>",
    });
    $("#generateReport").modal("hide")
  }
  
});

function fetchLight(){
  $.ajax({
    url: 'api/light/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      lightLabel = [];
      lightData = [];
      
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          lightLabel.push(newdata[bb].lightsAmount + " lm");
          lightData.push(newdata[bb].lightsAmount);

          if(data.length-1==bb){
            if(data[bb].status == 0){
              $("#lightstat").html('<div class="badge badge-danger">'+data[bb].statusName+'</div>');
            }else if(data[bb].status == 1){
              $("#lightstat").html('<div class="badge badge-success">'+data[bb].statusName+'</div>');
            }else{
              $("#lightstat").html('<div class="badge badge-warning">'+data[bb].statusName+'</div>');
            }
          }


          });    
        showLightChart();
    }
  })
}

"use strict";

function showLightChart(){
  var ctx = document.getElementById("lightChart").getContext('2d');
  lightChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:lightLabel,
      datasets: [{
        label: 'Light Lumen',
        data: lightData,
        borderWidth: 2,
        backgroundColor: '#e6faf9',
        borderColor: '#8fc4c2',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  }