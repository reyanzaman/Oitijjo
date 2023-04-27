function updateStatus(event) {
    var main = document.getElementById("main");
  
    var id = document.getElementById("orderID").value;
    var errorElement = document.getElementById("error");

    fetch('/status?id=' + encodeURIComponent(id))
      .then(function(response) {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(function(data) {
        main.style.display = "block";
        errorElement.style.display = "none";

        var pending = document.getElementById("pending");
        var processing = document.getElementById("processing");
        var completed = document.getElementById("completed");
        var pending_date = document.getElementById("pending_date");
        var processing_date = document.getElementById("processing_date");
        var completed_date = document.getElementById("completed_date");

        const date = new Date(data.updated_at);
        const readableDate = date.toLocaleDateString();

        if(data.status=="pending"){
            pending.classList = "order-tracking completed";
            processing.classList = "order-tracking";
            completed.classList = "order-tracking";
            pending_date.innerText = readableDate;
            processing_date.innerText = "";
            completed_date.innerText = "";
        }else if(data.status=="processing"){
            pending.classList = "order-tracking completed";
            processing.classList = "order-tracking completed";
            completed.classList = "order-tracking";
            pending_date.innerText = "";
            processing_date.innerText = "readableDate";
            completed_date.innerText = "";
        }else if(data.status=="completed"){
            pending.classList = "order-tracking completed";
            processing.classList = "order-tracking completed";
            completed.classList = "order-tracking completed";
            pending_date.innerText = "";
            processing_date.innerText = "";
            completed_date.innerText = "readableDate";
        }else if(data.status=="cancelled"){
            pending.classList = "order-tracking cancelled";
            processing.classList = "order-tracking cancelled";
            completed.classList = "order-tracking cancelled";
            pending_date.innerText = readableDate;
            processing_date.innerText = "";
            completed_date.innerText = "";
        }
      })
      .catch(function(error) {
        errorElement.style.display = "block";
        main.style.display = "none";
        var errorMsg = document.createElement('h3');
        errorMsg.innerText = 'Order not found!';
        errorMsg.classList = "errorMsg";
        errorElement.appendChild(errorMsg);
      });
}