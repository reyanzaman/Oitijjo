document.addEventListener("DOMContentLoaded", function (event) {
    fetch('/productDetails', {
        method: 'GET'
      })
      .then(function(response) {
        response.json().then(function(products) {
            generateProducts(products);
        });
      })
      .catch(function(error) {
        console.log(error);
      });
});

async function generateProducts(products) {
    var locID1 = document.getElementById("homeDIV");
    var locID2 = document.getElementById("productDIV");
    var loopTimes = 0;
    var targetID = "";
    if(locID2!=null){
        targetID = locID2;
        loopTimes = Math.round(products.length / 4)+1;
    }else if(locID1!=null){
        targetID = locID1;
        loopTimes = 2;
    }

    console.log(loopTimes);
    var counter = -1;

    for(var i=0; i<loopTimes; i++){
        var row = document.createElement("div");
        row.classList.add("row", "align-items-center");
        targetID.appendChild(row);

        for(var j=0; j<4; j++){
            counter++;

            var col = document.createElement("div");
            col.classList.add("col-lg-3", "col-md-6", "col-sm-12")
            row.appendChild(col);

            if(products[counter]){
                var seller_id = products[counter].seller_id;
                var seller = await getSeller(seller_id);

                let baseUrl = 'http://127.0.0.1:8000/item';
                let url = `${baseUrl}?id=${products[counter].id}`;

                col.innerHTML = `
                    <model-viewer class="viewer" src="assets/${products[counter].model}.glb"
                    ar autoplay poster="assets/${products[counter].model}_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"
                    ></model-viewer>
                    <a href="${url}">
                        <h5 class="product-text">${products[counter].name}</h5>
                    </a>
                    <h6 class="seller">${seller}</h6>
                    <h5 class="small-price-text">
                        <bold>${Math.round(products[counter].price)}tk/-</bold>
                    </h5>
                `;
            }
        }
    }
}

async function getSeller(seller_id) {
    try {
        const response = await fetch(`/sellerDetails/${seller_id}`);
        const seller = await response.json();
        return seller.name;
    } catch (error) {
        console.error(error);
    }
}

