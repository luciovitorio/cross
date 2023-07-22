$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".gap-2").on("click", ".btnHourSeg", function () {
    console.log("clicou no botao");
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            if (value.photo === null) {
                $(".userBlock").append(
                    '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/user.png"> <div class="ms-2"> <p class="text-capitalize">' +
                        value.name +
                        "</p> </div></div></div>"
                );
            } else {
                $(".userBlock").append(
                    '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                        value.photo +
                        '"> <div class="ms-2"> <p class="text-capitalize">' +
                        value.name +
                        "</p> </div></div></div>"
                );
            }
            // $(".userBlock").append(
            //     '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
            //         value.photo +
            //         '"> <div class="ms-2"> <p class="text-capitalize">' +
            //         value.name +
            //         "</p> </div></div></div>"
            // );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

$(".gap-2").on("click", ".btnHourTer", function () {
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            console.log(value.photo);
            $(".userBlock").append(
                '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                    value.photo +
                    '"> <div class="ms-2"> <p class="text-capitalize">' +
                    value.name +
                    "</p> </div></div></div>"
            );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

$(".gap-2").on("click", ".btnHourQua", function () {
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            console.log(value.photo);
            $(".userBlock").append(
                '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                    value.photo +
                    '"> <div class="ms-2"> <p class="text-capitalize">' +
                    value.name +
                    "</p> </div></div></div>"
            );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

$(".gap-2").on("click", ".btnHourQui", function () {
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            console.log(value.photo);
            $(".userBlock").append(
                '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                    value.photo +
                    '"> <div class="ms-2"> <p class="text-capitalize">' +
                    value.name +
                    "</p> </div></div></div>"
            );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

$(".gap-2").on("click", ".btnHourSex", function () {
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            console.log(value.photo);
            $(".userBlock").append(
                '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                    value.photo +
                    '"> <div class="ms-2"> <p class="text-capitalize">' +
                    value.name +
                    "</p> </div></div></div>"
            );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

$(".gap-2").on("click", ".btnHourSab", function () {
    var idHour = $(this).attr("idHour");
    var hora = $(this).attr("hora");
    var idDay = $(this).attr("idDay");
    var idUser = $(this).attr("idUser");

    $("#horaSelecionada").html("Hora selecionada: " + hora + ":00");

    $.get("schedule/hours/" + idHour + "/" + idDay, function (data) {
        $.each(data, function (key, value) {
            console.log(value.photo);
            $(".userBlock").append(
                '<div class="d-flex justify-content-between mb-2 pb-2 border-bottom"> <div class="d-flex align-items-center hover-pointer"> <img class="img-xs rounded-circle" src="https://cross.lbkdigital.com.br/storage/' +
                    value.photo +
                    '"> <div class="ms-2"> <p class="text-capitalize">' +
                    value.name +
                    "</p> </div></div></div>"
            );
        });
    });

    return addSchedule(idHour, idDay, idUser);
});

function addSchedule(idHour, idDay, idUser) {
    $('form[name="createUser"]').submit(function (event) {
        event.preventDefault();
        const form = $(this);
        const action = form.attr("action");

        var data = new FormData();
        data.append("day_id", idDay);
        data.append("hour_id", idHour);
        data.append("user_id", idUser);

        $.ajax({
            url: action,
            method: "POST",
            data: data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.fire({
                    icon: "success",
                    title: "Agenda realizada com sucesso!",
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "home";
                    }
                });
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Turma fechada!",
                });
            },
        });
    });
}

var myModalEl = document.getElementById("addSchedule");
myModalEl.addEventListener("hidden.bs.modal", function (event) {
    window.location = "home";
});

$(".gap-2").on("click", ".desmarcar", function (e) {
    e.stopPropagation();

    var idHour = $(this).attr("idHour");
    var idUser = $(this).attr("idUser");

    Swal.fire({
        title: "Tem certeza que irá desmarcar?",
        text: "Essa ação não poderá ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, desmarque!",
    }).then((result) => {
        $.get(
            "schedule/delete/" + idHour + "/" + idUser,
            function (response) {}
        ).fail(function () {
            Swal.fire({
                icon: "error",
                title: "Estamos com uma falha no momento, tente mais tarde!",
            });
        });

        if (result.isConfirmed) {
            Swal.fire({
                icon: "success",
                title: "Desmarcado!",
                text: "Sua aula foi desmarcada com sucesso.",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "home";
                }
            });
        }
    });
});
