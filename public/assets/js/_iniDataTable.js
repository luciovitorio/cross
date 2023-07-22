// DATATABLE
$(document).ready(function () {
    $(".userTable").DataTable({
        responsive: {
            details: {
                type: "column",
            },
        },
        columnDefs: [
            {
                className: "dtr-control",
                orderable: false,
                targets: 0,
            },
        ],
        language: {
            url: "assets/js/_ptBR.json",
        },
    });
});
