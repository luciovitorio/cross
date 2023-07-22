// inicio do preenchimento dos campos de edição
$(".tbl").on("click", ".btnEdit", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var idUser = $(this).attr("idUser");

    $.get("users/edit/" + idUser, function (response) {
        $("#id").val(response.id);
        $("#editName").val(response.name);
        $("#editEmail").val(response.email);
        $("#editPhone").val(response.phone);
        $("#currentPhoto").val(response.photo);

        if (response.photo != "") {
            $(".previous").attr("src", "storage/" + response.photo);
        }
        if (response.photo == null) {
            $(".previous").attr("src", "storage/user/user.png");
        }

        if (response.profile == "user") {
            $("#editProfile").html("Usuário").val("user");
        }

        if (response.profile == "admin") {
            $("#editProfile").html("Administrador").val("admin");
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Estamos com uma falha no momento, tente mais tarde!",
        });
    });
});
// fim do preenchimento dos campos de edição

// inicio do update
$('form[name="editUser"]').submit(function (event) {
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
            form.find('input[name="editName"]').val("");
            form.find('input[name="editEmail"]').val("");
            form.find('input[name="editPhone"]').val("");
            $("#profile").prop("selectedIndex", 0);
            form.find('input[name="editPhoto"]').val("");

            Swal.fire({
                icon: "success",
                title: "Usuário alterado com sucesso!",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "users";
                }
            });
        },
        fail: function () {
            var data = jQuery.parseJSON(response.responseText);

            // retirando a classe de erro
            form.find('input[name="editName"]').removeClass("is-invalid");
            form.find('input[name="editEmail"]').removeClass("is-invalid");
            form.find('input[name="editPhone"]').removeClass("is-invalid");
            form.find('select[name="editProfile"]').removeClass("is-invalid");

            if (data.errors.name) {
                form.find('input[name="editName"]').addClass("is-invalid");
                $("#editName-error").html(data.errors.name[0]);
            }

            if (data.errors.email) {
                form.find('input[name="editEmail"]').addClass("is-invalid");
                $("#editEmail-error").html(data.errors.email[0]);
            }

            if (data.errors.profile) {
                form.find('select[name="editProfile"]').addClass("is-invalid");
                $("#editProfile-error").html(data.errors.profile[0]);
            }

            if (data.errors.phone) {
                form.find('input[name="phone"]').addClass("is-invalid");
                $("#editPhone-error").html(data.errors.phone[0]);
            }
        },
    });
});
// fim do update

jQuery("input.editPhone")
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

            $(".previous").attr("src", imageRoute);
        });
    }
});
