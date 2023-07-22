$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('form[name="createUser"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr("action");

        $.ajax({
            url: action,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                form.find('input[name="name"]').val("");
                form.find('input[name="email"]').val("");
                form.find('input[name="password"]').val("");
                form.find('input[name="phone"]').val("");
                $("#profileSelect").prop("selectedIndex", 0);
                form.find('input[name="photo"]').val("");

                // retirando a classe de erro
                form.find('input[name="name"]').removeClass("is-invalid");
                form.find('input[name="email"]').removeClass("is-invalid");
                form.find('input[name="phone"]').removeClass("is-invalid");
                form.find('select[name="profile"]').removeClass("is-invalid");

                Swal.fire({
                    icon: "success",
                    title: "Usuário criado com sucesso!",
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "users";
                    }
                });
            },
            error: function (response) {
                var data = jQuery.parseJSON(response.responseText);

                if (data.errors.name) {
                    form.find('input[name="name"]').addClass("is-invalid");
                    $("#name-error").html(data.errors.name[0]);
                }

                if (data.errors.email) {
                    form.find('input[name="email"]').addClass("is-invalid");
                    $("#email-error").html(data.errors.email[0]);
                }

                if (data.errors.profile) {
                    form.find('select[name="profile"]').addClass("is-invalid");
                    $("#profile-error").html(data.errors.profile[0]);
                }

                if (data.errors.phone) {
                    form.find('input[name="phone"]').addClass("is-invalid");
                    $("#phone-error").html(data.errors.phone[0]);
                }
            },
        });
    });
});

jQuery("input.phone")
    .mask("99999-9999")
    .focusout(function (event) {
        var target, phone, element;
        target = event.currentTarget ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, "");
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("99999-999?9");
        } else {
            element.mask("99999-999?9");
        }
    });

// UPLOAD USER PHOTO
$(".newPhoto").change(function () {
    var image = this.files[0];

    if (image["type"] != "image/jpeg" && image["type"] != "image/png") {
        $(".newPhoto").val("");

        swal.fire({
            icon: "error",
            title: "Erro ao enviar a imagem!",
            text: "A imagem deve estar no formato JPG ou PNG!",
            confirmButtonText: "Fechar",
        });
    } else if (image["size"] > 2000000) {
        $(".newPhoto").val("");
        swal.fire({
            icon: "error",
            title: "Erro ao enviar a imagem!",
            text: "A imagem deve ser menor que 2MB!",
            confirmButtonText: "Fechar",
        });
    } else {
        var imageData = new FileReader();
        imageData.readAsDataURL(image);

        $(imageData).on("load", function (event) {
            var imageRoute = event.target.result;

            $(".preview").attr("src", imageRoute);
        });
    }
});

var myModalEl = document.getElementById("createUserModal");
myModalEl.addEventListener("hidden.bs.modal", function (event) {
    window.location = "users";
});
