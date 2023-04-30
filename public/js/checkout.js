box1 = document.getElementById("opt1");
box2 = document.getElementById("opt2");
box3 = document.getElementById("opt3");

function clickOpt1(event){
    box1.className = "type selected";
    box2.className = "type";
    box3.className = "type";
    document.getElementById("selected_button").value = "Cash";
}

function clickOpt2(event){
    box1.className = "type";
    box2.className = "type selected";
    box3.className = "type";
    document.getElementById("selected_button").value = "Bkash";
}

function clickOpt3(event){
    box1.className = "type";
    box2.className = "type";
    box3.className = "type selected";
    document.getElementById("selected_button").value = "Nagad";
}

function proceed(event){
    ui = document.getElementById("main");
    ui.style.display = "none";
    newUI = document.getElementById("main-2")
    newUI.innerHTML = `
    <h4 style="color:green; text-align: center;">Your order has been successfully placed!</h4>
    <div class="card-actions flex justify-content-center">
        <div>
            <a href="/products" class="button button-secondary">Return to Store</a>
        </div>
        <br><br><br><br>
        <div>
            <a style="margin-left: 10px;" href="/tracking" class="button button-primary">Track Order</a>
        </div>
    </div>
    `;

    var cartData = JSON.parse(localStorage.getItem("cartData"));
    var formData = new FormData();
    formData.append('cartData', JSON.stringify(cartData));
    formData.append('name', document.getElementById('name').value);
    formData.append('address', document.getElementById('address').value);
    formData.append('city', document.getElementById('city').value);
    formData.append('phone', document.getElementById('phone').value);
    formData.append('alt_number', document.getElementById('alt_number').value);
    formData.append('selected_button', document.getElementById("selected_button").value);

    let totalPrice = 0;
    var quantity = {};
    for (var i = 0; i < cartData.length; i++) {
        var item = cartData[i];
        var id = item.id;
        var itemPrice = parseInt(item.price);
        totalPrice = totalPrice + itemPrice;
        if(quantity[id]){
            quantity[id] += 1;
        }else{
            quantity[id] = 1;
        }
    }
    formData.append('quantity', JSON.stringify(Object.entries(quantity)));
    formData.append('totalPrice', totalPrice);

    // Send the form data to the backend using fetch API
    fetch('/order', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    }).then(function(response) {
        var cartItemCountElement = document.getElementById("cartItemCount");
        var cartItemCount = 0;
        cartItemCountElement.innerText = cartItemCount;
        localStorage.setItem("cartItemCount", cartItemCount);
        localStorage.removeItem("cartData");
    }).catch(function(error) {
        console.log("Error has occured!")
    });
}