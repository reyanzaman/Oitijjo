
let model = document.getElementById('model');
let prod_name = document.getElementById('prod-name');
let description = document.getElementById('prod-description');
let dimension = document.getElementById('prod-dimension')
let price = document.getElementById('prod-price');
let stock = document.getElementById('prod-stock');
let image1 = document.getElementById('prod-img1');
let image2 = document.getElementById('prod-img2');
let image3 = document.getElementById('prod-img3');

model.src = 'assets/' + data.model + '.glb';
model.poster = 'assets/' + data.model + '_h.png'

prod_name.innerHTML = data.name;
description.innerHTML = data.description;

price.innerHTML = parseFloat(data.price).toFixed(0) + ' Tk/-';

image1.src = 'assets/' + data.image1 + '.png';
image2.src = 'assets/' + data.image2 + '.png';
image3.src = 'assets/' + data.image3 + '.png';

if(data.height==0.00){
    dimension.innerHTML = 'Dimension: ' + parseFloat(data.length).toFixed(1) + 'cm x ' + parseFloat(data.width).toFixed(1) + 'cm';
}else{
    dimension.innerHTML = 'Dimension: ' + parseFloat(data.length) + 'cm x ' + parseFloat(data.width) + 'cm x ' + parseFloat(data.height) + 'cm';
}

if(data.stock==0){
    stock.innerHTML = "NOT IN STOCK";
}else{
    stock.innerHTML = "IN STOCK";
    stock.style.color = 'green';
}


var images = document.querySelectorAll('.img-fluid');

images.forEach(function (img) {
    img.addEventListener('click', function () {
        // Toggle the class 'enlarge' on the clicked image
        this.classList.toggle('enlarge');
    });
});
