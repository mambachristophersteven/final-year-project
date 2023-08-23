const form = document.getElementById('form');
const email = document.getElementById('email');
const username = document.getElementById('username');
const password = document.getElementById('password');

const boxTitle = document.getElementById('boxTitle');

const listener = function(e){
    console.log('submit clicked');
    e.preventDefault();
    checkInputs();
}

form.addEventListener('submit', listener);

const checkInputs = function(){
    const emailValue = email.value.trim();
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    //console.log(passwordValue.length)

    
    
    if(passwordValue.length <= 4){
        setErrorFor(password, 'Password should be more than 4 characters!');
    }
    else{
        setSuccessFor(password);
    }
    if(passwordValue === ''){
        setErrorFor(password, 'Enter a password!');
    }
    else{
        setSuccessFor(password);
    }
    if(usernameValue === ''){
        setErrorFor(username, 'Enter a username!');
    }
    else{
        setSuccessFor(username);
    }
    if(emailValue === ''){
        setErrorFor(email, 'Enter your email!');
    }
    else{
        setSuccessFor(email);
    }

    if(emailValue != '' && usernameValue != '' && passwordValue != '' && passwordValue.length > 4){
        boxTitle.innerText = 'All input fields validated!';
        boxTitle.classList.remove('error');
        boxTitle.style.color ='#2ecc71';
        form.removeEventListener('submit', listener)
    }
}


function setErrorFor(input, message){
    boxTitle.innerText = message;
    boxTitle.style.textAlign = "center";
    boxTitle.style.color = "#e74c3c";
    input.style.border = "2px solid #e74c3c";
}

function setSuccessFor(input){
    input.style.border = "2px solid #2ecc71";
}