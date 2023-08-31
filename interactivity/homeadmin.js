const avatar = document.getElementById('user-profile');
const userBox = document.getElementById('user-profile-box');
const closeIcon = document.getElementById('close');

function showBox(){
    userBox.style.display = "flex";
}

function closeBox(){
    userBox.style.display = "none";
}


avatar.addEventListener('click', showBox);
closeIcon.addEventListener('click', closeBox);
