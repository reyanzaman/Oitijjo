
let model = document.getElementById('model');
let prod_name = document.getElementById('prod-name');
let description = document.getElementById('prod-description');
let dimension = document.getElementById('prod-dimension')
let price = document.getElementById('prod-price');
let stock = document.getElementById('prod-stock');
let image1 = document.getElementById('prod-img1');
let image2 = document.getElementById('prod-img2');
let image3 = document.getElementById('prod-img3');
let button = document.getElementById('cart-btn');
let seller = document.getElementById('seller')

model.src = 'assets/' + data.model + '.glb';
model.poster = 'assets/' + data.model + '_h.png'

prod_name.innerHTML = data.name;
description.innerHTML = data.description;

price.innerHTML = parseFloat(data.price).toFixed(0) + ' Tk/-';

image1.src = 'assets/' + data.image1 + '.png';
image2.src = 'assets/' + data.image2 + '.png';
image3.src = 'assets/' + data.image3 + '.png';

if(data.height==0.00){
    dimension.innerHTML = 'Dimension: ' + parseFloat(data.length).toFixed(2) + ' x ' + parseFloat(data.width).toFixed(2) + ' cm';
}else{
    dimension.innerHTML = 'Dimension: ' + parseFloat(data.length).toFixed(2) + ' x ' + parseFloat(data.width).toFixed(2) + ' x ' + parseFloat(data.height).toFixed(2) + ' cm';
}

if(data.stock == 0){
    stock.innerHTML = "NOT IN STOCK";
    button.innerHTML = "Unavailable"
    button.className = "btn btn-outline-secondary btn-lg buy-btn disabled"
}else{
    stock.innerHTML = "IN STOCK";
    stock.style.color = 'green';
}

var seller_id = data.seller_id;
getSeller(seller_id)
  .then(function(seller_name) {
    seller.innerHTML = seller_name;
  })
  .catch(function(error) {
    console.error(error);
  });


var images = document.querySelectorAll('.img-fluid');

images.forEach(function (img) {
    img.addEventListener('click', function () {
        // Toggle the class 'enlarge' on the clicked image
        this.classList.toggle('enlarge');
    });
});

async function getSeller(seller_id) {
    try {
        const response = await fetch(`/sellerDetails/${seller_id}`);
        const seller = await response.json();
        return seller.name;
    } catch (error) {
        console.error(error);
    }
}