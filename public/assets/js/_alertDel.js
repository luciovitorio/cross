$(".tbl").on("click", ".btnDel", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var idAlert = $(this).attr("idAlert");

    Swal.fire({
        title: "Tem certeza que irá excluir esse registro?",
        text: "Essa ação não poderá ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, exclua!",
    }).then((result) => {
        $.get("alerts/delete/" + idAlert, function (response) {}).fail(
            function () {
                Swal.fire({
                    icon: "error",
                    title: "Estamos com uma falha no momento, tente mais tarde!",
                });
            }
        );

        if (result.isConfirmed) {
            Swal.fire({
                icon: "success",
                title: "Excluído!",
                text: "Esse registro foi excluído.",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "alerts";
                }
            });
        }
    });
});
