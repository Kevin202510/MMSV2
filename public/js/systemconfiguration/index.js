$(document).ready(function(){

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
});