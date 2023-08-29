const likeButton = document.getElementById('like');
const likedButton = document.getElementById('liked');


likeButton.addEventListener('click', ()=>{
    likeButton.style.display = 'none'
    likedButton.style.display = 'flex'
})
likedButton.addEventListener('click', ()=>{
    likedButton.style.display = 'none'
    likeButton.style.display = 'flex'
})

// let quantityContent = document.getElementById('quantity');

// let quantity = document.getElementById('quantity').value;
// let mealPrice = document.getElementById('meal-price').innerHTML;
// let totalAmount = document.getElementById('total-amount').value;
// const reduceButton = document.getElementById('reduce')
// const increaseButton = document.getElementById('increase')
// quantity = 7;
// reduceButton.addEventListener('click', ()=>{
//     if(quantity === 0){
//         quantity = 0
//     }else{
//         quantity = quantity-1;
//     }
//     console.log(quantity);
//     quantityContent = quantity;
//     quantity.setAttribute('value', quantity)
// })
// let calculatedTotal = quantity*mealPrice;
// totalAmount = calculatedTotal;
// console.log(totalAmount);

const quantity = document.getElementById('quantity');
const totalAmount = document.getElementById('total-amount');
const userTotal = document.getElementById('user-total');
const mealPrice = document.getElementById('meal-price').innerHTML;
const submitButton = document.getElementById('submit');
//console.log(isNAN(mealPrice*quantity));


quantity.addEventListener('keyup', ()=>{
    //let calcu = Number(quantity);
    let totalAmountValue = totalAmount.value.trim();
    let calcu =  quantity.value*mealPrice
    userTotal.innerHTML = calcu;
    totalAmountValue = calcu;
    console.log(totalAmountValue);
})


const form = document.getElementById('form');
const listener = function(e){
    console.log('submit clicked');
    e.preventDefault();
    checkInputs();
}

form.addEventListener('submit', listener);

const checkInputs = function(){
    const quantityValue = quantity.value.trim();

    
    
    if(quantityValue === ''){
        setErrorFor(quantity, 'Enter a password!');
    }
    else{
        setSuccessFor(quantity);
    }
    if(quantityValue != ''){
        submitButton.value = "Add to Cart"
        submitButton.style.background = "black"
        submitButton.style.color = "white"
        form.removeEventListener('submit', listener)
    }
}


function setErrorFor(input, message){
    input.style.border = "2px solid #e74c3c";
}

function setSuccessFor(input){
    input.style.border = "2px solid #2ecc71";
}