function valida_hora_minuto(hora) {

    if (hora.replace(/_/g, "").replace(/:/g, "").length < 4) {
        return false;
    }

    if (hora.replace(/_/g, "").replace(/:/g, "").substr(0, 2) < 0 || hora.replace(/_/g, "").replace(/:/g, "").substr(0, 2) > 23) {
        return false;
    }

    if (hora.replace(/_/g, "").replace(/:/g, "").substr(2, 2) < 0 || hora.replace(/_/g, "").replace(/:/g, "").substr(2, 2) > 59) {
        return false;
    }
    
    return true;
}

function formatar_hora_minuto(hora){
    
    switch (hora.toString().length){
        
        case 1:
            retorno =  '00:0' + hora;
            break;
        case 2:
            
            retorno = '00:' + retornar_minutos(hora.toString());
            break;
        case 3:
            retorno = '0'+ hora.toString().substr(0, 1) + ':' + retornar_minutos(hora.toString().substr(1,2));
            break;
        case 4:
            retorno = hora.toString().substr(0, 2) + ':' + retornar_minutos(hora.toString().substr(2,2));
            break;
    }
    
    return retorno;
}

function retornar_minutos(minuto){

    if(parseInt(minuto) <= 59 || parseInt(minuto) == 0) return '00';
    else return ((minuto - 40).length) == 1?('0' + (minuto - 40)): (minuto - 40);
}


// Post para a URL fornecida com os parâmetros especificados.
function post(path, parameters) {
    var form = $('<form></form>');

    form.attr("method", "post");
    form.attr("action", path);
    form.attr("target", "_blank");

    $.each(parameters, function(key, value) {
        var field = $('<input></input>');

        field.attr("type", "hidden");
        field.attr("name", key);
        field.attr("value", value);

        form.append(field);
    });

    // The form needs to be a part of the document in
    // order for us to be able to submit it.
    $(document.body).append(form);
    form.submit();
}

function formataData(data){

    var data = new Date(data);

    var dia = data.getDate();
    if (dia.toString().length == 1) dia = '0' + dia 

    var mes = data.getMonth() + 1;
    if (mes.toString().length == 1) mes = '0' + mes 

    var ano = data.getFullYear();

    return dia + '/' + mes + '/' + ano;
}

function toggleFullScreen() {

    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

(function (){
    var close = window.swal.close;
    var previousWindowKeyDown = window.onkeydown;
    window.swal.close = function() {
        close();
        window.onkeydown = previousWindowKeyDown;
    };
})();

function dia_semana(data){
    var semana = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
    var data = data;
    var arr = data.split("/").reverse();
    var teste = new Date(arr[0], arr[1] - 1, arr[2]);
    var dia = teste.getDay();

    return semana[dia];
}

function serializeObject($form) {
    return $form.serializeArray().reduce((obj, item) => {
        obj[item.name] = item.value;
        return obj;
    }, {});
}

/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
