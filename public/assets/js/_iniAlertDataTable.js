// DATATABLE
$(document).ready(function () {
    $(".alertTable").DataTable({
        searching: false,
        bLengthChange: false,
        paging: false,
        info: false,
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
