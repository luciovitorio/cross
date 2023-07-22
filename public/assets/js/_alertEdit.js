// inicio do preenchimento dos campos de edição
$(".tbl").on("click", ".btnEdit", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var idAlert = $(this).attr("idAlert");

    $.get("alerts/edit/" + idAlert, function (response) {
        $("#id").val(response.id);
        $("#editMessage").val(response.message);
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });
});
// fim do preenchimento dos campos de edição

// inicio do update
$('form[name="editAlert"]').submit(function (event) {
    event.preventDefault();

    const form = $(this);
    const action = form.attr("action");

    var id = $("#id").val();
    $.ajax({
        url: action + "/" + id,
        method: "POST",
        data: new FormData(this),
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            Swal.fire({
                icon: "success",
                title: "Alerta alterado com sucesso!",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "alerts";
                }
            });
        },
        error: function (response) {
            var data = jQuery.parseJSON(response.responseText);

            // retirando a classe de erro
            form.find('textarea[name="message"]').removeClass("is-invalid");

            if (data.errors.message) {
                form.find('textarea[name="message"]').addClass("is-invalid");
                $("#editMessage-error").html(data.errors.message[0]);
            }
        },
    });
});
// fim do update
