$(document).ready(function () {});

function submitFeedback() {
    checkForm();
    if (checkForm()) {
        let getFormData = $("#formFeedback").get(0);
        const formData = new FormData(getFormData);
        console.log("----------------");
        formData.forEach(function (value, key) {
            console.log(key, value);
        });
        console.log("----------------");

        Swal.fire({
            title: "Form Akan Disubmit!",
            text: "Anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/feedback-pasien/send",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Include the CSRF token
                    },
                    data: formData,
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    success: function (data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Form Berhasil Disubmit!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace("/");
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html:
                                    "<span>Form Tidak Berhasil Disubmit! <br>" +
                                    result.message +
                                    " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace("/");
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text:
                                "Keterangan : <br>" +
                                textStatus +
                                ". " +
                                jqXHR.responseText +
                                ". " +
                                errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    },
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Silahkan cek kembali form!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }
        });
    }else{
        Swal.fire({
            title: "Terdeteksi Form Kosong",
            text: "Silahkan cek kembali form feedback.",
            icon: "error",
            confirmButtonText: "OK",
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonColor: "#fa0000",
        });
    }
}

function checkForm() {
    // Variabel untuk menandai apakah semua input terisi
    let allFilled = true;

    // Iterasi melalui semua input, textarea, dan select di dalam form
    $("#formFeedback")
        .find("input, textarea, select")
        .each(function () {
            if ($.trim($(this).val()) === "") {
                allFilled = false; // Set flag ke false
            }
        });

    // Jika ada input yang kosong, hentikan proses pengiriman form
    if (!allFilled) {
        return false;
    }
    return true;
}
