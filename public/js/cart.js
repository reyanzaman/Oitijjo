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
                  <input type="text" class="qty" placeholder="1" value="1" disabled/> x <p class="singlePrice">${item.price}</p>
                </p>
              </div>
              <div class="prodTotal cartSection">
                <p class="itemPrice">৳ ${Math.round(item.price)}</p>
              </div>
              <div class="cartSection removeWrap">
                <a href="#" onclick="updateFromCart(event, '-')" class="remove">-</a>              
                <a href="#" onclick="updateFromCart(event, '+')" class="add">+</a>
              </div>
            </div>`;
          if(cartItemList){
            cartItemList.appendChild(li);
            counts[id] = 1;
          }
        }
      }
    }
  }  

function addToCart() {
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);
    cartItemCount++;
    cartItemCountElement.innerText = cartItemCount;

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

function updateFromCart(event, op) {
    event.preventDefault();
    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = parseInt(cartItemCountElement.innerText);

    var li = $(event.target).closest("li");
    var qtyElement = li.find(".qty");
    var qty = parseInt(qtyElement.val());
    if(op=="+"){
      cartItemCount++;
      cartItemCountElement.innerText = cartItemCount;
      qty++;
    }else{
      cartItemCount--;
      cartItemCountElement.innerText = cartItemCount;
      qty--;
    }
    qtyElement.val(qty);

    var priceElement = li.find(".itemPrice");
    var singlePriceElement = li.find(".singlePrice");
    if(op=="+"){
      newPrice = parseInt(priceElement.text().substring(2)) + parseInt(singlePriceElement.text());
    }else{
      newPrice = parseInt(priceElement.text().substring(2)) - parseInt(singlePriceElement.text());
    }
    priceElement.text("৳ " + newPrice)

    // Remove product from cartData in local storage
    var cartData = JSON.parse(localStorage.getItem("cartData"));
    var productId = li.find(".itemNumber").text().replace(/^#0+/, '');
    console.log(productId);
    var productIndex = -1;
    for(var i = 0; i < cartData.length; i++) {
      if (cartData[i].id == productId) {
          productIndex = i;
          break;
      }
    }
    if(productIndex > -1 && op=="-") {
      cartData.splice(productIndex, 1);
      localStorage.setItem("cartData", JSON.stringify(cartData));
    }else if(productIndex > -1 && op=="+"){
      var item = {
        id: cartData[productIndex].id,
        image: cartData[productIndex].model + "_h.png",
        name: cartData[productIndex].name,
        price: cartData[productIndex].price,
      };
      cartData.push(item);
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
