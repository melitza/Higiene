/*funciones para validar campos no vacios en la pagina de busqueda de contactos*/
function vacio(q){  
    for ( i = 0; i < q.length; i++ ) {  
        if ( q.charAt(i)!==" " ) {  
                return true;
        }  
    }  
    return false;
}  
function cerrar() {
    window.close();
}
function valida(F){  
    if(vacio(F.cadena.value)===false){  
        alert("Introduzca una cadena de texto.");
        return false; 
    } else {  
        return true;  
    }        
}
/*funciones para validar campos no vacios en la pagina de busqueda de contactos*/

/*funciones de la pagina modificar*/
function validaCampMod(F){  
    if( vacio(F.Nombre.value)===false || vacio(F.ApaPat.value)===false || vacio(F.Estado.value)===false){  
        alert("Nombre, apellido paterno y estado no deben ser vacios");
        return false; 
    } else {  
        return true;  
    }
}

function validaCampInser(F){  
    if( vacio(F.nombre.value)===false || vacio(F.nombre.value)===false){
        alert("El campo nombre no puede ser vacío.");
        return false; 
    } else {  
        return true;    
    }
}
function enviarMensaje(d){
    alert(d);
}

function valCamposNewUser(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false || vacio(F.passrep.value)===false || vacio(F.nombre.value)===false
        || vacio(F.ap.value)===false || vacio(F.frase.value)===false){
        alert("nombre de usuario, contraseña no deben ser vacios, tu nombre\n frase secreta, apellido paterno\n no deben ser vacíos");
        return false;
    }else{
        return true;
    }
} 
function noUserPassVacios(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false){
        alert("No puede haber campos vacíos");
        return false; 
    } else {  
        return true;    
    }
}
function novacioCambioContrasenia(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false || vacio(F.passrep.value)===false){
        alert("No puede haber campos vacíos");
        return false; 
    } else {  
        return true;    
    }
}
function novacioNombreAct(F){
    if( vacio(F.nom.value)===false || vacio(F.ap.value)===false){
        alert("El nombre y el apellido paterno no pueden ser vacíos");
        return false; 
    } else {  
        return true;    
    }
}
function noUserPassVaciosRecuperacion(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false){
        alert("Ingrese nombre de usuario y frase secreta");
        return false; 
    } else {  
        return true;  
    }
}

function validarPasswd(){
    var p1 = document.getElementById("pass").value;
    var p2 = document.getElementById("passNu").value;
    if (p1 != p2) {
        alert("Las contraseñas deben coincidir");
        return false;
    }else{
        return true;
    }
}
function  noUserPassrRecp(F){
    if( vacio(F.nuevarep.value)===false || vacio(F.nueva.value)===false){
        alert("La nueva contraseña no puede ser vacía");
        return false;
    }else{
        return true;
    }
}
function validarPasswdRecuperacion(){
    var p1 = document.getElementById("nueva").value;
    var p2 = document.getElementById("nuevarep").value;
    if (p1 != p2) {
        alert("Las contraseñas deben coincidir");
        return false;
    }else{
        return true;
    }
}

function calcLong(txt, formul, maximo){
    var largo;
    largo = formul[txt].value.length;
    if (largo > maximo){
        formul[txt].value = formul[txt].value.substring(0,maximo);
    }
}
function  validarLetrasDireccion(e){
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla===13) return true; // 3
    if (tecla===8) return true; // 3
    patron =/[A-Za-zá-úÑñÁ-Ú\s0-9,.()-*]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function validarLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla===13) return true; // 3
    if (tecla===8) return true; // 3
    patron =/[A-Za-zá-úÑñÁ-Ú\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function validarLetrasSinEspacios(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==13) return true; // 3
    if (tecla==8) return false; // 3
    patron =/[A-Za-zá-úÑñÁ-Ú]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validarFraseSecreta(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla===13) return true; // 3
    if (tecla===8) return true; // 3
    patron =/[.,A-Za-zá-úÑñÁ-Ú\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function validarNumLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla===13) return true; // 3
    patron =/[A-Za-z0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validarNumTelefono(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla===13) return true; // 3
    patron =/[0-9\script]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function hed() { // 1
    header('Location: index.php');
}

function noCampoUser(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false || 
        vacio(F.nomcomp.value)===false || vacio(F.ap.value)===false || vacio(F.clv.value)===false){
        alert("Nombre usuario, contraseñas, nombre completo, apellido paterno y clave no pueden ser vacíos.");
        return false; 
    } else {  
        return true;    
    }
}
function noCampoPasswdNueva(F){
    if( vacio(F.log.value)===false || vacio(F.pass.value)===false || 
        vacio(F.pass1.value)===false || vacio(F.clave.value)===false){
        alert("No puedo haber campos vacíos.");
        return false; 
    } else {  
        return true;    
    }
}