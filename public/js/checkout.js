box1 = document.getElementById("opt1");
box2 = document.getElementById("opt2");
box3 = document.getElementById("opt3");

function clickOpt1(event){
    box1.className = "type selected";
    box2.className = "type";
    box3.className = "type";
}

function clickOpt2(event){
    box1.className = "type";
    box2.className = "type selected";
    box3.className = "type";
}

function clickOpt3(event){
    box1.className = "type";
    box2.className = "type";
    box3.className = "type selected";
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

    var cartItemCountElement = document.getElementById("cartItemCount");
    var cartItemCount = 0;
    cartItemCountElement.innerText = cartItemCount;
    localStorage.setItem("cartItemCount", cartItemCount);
    localStorage.removeItem("cartData");
}