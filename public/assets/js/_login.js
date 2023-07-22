$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('form[name="login"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr("action");
        const email = form.find('input[name="email"]').val();
        const password = form.find('input[name="password"]').val();

        $.post(
            action,
            { email, password },
            function (response) {
                if (response.message) {
                    const Toast = Swal.mixin({
                        customClass: {
                            text: "err",
                        },
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                    });

                    Toast.fire({
                        icon: response.icon,
                        text: response.message,
                    });
                }

                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            "json"
        );
    });
});
