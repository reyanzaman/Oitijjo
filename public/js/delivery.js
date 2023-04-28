var active = "pending";

var pending = document.getElementById("pending");
var processing = document.getElementById("processing");
var completed = document.getElementById("completed");
var cancelled = document.getElementById("cancelled");

function handleButtonClick(button) {
    button.classList.add("active");
    if(button.id=="pending"){
        processing.classList.remove("active");
        completed.classList.remove("active");
        cancelled.classList.remove("active");
        active = "pending";
    }else if(button.id=="processing"){
        pending.classList.remove("active");
        completed.classList.remove("active");
        cancelled.classList.remove("active");
        active = "processing";
    }else if(button.id=="completed"){
        processing.classList.remove("active");
        pending.classList.remove("active");
        cancelled.classList.remove("active");
        active = "completed";
    }else if(button.id=="cancelled"){
        processing.classList.remove("active");
        completed.classList.remove("active");
        pending.classList.remove("active");
        active = "cancelled";
    }
}

function updateStatus(event){
    var id = document.getElementById("orderID").value;
    var output = document.getElementById("output");

    fetch('/deliveryStatus', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: 'id=' + encodeURIComponent(id) + '&status=' + encodeURIComponent(active)
      })
      .then(function(response) {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(function() {
        while (output.firstChild) {
            output.removeChild(output.firstChild);
        }
        var outputMsg = document.createElement("h3");
        outputMsg.innerText = "Order status updated to " + active;
        outputMsg.classList = "outputMsg";
        output.appendChild(outputMsg);
      })
      .catch(function(error) {
        console.log(error);
        while (output.firstChild) {
            output.removeChild(output.firstChild);
        }
        var errorMsg = document.createElement('h3');
        errorMsg.innerText = 'Order not found!';
        errorMsg.classList = "errorMsg";
        output.appendChild(errorMsg);
      });
}