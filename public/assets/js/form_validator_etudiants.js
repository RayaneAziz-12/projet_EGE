var nomValidator = false;
var prenomValidator = false;
var emailValidator = false;
var telephoneValidator = false;

function getName(){
    
}

$("#nom").on("change", function(){
    var nom = this.value;
    console.log("nom: ", nom);
    let nomValide = /^[a-zA-Z ]+$/.test(nom);
    console.log("nomValide: ", nomValide);
    if(!nomValide){
        let nameStatus;
        alert("Veuillez entrer un nom correct svp !");
        document.getElementById("nom").style.border = "1px solid red";
        nameStatus = false;
    }
    else{
        nameStatus = true;
    }
    console.log("nameStatus: ", nameStatus);
    nomValidator = nameStatus;
    this.onForm();
})




function getFirstName(){
    var prenom = document.getElementById("prenom").value;
    console.log("prenom: ", prenom);
    let prenomValide = /^[a-zA-Z ]+$/.test(prenom);
    console.log("prenomValide: ", prenomValide);
    if(!prenomValide){
        let FirstNameStatus;
        alert("Veuillez entrer un prenom correct svp !");
        document.getElementById("prenom").style.border = "1px solid red";
        FirstNameStatus = false;
    }
    else{
        FirstNameStatus = true;
    }
    console.log("FirstNameStatus: ", FirstNameStatus);
    return FirstNameStatus;
}

function getEmail(){
    var email = document.getElementById("email").value;
    console.log("email: ", email);
    var emailReg = new RegExp(/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i);
    var emailValide = emailReg.test(email);
    console.log("emailValide: ", emailValide);
    if(!emailValide){
        let emailStatus;
        alert("Veuillez entrer un email correct svp !");
        document.getElementById("email").style.border = "1px solid red";
    }
    else{
        emailStatus = true;
    }
    console.log("emailStatus: ", emailStatus);
    return emailStatus;
}

function getTelephone(){
    var telephone = document.getElementById("telephone").value;
    console.log("telephone: ", telephone);
    let telephoneValide = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(telephone);
    console.log("telephoneValide: ", telephoneValide);

    if(!telephoneValide){
        let telephoneStatus;
        alert("Veuillez entrer un numero de telephone correct svp !");
        document.getElementById("telephone").style.border = "1px solid red";
    }
    else{
        telephoneStatus = true;
    }
    console.log("telephoneStatus: ", telephoneStatus);
    return telephoneStatus;
}

function getFormValue(event){
    event.preventDefault();
    
    
}

function onForm(){
    if(nomValidator == true && prenomValidator == true && emailValidator == true && telephoneValidator == true){
        $("#submit").prop('disabled', false);
    } else {
        $("#submit").prop('disabled', true);
    }
}