
function validName() {
    let nom = document.getElementById('first_name').value;
    let button = document.getElementById('btnDisp');
    let regName = /^[a-zA-Z]{3,30}$/;
    if (regName.test(nom) === false) {
        document.getElementById('first_name').style.border = '3px solid red';
        document.getElementById('first_name').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return1').innerHTML = "Please enter correct first name !";
        document.getElementById('return1').style.color = "red";
        button.disabled = true;
    }
    else {
        document.getElementById('first_name').style.border = '3px solid green';
        document.getElementById('first_name').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return1').innerHTML = "Your first name is valide";
        document.getElementById('return1').style.color = "green";

    }
}

function validPrenom() {
    let prenom = document.getElementById('last_name').value;
    let regName = /^[a-zA-Z]{3,30}$/;
    let button = document.getElementById('btnDisp');

    if (regName.test(prenom) === false) {
        document.getElementById('last_name').style.border = '3px solid red';
        document.getElementById('last_name').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return2').innerHTML = "PLease enter correct last name !";
        document.getElementById('return2').style.color = "red";
        button.disabled = true;

    }
    else {
        document.getElementById('last_name').style.border = '3px solid green';
        document.getElementById('last_name').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return2').innerHTML = "Your last name is valide";
        document.getElementById('return2').style.color = "green";
    }
}

function validTell() {
    let tele = document.getElementById('phone').value;
    let button = document.getElementById('btnDisp');
    let phoneRGEX = /^[0]{0,1}[5-7]{0,1}[0-9]{3}[0-9]{0,1}[0-9]{4}$/;
    let phone = tele.length;
    if (phoneRGEX.test(tele) && phone == 10) {
        document.getElementById('phone').style.border = '3px solid green';
        document.getElementById('phone').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return4').innerHTML = "Your number phone is valide";
        document.getElementById('return4').style.color = "green";

    }
    else {
        document.getElementById('phone').style.border = '3px solid red';
        document.getElementById('phone').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return4').innerHTML = "Please enter correct number phone !";
        document.getElementById('return4').style.color = "red";
        button.disabled = true;


    }
}

function validEmail() {
    let email = document.getElementById('email').value;
    let button = document.getElementById('btnDisp');
    let validRegex = /^[a-zA-Z]+[a-zA-Z-._]+[@]+[a-zA-Z]+\.+(com)$/;

    if (validRegex.test(email)) {
        document.getElementById('email').style.border = '3px solid green';
        document.getElementById('email').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return3').innerHTML = "Your email is valide";
        document.getElementById('return3').style.color = "green";

    }
    else {
        document.getElementById('email').style.border = '3px solid red';
        document.getElementById('email').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return3').innerHTML = "PLease enter correct email !!";
        document.getElementById('return3').style.color = "red";
        button.disabled = true;

    }
}



function passwordReg() {
    let password = document.getElementById('password').value;
    let regexPass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!.%*#?&])[A-Za-z\d@$!.%*#?&]{8,}$/;
    let button = document.getElementById('btnDisp');

    if (regexPass.test(password)) {
        document.getElementById('password').style.border = '3px solid green';
        document.getElementById('password').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return5').innerHTML = "Your password is valide";
        document.getElementById('return5').style.color = "green";

    }
    else {
        document.getElementById('password').style.border = '3px solid red';
        document.getElementById('password').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return5').innerHTML = "Please enter minimum eight characters,at least one letter, one number and one special character";
        document.getElementById('return5').style.color = "red";
        button.disabled = true;

    }
    document.getElementById('validPassword').onkeyup = function () {
        let validPassword = document.getElementById('validPassword').value;
        
        if (validPassword == password) {
            document.getElementById('validPassword').style.border = '3px solid green';
            document.getElementById('validPassword').style.background = 'rgb(130, 246, 130)';
            document.getElementById('return6').innerHTML = "Your password is valide";
            document.getElementById('return6').style.color = "green";
            button.disabled = false;


        }
        else {
            document.getElementById('validPassword').style.border = '3px solid red';
            document.getElementById('validPassword').style.background = 'rgb(248, 147, 147)';
            document.getElementById('return6').innerHTML = "Please enter correct password!";
            document.getElementById('return6').style.color = "red";
            button.disabled = true; 

        }

    }
}








function checkInputs() {
    // Get input elements and submit button element
    const input1 = document.getElementById("first_name");
    const input2 = document.getElementById("last_name");
    const input3 = document.getElementById("phone");
    const input4 = document.getElementById("email");
    const input5 = document.getElementById("password");
    const input6 = document.getElementById("validPassword");

    const btnDisplay = document.getElementById("btnDisp");

    // Check if any input field is empty
    if (input1.value.trim() === "" || input2.value.trim() === "" || input3.value.trim() === "" || input4.value.trim() === "" || input5.value.trim() === "" || input6.value.trim() === "") {
      btnDisplay.disabled = true;
    } else {
      btnDisplay.disabled = true;
    }
}
























