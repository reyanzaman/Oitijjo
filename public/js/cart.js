document.addEventListener("DOMContentLoaded", function (event) {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = localStorage.getItem("cartItemCount");
    if (cartItemCount) {
        cartItemCountElement.innerText = cartItemCount;
    }
});

function addToCart() {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    cartItemCount++;
    cartItemCountElement.innerText = cartItemCount;

    // Get item data from the page
    var model = document.getElementById("model").textContent;
    var name = document.getElementById("prod-name").textContent;
    var description = document.getElementById("prod-description").textContent;
    var dimension = document.getElementById("prod-dimension").textContent;
    var price = document.getElementById("prod-price").textContent;
    var image1 = document.getElementById("prod-img1").src;
    var image2 = document.getElementById("prod-img2").src;
    var image3 = document.getElementById("prod-img3").src;

    // Create an object with item data
    var item = {
        model: model,
        name: name,
        description: description,
        dimension: dimension,
        price: price,
        image1: image1,
        image2: image2,
        image3: image3,
    };

    var cartData = JSON.parse(localStorage.getItem("cartData")) || [];
    cartData.push(item);

    localStorage.setItem("cartData", JSON.stringify(cartData));
    localStorage.setItem("cartItemCount", cartItemCount);
}

function displayCart() {
    var cartData = JSON.parse(localStorage.getItem("cartData")) || [];

    var cartContainer = document.getElementById("cartContainer");
    cartContainer.innerHTML = "";

    cartData.forEach(function (item) {
        var itemContainer = document.createElement("div");
        itemContainer.classList.add("cart-item");

        var image = document.createElement("img");
        image.src = item.image1;
        itemContainer.appendChild(image);

        var name = document.createElement("h3");
        name.textContent = item.name;
        itemContainer.appendChild(name);

        var price = document.createElement("p");
        price.textContent = item.price;
        itemContainer.appendChild(price);

        cartContainer.appendChild(itemContainer);
    });
}

function removeFromCart(event){
    event.preventDefault();
    $(event.target).parent().parent().parent().hide();
}
