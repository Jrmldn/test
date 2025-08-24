const modal = document.getElementById("transactionModal");
const closeBtn = document.getElementsByClassName("close")[0];

function openModal() {
    modal.style.display = "block";
    
    fetch('get_transaction.php')  
        .then(res => res.text())
        .then(html => {
            document.querySelector('.transaction-list').innerHTML = html;
        })
        .catch(() => {
            document.querySelector('.transaction-list').innerHTML = '<p>Error loading transactions</p>';
        });
}

closeBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}