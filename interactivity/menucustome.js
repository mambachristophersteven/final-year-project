const avatar = document.getElementById('user-profile');

const userBox = document.getElementById('user-profile-box');

const closeIcon = document.getElementById('close');

function showBox(){
    userBox.style.display = "flex";
    console.log('helllll')
}

function closeBox(){
    userBox.style.display = "none";
}


avatar.addEventListener('click', showBox);
closeIcon.addEventListener('click', closeBox);


const likeButton = document.getElementById('like');
const likedButton = document.getElementById('liked');

function like(){
    likeButton.style.display = 'none';
    likedButton.style.display = 'flex';
}

function unlike(){
    likedButton.style.display = 'none';
    likeButton.style.display = 'flex';
}

likeButton.addEventListener('click', like);
likedButton.addEventListener('click', unlike);



