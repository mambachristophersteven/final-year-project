console.log('heyyyyy');

const likeButton = document.getElementById('like');
const likedButton = document.getElementById('liked');

likeButton.addEventListener('click', function(){
    likeButton.style.display = "none"
    likedButton.style.display = "flex"
})

likedButton.addEventListener('click', function(){
    likedButton.style.display = "none"
    likeButton.style.display = "flex"
})

const rlikeButton = document.getElementById('rlike');
const rlikedButton = document.getElementById('rliked');

rlikeButton.addEventListener('click', function(){
    rlikeButton.style.display = "none"
    rlikedButton.style.display = "flex"
})

rlikedButton.addEventListener('click', function(){
    rlikedButton.style.display = "none"
    rlikeButton.style.display = "flex"
})

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