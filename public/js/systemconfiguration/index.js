$(document).ready(function(){

    datePickerId.max = new Date().toISOString().split(".")[0];

    $("#datePickerId").focusout(function(){
  
        console.log($("#datePickerId").val());
        var tzoffset = (new Date()).getTimezoneOffset() * 60000;
        var localISOTime = (new Date(Date.now() - tzoffset)).toISOString().slice(0, -1);
      
        datePickerId2.max = new Date().toISOString().split(".")[0];
        datePickerId2.min = $("#datePickerId").val()
      
      });
      

        $("#resetDB").click(function(){
            swal.fire({
            title: 'Do you want to save the changes?',
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            // console.log(result);
            if (result) {
                let timerInterval
                swal.fire({
                title: 'Resetting Database',
                html: 'Please Wait Until The Process Is Done.',
                timer: 5000,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    swal.showLoading()
                    const b = swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "POST",
                        url: "api/system-configurations/resetDB",
                        data: {formData:0}, // serializes the form's elements.
                        dataType: "json",
                        encode: true,
                        success: function(data)
                        {
                            swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Your work has been saved",
                                showConfirmButton: false,
                                timer: 1000,
                                footer: "<a href>CleverTech</a>",
                            });
                        }
                    });
                }
                })
            }
            });
        });

        $("#backUPDB").click(function(){
            swal.fire({
            title: 'Do you want to save the changes?',
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            // console.log(result);
            if (result) {
                let timerInterval
                swal.fire({
                title: 'BackUp Database',
                html: 'Please Wait Until The Process Is Done.',
                timer: 5000,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    swal.showLoading()
                    const b = swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "GET",
                        url: "our_backup_database",
                        success: function(data)
                        {
                            $("#backupdb").submit();
                        }
                    });
                }
                })
            }
            });
        });

        $("body").on("click", ".btn-generate", async (e) =>
            $("#generateReport").modal("show")
        );

        $("#generateReportss").click(function(){

            var formData = {
              datef: $("#datePickerId").val(),
              datet: $("#datePickerId2").val(),
            };
          
            $.ajax({
              type: "POST",
              url: "api/exportglobal/generatereport",
              data: formData, // serializes the form's elements.
              dataType: "json",
              encode: true,
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
});