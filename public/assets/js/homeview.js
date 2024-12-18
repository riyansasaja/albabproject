$(document).ready(function () {
    
    console.info(baseUrl);
    console.info('tai');
    if (message) {

        Swal.fire({
        title: "Success",
        text: message,
        icon: "success"
        });
    }

    if (error) {
        console.log(error);

        Swal.fire({
        title: "Error",
        text: JSON.stringify(error),
        icon: "error"
        });
    }

    if (success) {
        console.log(success)

        Swal.fire({
        title: "Success",
        // text: success.uploaded_fileinfo,
        text: JSON.stringify(success),
        icon: "success"
        });
    }

    $('#uploadStruk').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })


    $(".pill").on("click", function () {
       
       console.log($(this).data('id'));
       let dataId = $(this).data('id');
       $.ajax({
        type: "POST",
        url: `${baseUrl}cicilbyid`,
        data: {
            "id" : dataId
        },
        dataType: "json",
        success: function (response) {
            console.log(response.status);
        let status;
            switch (response.status) {
                case '1':
                    status = 'Process Validation';
                    break;
                case '2' :
                    status = 'Validated';
                    break;
                default:
                  status = 'Denaied'
                    break;
            }
            
            $("#modalBayar").modal('show');
            $('#bodydata').html(`
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>${status}</td>
                        </tr>
                        <tr>
                            <th>Tgl Upload</th>
                            <td>${response.date}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayar</th>
                            <td>Rp. ${response.jmlh_bayar}</td>
                        </tr>
                        <tr>
                            <th>Bukti Bayar</th>
                        </tr>
                    </tbody>
                </table>
                <img class="img-fluid" src=  "${baseUrl}uploads/${response.bukti_bayar}" alt="">
                
              
                `);
        }
       });
    });


});