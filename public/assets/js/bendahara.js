$(document).ready(function () {
    if (success) {
        Swal.fire({
            title: "Sukses",
            text: success,
            footer : 'data yang sudah diinput Tidak diizinkan dirubah. Jika ada perubahan, lakukan balance saldo pada debit atau kredit!',
            icon: "success"
          });
    }

    if (message) {
        Swal.fire({
            title: "Perhatian !",
            text: message,
            footer : 'data yang sudah diinput Tidak diizinkan dirubah. Jika ada perubahan, lakukan balance saldo pada debit atau kredit!',
            icon: "warning"
          });
    }




});