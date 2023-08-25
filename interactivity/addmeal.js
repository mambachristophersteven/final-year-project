let imageInput = document.querySelector("#image");
let wrapper = document.querySelector(".wrapper");
imageInput.onchange = function(e){
    if(e.target.files.length > 0){
        src= URL.createObjectURL(e.target.files[0]);
        image = document.querySelector(".wrapper label img");
        image.src=src;
        image.style.width = "70px"
        wrapper = document.querySelector(".wrapper");
        wrapper.style.background = "#fff";
        wrapper.style.width = "#80%";
        wrapper.style.height = "90px";
        wrapper.style.border = "none";
    }
}



const form = document.getElementById('form');
const name1 = document.getElementById('name');
const price = document.getElementById('price');
const category = document.getElementById('category');
const description = document.getElementById('description');
const ingredient1 = document.getElementById('ingredient1');
const ingredient2 = document.getElementById('ingredient2');
const ingredient3 = document.getElementById('ingredient3');
const ingredient4 = document.getElementById('ingredient4');

const boxTitle = document.getElementById('error');

const listener = function(e){
    console.log('submit clicked');
    e.preventDefault();
    checkInputs();
}

form.addEventListener('submit', listener);

const checkInputs = function(){
    const nameValue = name1.value.trim();
    const priceValue = price.value.trim();
    const categoryValue = category.value.trim();
    const descriptionValue = description.value.trim();
    const ingredient1Value = ingredient1.value.trim();
    const ingredient2Value = ingredient2.value.trim();
    const ingredient3Value = ingredient3.value.trim();
    const ingredient4Value = ingredient4.value.trim();

    if(ingredient4Value === ''){
        setErrorFor(ingredient4, 'Enter ingredient!');
    }
    else{
        setSuccessFor(ingredient4);
    }
    if(ingredient3Value === ''){
        setErrorFor(ingredient3, 'Enter ingredient!');
    }
    else{
        setSuccessFor(ingredient3);
    }
    if(ingredient2Value === ''){
        setErrorFor(ingredient2, 'Enter ingredient!');
    }
    else{
        setSuccessFor(ingredient2);
    }
    if(ingredient1Value === ''){
        setErrorFor(ingredient1, 'Enter ingredient!');
    }
    else{
        setSuccessFor(ingredient1);
    }
    if(categoryValue === ''){
        setErrorFor(category, 'Enter category of meal!');
    }
    else{
        setSuccessFor(category);
    }
    if(descriptionValue === ''){
        setErrorFor(description, 'Enter description!');
    }
    else{
        setSuccessFor(description);
    }
    if(priceValue === ''){
        setErrorFor(price, 'Enter price of meal!');
    }
    else{
        setSuccessFor(price);
    }
    if(nameValue === ''){
        setErrorFor(name1, 'Enter name of meal!');
    }
    else{
        setSuccessFor(name1);
    }
    if(imageInput.value===''){
        wrapper.style.border = "2px solid #e74c3c";
        boxTitle.innerText = "Select image of meal";
    }
    else{
        wrapper.style.border = "none";
    }
    if(nameValue != '' && priceValue != '' && descriptionValue != ''  && categoryValue != ''  && ingredient1Value != ''  && ingredient2Value != ''  && ingredient3Value != ''  && ingredient4Value != ''){
        boxTitle.innerText = 'All input fields validated!';
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