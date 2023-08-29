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

let quantity = document.getElementById('quantity');
let totalAmount = document.getElementById('total-amount');
let userTotal = document.getElementById('user-total');
let mealPrice = document.getElementById('meal-price').innerHTML;
//console.log(isNAN(mealPrice*quantity));


quantity.addEventListener('keyup', ()=>{
    //let calcu = Number(quantity);
    let totalAmountValue = totalAmount.value.trim();
    let calcu =  quantity.value*mealPrice
    userTotal.innerHTML = calcu;
    totalAmountValue = calcu;
    console.log(totalAmountValue);
})


