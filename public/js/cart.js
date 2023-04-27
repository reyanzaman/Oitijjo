document.addEventListener("DOMContentLoaded", function (event) {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = localStorage.getItem("cartItemCount");
    if (cartItemCount) {
        cartItemCountElement.innerText = cartItemCount;
    }

    var cartData = JSON.parse(localStorage.getItem("cartData")) || [];
    generateCartItemsHTML(cartData);
    calculateCartCost(cartData);
});

function generateCartItemsHTML(cartData) {
    var cartItemList = document.getElementById("cartItemList");

    if(cartData.length == 0) {
      var li = document.createElement("li");
      li.innerHTML = `<br><h4 style="color: grey; text-align: center;">Cart Empty</h4>`;
      if(cartItemList){
        cartItemList.appendChild(li);
      }
    }else{
      var counts = {};
      for (var i = 0; i < cartData.length; i++) {
        var item = cartData[i];
        var id = item.id;
        if (counts[id]) {
          var qtyInput = cartItemList.querySelector(`li[id="${id}"] .qty`);
          qtyInput.value = parseInt(qtyInput.value) + 1;

          var totalPrice = cartItemList.querySelector(`li[id="${id}"] .itemPrice`);
          intPrice = parseInt(totalPrice.textContent.substring(2));
          intPrice = intPrice + parseInt(item.price);
          totalPrice.textContent = "৳ " + intPrice;
        } else {
          var li = document.createElement("li");
          li.classList.add("items", "odd");
          li.setAttribute("id", id);
          li.innerHTML = `
            <div class="infoWrap">
              <div class="cartSection">
                <img src="assets/${item.image}" alt="product_image" class="itemImg" />
                <p class="itemNumber">#${id.toString().padStart(8,'0')}</p>
                <h3>${item.name}</h3>
                <p>
                  <input type="text" class="qty" placeholder="1" value="1" /> x <p class="singlePrice">${item.price}</p>
                </p>
              </div>
              <div class="prodTotal cartSection">
                <p class="itemPrice">৳ ${Math.round(item.price)}</p>
              </div>
              <div class="cartSection removeWrap">
                <a href="#" onclick="removeFromCart(event)" class="remove">x</a>
              </div>
            </div>`;
          if(cartItemList){
            cartItemList.appendChild(li);
            counts[id] = 1;
          }
        }
        var qtyInput = li.querySelector(".qty");
        qtyInput.addEventListener("input", function(event) {
          updateCart(event.target.value, id, item.price);
        });
      }
    }
  }  

function addToCart() {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    cartItemCount++;
    cartItemCountElement.innerText = cartItemCount;

    // Get item data from the page
    let stock = document.getElementById("prod-stock");

    // Create an object with item data
    var item = {
        id: data.id,
        image: data.model + "_h.png",
        name: data.name,
        price: data.price,
    };

    var cartData = JSON.parse(localStorage.getItem("cartData")) || [];
    cartData.push(item);

    localStorage.setItem("cartData", JSON.stringify(cartData));
    localStorage.setItem("cartItemCount", cartItemCount);
}

function removeFromCart(event) {
    event.preventDefault();
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    cartItemCount--;
    cartItemCountElement.innerText = cartItemCount;

    var li = $(event.target).closest("li");
    var qtyElement = li.find(".qty");
    var qty = parseInt(qtyElement.val());
    qty--;
    qtyElement.val(qty);

    var priceElement = li.find(".itemPrice");
    var singlePriceElement = li.find(".singlePrice");
    newPrice = parseInt(priceElement.text().substring(2)) - parseInt(singlePriceElement.text());
    priceElement.text("৳ " + newPrice)

    // Remove product from cartData in local storage
    var cartData = JSON.parse(localStorage.getItem("cartData"));
    var productId = li.find(".itemNumber").text().substring(1);
    var productIndex = -1;
    for(var i = 0; i < cartData.length; i++) {
        if (cartData[i].id == productId) {
            productIndex = i;
            break;
        }
    }
    if(productIndex > -1) {
        cartData.splice(productIndex, 1);
        localStorage.setItem("cartData", JSON.stringify(cartData));
    }

    if(qty==0){
        $(event.target).parent().parent().parent().hide();
    }

    localStorage.setItem("cartItemCount", cartItemCount);
    calculateCartCost(cartData);

    var cartData = JSON.parse(localStorage.getItem("cartData"));
    var cartItemList = document.getElementById("cartItemList");
    if(cartData.length == 0) {
      var li = document.createElement("li");
      li.innerHTML = `<br><h4 style="color: grey; text-align: center;">Cart Empty</h4>`;
      cartItemList.appendChild(li);
    }
}

function calculateCartCost(cartData) {
    var totalCost = 0;

    for (var i = 0; i < cartData.length; i++) {
      var cost = parseInt(cartData[i]['price']);
      totalCost = totalCost + cost;
    }

    subtotal = document.getElementById("subtotal");
    shipping = document.getElementById("shipping");
    total = document.getElementById("total");
    checkout_btn = document.getElementById("checkout-btn");

    if(subtotal){
      subtotal.innerHTML = "৳ " + totalCost;
      if(totalCost!=0){
        var shippingCost = 50;
      }else{
        var shippingCost = 0;
        checkout_btn.classList = "btn checkout continue disabled";
      }

      shipping.innerHTML = "৳ " + shippingCost;
      total.innerHTML = "৳ " + (shippingCost + totalCost);
  }
}

function updateCart(qty, itemID, price){
  var li = document.getElementById(itemID);
  if(li){
    var newPrice = qty * price;
    var itemPriceElement = li.querySelector(".itemPrice");
    itemPriceElement.textContent = "৳ " + Math.round(newPrice);

    var cartData = JSON.parse(localStorage.getItem("cartData"));
    var quantity = 0;
    for(var i = 0; i < cartData.length; i++) {
      if (cartData[i].id == itemID) {
          quantity++;
      }
    }

    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    if(quantity>qty){
      //Remove (quantity - qty) elements from cartData
      for(var i = 0; i < cartData.length; i++) {
        if (cartData[i].id == itemID && quantity>qty) {
          cartData.splice(i, 1);
          quantity--;
          cartItemCount = quantity;
        }
      }
    }else{
      //Add (qty - quantity) elements to cartData with the same details and everything as the product with itemID
      var item = cartData.find(item => item.id === itemID);
      for (var i = quantity; i < qty; i++) {
        cartData.push(Object.assign({}, item));
        cartItemCount++;
      }
    }
    cartItemCountElement.innerText = cartItemCount; 
    localStorage.setItem("cartItemCount", cartItemCount);
    localStorage.setItem("cartData", JSON.stringify(cartData));
    calculateCartCost(cartData); 
  }
}
