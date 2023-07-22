$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('form[name="createAlert"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr("action");

        const text = form.find('textarea[name="message"]');

        $.ajax({
            url: action,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                form.find('textarea[name="message"]').val("");

                // // retirando a classe de erro
                form.find('textarea[name="message"]').removeClass("is-invalid");

                Swal.fire({
                    icon: "success",
                    title: "Mensagem criada com sucesso!",
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "alerts";
                    }
                });
            },
            error: function (response) {
                var data = jQuery.parseJSON(response.responseText);
                if (data.errors.message) {
                    form.find('textarea[name="message"]').addClass(
                        "is-invalid"
                    );
                    $("#message-error").html(data.errors.message[0]);
                }
            },
        });
    });
});
