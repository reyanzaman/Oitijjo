
let model = document.getElementById('model');
let name = document.getElementById('prod-name');
let description = document.getElementById('prod-description');
let diameter = document.getElementById('prod-diameter');
let height = document.getElementById('prod-height');
let width = document.getElementById('prod-width');
let price = document.getElementById('prod-price');
let image1 = document.getElementById('prod-img1');
let image2 = document.getElementById('prod-img2');
let image3 = document.getElementById('prod-img3');

model.src = 'assets/' + data.model + '.glb';
model.poster = 'assets/' + data.model + '_h.png'
name.innerHTML = data.name;
description.innerHTML = data.description;

if(data.diameter==0){
    diameter.style.display = 'none';
    width.innerHTML = data.width + ' cm';
}else{
    diameter.innerHTML = data.diameter.toFixed(1) + ' cm';
    width.style.display = 'none';
}

height.innerHTML = data.height.toFixed(1) + ' cm';
price.innerHTML = data.price.toFixed(1) + ' TK';
image1.src = 'assets/' + data.image1 + '.png';
image2.src = 'assets/' + data.image2 + '.png';
image3.src = 'assets/' + data.image3 + '.png';
