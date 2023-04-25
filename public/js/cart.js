document.addEventListener("DOMContentLoaded", function(event) { 
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = localStorage.getItem('cartItemCount');
    if (cartItemCount) {
    cartItemCountElement.innerText = cartItemCount;
    }
});

function addToCart() {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    cartItemCount++;
    cartItemCountElement.innerText = cartItemCount;
    localStorage.setItem('cartItemCount', cartItemCount);
}