$(document).ready(function () {


    if (message) {

        Swal.fire({
        title: "Success",
        text: message,
        icon: "success"
        });
    }

    if (error) {
        Swal.fire({
        title: "Error",
        text: error,
        icon: "error"
        });
    }

    if (success) {

        Swal.fire({
        title: "Success",
        text: success,
        icon: "success"
        });
    }

});