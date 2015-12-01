$(document).ready(function () {
    $('#tel').keypress(function () {
        mascara(this, mtel);
    });
    //if ($.validateEmail('fulano@ciclano.com.br'))
    //   alert('Yes!');
});

function msgSucesso(msg) {
    //box = "<div class='alert alert-success alert-dismissable'>";
    //box += "<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>";
    //box += "<h4>" + msg + "</h4></div>";
    box = "<div class='success'>" + msg + "</div>";
    $("#msgReturn").html(box);
    $('#msgReturn').delay(3000).hide(1000, function () {
        $("#msgReturn").html('');
        $("#msgReturn").show();
    });
}

function msgErro(msg) {
    //box = "<div class='alert alert-error alert-dismissable'>";
    //box += "<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>";
    //box += "<h4>" + msg + "</h4></div>";
    box = "<div class='error'>" + msg + "</div>";
    $("#msgReturn").html(box);
    $('#msgReturn').delay(3000).hide(1000, function () {
        $("#msgReturn").html('');
        $("#msgReturn").show();
    });
}

function msgRedirect(data) {
    if ((data.msg != "") && (data.retorno == true)) {
        if (data.link != "") {
            setTimeout(function () {
                $("#msgReturn").html("<div class='overlay'> Aguarde... <i class='fa fa-refresh fa-spin'> </i></div>");
                window.location = data.link;
            }, 5000);
        } else {
            if (data.alert == true) {
                alert(data.msg);
            } else {
                msgSucesso(data.msg);
            }
        }
    }
    if ((data.msg != "") && (data.retorno == false)) {
        msgErro(data.msg);
    }
}

function enviarForm(link) {
    $("#msgReturn").html("<div class='overlay'> Aguarde... <i class='fa fa-refresh fa-spin'> </i></div>");
    $(".btn").attr("disabled", "disabled");
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: false,
        url: link,
        data: $('#form').serialize(),
        success: function (data) {
            $('html, body').animate({scrollTop: 0}, 'slow');
            $('#form').each(function () {
                this.reset();
            });
            msgRedirect(data);
            $('.btn').removeAttr('disabled');
        },
        error: function (data) {
            msgErro('Erro ao chamar arquivo');
            $('.btn').removeAttr('disabled');
        }
    });
}

function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}
function mtel(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id(el) {
    return document.getElementById(el);
}

$.validateEmail = function (email)
{
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
};