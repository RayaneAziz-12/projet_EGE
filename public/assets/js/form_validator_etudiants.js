var NOMVALIDATOR = false;
var PRENOMVALIDATOR = false;
var EMAILVALIDATOR = false;
var TELVALIDATOR = false;
var SEXVALIDATOR = false;

$("#nom").on("change", function(){
    var nom = this.value;
    let nomValide = /^[a-zA-Z éèêëàâäîïûü-]+$/.test(nom);
    if(!nomValide){
        $("#nom").css('border','1px solid red');
        NOMVALIDATOR = false;
        $('.msgNom').html('Le nom ne peut contenir ni des chiffres, ni des caractères spéciaux');
    }
    else{
        NOMVALIDATOR = true;
        $("#nom").css('border','1px solid green');
        $('.msgNom').html('');
    }
    checkForm();
})

$("#prenom").on("change", function(){
    var prenom = this.value;
    let prenomValide = /^[a-zA-Z éèêëàâäîïûü-]+$/.test(prenom);
    if(!prenomValide){
        $("#prenom").css('border','1px solid red');
        PRENOMVALIDATOR = false;
        $('.msgPrenom').html('Le prénom ne peut contenir ni des chiffres, ni des caractères spéciaux');
    }
    else{
        PRENOMVALIDATOR = true;
        $("#prenom").css('border','1px solid green');
        $('.msgPrenom').html('');
    }
    checkForm();
})

$("#sexe").on("change", function(){
    var sexe = this.value;
    if(sexe === ""){
        $("#sexe").css('border','1px solid red');
        SEXVALIDATOR = false;
        $('.msgSexe').html('Vous devez choisir un sexe');
    }
    else{
        SEXVALIDATOR = true;
        $("#sexe").css('border','1px solid green');
        $('.msgSexe').html('');
    }
    checkForm();
})

$("#email").on("change", function(){
    var email = this.value;
    var emailReg = new RegExp(/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i);
    let emailValide = emailReg.test(email);
    if(!emailValide){
        $("#email").css('border','1px solid red');
        EMAILVALIDATOR = false;
        $('.msgEmail').html('Cet E-mail n\'est pas valide');
    }
    else{
        EMAILVALIDATOR = true;
        $("#email").css('border','1px solid green');
        $('.msgEmail').html('');
    }
    checkForm();
})

$("#telephone").on("change", function(){
    var tel = this.value;
    var telReg = new RegExp(/^[\+]?[0-9]{3}[-\s\.]?[0-9]{2}[-\s\.]?[0-9]{2}[-\s\.]?[0-9]{2}[-\s\.]?[0-9]{2}$/im);
    let telValide = telReg.test(tel);
    if(!telValide){
        $("#telephone").css('border','1px solid red');
        TELVALIDATOR = false;
        $('.msgTel').html('Le numéros de téléphone doit être au format +229 97 97 97 97 ou +229 97-97-97-97');
    }
    else{
        TELVALIDATOR = true;
        $("#telephone").css('border','1px solid green');
        $('.msgTel').html('');
    }
    checkForm();
})

$('#suivant').on('click',function(){
    $(this).prop('disabled',true);
    activeForm2();
    desactiveForm1();
    $("#modifier").show('slow');
    $("#anneeScolaire").trigger('click');
});

$('#modifier').on('click',function(){
    $(this).prop('disabled',true);
    activeForm1();
    desactiveForm2();
    $("#modifier").hide('fast');
    $("#nom").focusin;
});

function checkForm(){
    console.log(NOMVALIDATOR,PRENOMVALIDATOR,EMAILVALIDATOR,TELVALIDATOR,SEXVALIDATOR);
    if(NOMVALIDATOR === true && PRENOMVALIDATOR === true && EMAILVALIDATOR === true && TELVALIDATOR === true && SEXVALIDATOR === true){
        $("#suivant").prop('disabled', false);
    } else {
        $("#suivant").prop('disabled', true);
    }
}

function activeForm2(){
    $("#anneeScolaire").prop('readonly',false);
    $("#formation").prop('readonly',false);
}
function desactiveForm2(){
    $("#anneeScolaire").prop('readonly',true);
    $("#formation").prop('readonly',true);
}

function activeForm1(){
    $("#nom").prop('readonly',false);
    $("#nom").css('border','1px solid green');
    $("#prenom").prop('readonly',false);
    $("#sexe").prop('readonly',false);
    $("#email").prop('readonly',false);
    $("#telephone").prop('readonly',false);
}

function desactiveForm1(){
    $("#nom").prop('readonly',true);
    $("#nom").css('border','0 ');
    $("#nom").css('background-color','white !important');
    $("#prenom").prop('readonly',true);
    $("#sexe").prop('readonly',true);
    $("#email").prop('readonly',true);
    $("#telephone").prop('readonly',true);
}