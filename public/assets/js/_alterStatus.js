$(".tbl").on("click", ".btnActivate", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var idUser = $(this).attr("idUser");
    var userStatus = $(this).attr("userStatus");

    $.get("users/status/" + idUser, function (response) {
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (userStatus == 0) {
        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger");
        $(this).html("Bloqueado");
        $(this).attr("userStatus", 1);
    } else {
        $(this).addClass("btn-success");
        $(this).removeClass("btn-danger");
        $(this).html("Ativo");
        $(this).attr("userStatus", 0);
    }
});
