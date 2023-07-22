// SEGUNDA-FEIRA
$(".gap-2").on("click", ".btnDaySeg", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnSeg = $(".btnSeg");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourSeg").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourSeg").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus === "0") {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnSeg.removeClass("btn-inverse-primary");
        btnSeg.addClass("btn-inverse-danger");
        btnSeg.addClass("disabled");
        btnSeg.children().html("Bloqueado");
        btnSeg.children().removeClass("bg-success");
        btnSeg.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnSeg.removeClass("btn-inverse-danger");
        btnSeg.addClass("btn-inverse-primary");
        btnSeg.removeClass("disabled");
        btnSeg.children().html("Liberado");
        btnSeg.children().removeClass("bg-danger");
        btnSeg.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourSeg", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus === "0") {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});

// TERCA-FEIRA
$(".gap-2").on("click", ".btnDayTer", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnTer = $(".btnTer");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourTer").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourTer").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnTer.removeClass("btn-inverse-primary");
        btnTer.addClass("btn-inverse-danger");
        btnTer.addClass("disabled");
        btnTer.children().html("Bloqueado");
        btnTer.children().removeClass("bg-success");
        btnTer.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnTer.removeClass("btn-inverse-danger");
        btnTer.addClass("btn-inverse-primary");
        btnTer.removeClass("disabled");
        btnTer.children().html("Liberado");
        btnTer.children().removeClass("bg-danger");
        btnTer.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourTer", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});

// QUARTA-FEIRA
$(".gap-2").on("click", ".btnDayQua", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnQua = $(".btnQua");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourQua").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourQua").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnQua.removeClass("btn-inverse-primary");
        btnQua.addClass("btn-inverse-danger");
        btnQua.addClass("disabled");
        btnQua.children().html("Bloqueado");
        btnQua.children().removeClass("bg-success");
        btnQua.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnQua.removeClass("btn-inverse-danger");
        btnQua.addClass("btn-inverse-primary");
        btnQua.removeClass("disabled");
        btnQua.children().html("Liberado");
        btnQua.children().removeClass("bg-danger");
        btnQua.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourQua", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});
// QUINTA-FEIRA
$(".gap-2").on("click", ".btnDayQui", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnQui = $(".btnQui");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourQui").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourQui").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnQui.removeClass("btn-inverse-primary");
        btnQui.addClass("btn-inverse-danger");
        btnQui.addClass("disabled");
        btnQui.children().html("Bloqueado");
        btnQui.children().removeClass("bg-success");
        btnQui.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnQui.removeClass("btn-inverse-danger");
        btnQui.addClass("btn-inverse-primary");
        btnQui.removeClass("disabled");
        btnQui.children().html("Liberado");
        btnQui.children().removeClass("bg-danger");
        btnQui.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourQui", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});

// SEXTA-FEIRA
$(".gap-2").on("click", ".btnDaySex", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnSex = $(".btnSex");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourSex").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourSex").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnSex.removeClass("btn-inverse-primary");
        btnSex.addClass("btn-inverse-danger");
        btnSex.addClass("disabled");
        btnSex.children().html("Bloqueado");
        btnSex.children().removeClass("bg-success");
        btnSex.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnSex.removeClass("btn-inverse-danger");
        btnSex.addClass("btn-inverse-primary");
        btnSex.removeClass("disabled");
        btnSex.children().html("Liberado");
        btnSex.children().removeClass("bg-danger");
        btnSex.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourSex", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});

// SABADO
$(".gap-2").on("click", ".btnDaySab", function () {
    var idDay = $(this).attr("idDay");
    var dayStatus = $(this).attr("dayStatus");
    var icon = $(this).children();
    var btnSab = $(".btnSab");

    if (dayStatus === "0") {
        $(function () {
            $(".btnHourSab").each(function (i, obj) {
                $(this).removeClass("btn-inverse-primary");
                $(this).addClass("btn-inverse-danger");
                $(this).addClass("disabled");
                $(this).children().html("Bloqueado");
                $(this).children().removeClass("bg-success");
                $(this).children().addClass("bg-danger");
            });
        });
    } else {
        $(".btnHourSab").each(function (i, obj) {
            $(this).removeClass("disabled");
        });
    }

    $.get("day/status/" + idDay, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (dayStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        icon.html(feather.icons["check-square"].toSvg());
        btnSab.removeClass("btn-inverse-primary");
        btnSab.addClass("btn-inverse-danger");
        btnSab.addClass("disabled");
        btnSab.children().html("Bloqueado");
        btnSab.children().removeClass("bg-success");
        btnSab.children().addClass("bg-danger");
        $(this).attr("dayStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        icon.html(feather.icons["x-square"].toSvg());
        btnSab.removeClass("btn-inverse-danger");
        btnSab.addClass("btn-inverse-primary");
        btnSab.removeClass("disabled");
        btnSab.children().html("Liberado");
        btnSab.children().removeClass("bg-danger");
        btnSab.children().addClass("bg-success");
        $(this).attr("dayStatus", 0);
    }
});

$(".gap-2").on("click", ".btnHourSab", function () {
    var idHour = $(this).attr("idHour");
    var hourStatus = $(this).attr("hourStatus");

    $.get("hour/status/" + idHour, function () {}).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });

    if (hourStatus == 0) {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).addClass("btn-inverse-danger");
        $(this).children().html("Bloqueado");
        $(this).children().removeClass("bg-success");
        $(this).children().addClass("bg-danger");
        $(this).attr("hourStatus", 1);
    } else {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-success");
        $(this).removeClass("btn-inverse-danger");
        $(this).addClass("btn-inverse-success");
        $(this).children().html("Liberado");
        $(this).children().removeClass("bg-danger");
        $(this).children().addClass("bg-success");
        $(this).attr("hourStatus", 0);
    }
});

$(".table").on("click", ".btnExclude", function (e) {
    e.stopPropagation();

    var idHour = $(this).attr("idHour");
    var idUser = $(this).attr("idUser");

    Swal.fire({
        title: "Tem certeza que deseja excluir?",
        text: "Essa ação não poderá ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, exclua!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.get(
                "schedule/delete/" + idHour + "/" + idUser,
                function (response) {}
            ).fail(function () {
                Swal.fire({
                    icon: "error",
                    title: "Estamos com uma falha no momento, tente mais tarde!",
                });
            });

            Swal.fire({
                icon: "success",
                title: "Excluído!",
                text: "Esse agendamento foi excluído com sucesso.",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "blocks";
                }
            });
        }
    });
});

$("#btnReset").on("click", function () {
    Swal.fire({
        title: "Tem certeza que deseja excluir todos os registros da semana?",
        text: "Essa ação não poderá ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, exclua!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.get("schedule/reset", function (response) {}).fail(function () {
                Swal.fire({
                    icon: "error",
                    title: "Estamos com uma falha no momento, tente mais tarde!",
                });
            });

            Swal.fire({
                icon: "success",
                title: "Excluído!",
                text: "Reset realizado com sucesso.",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "blocks";
                }
            });
        }
    });
});
