const tr = document.getElementsByTagName("tr");
let id = 0;

function braki() {
  for(let i = 1; i < tr.length;i++){
    const komorka = tr[i].getElementsByTagName("td")[2];
    if(komorka.innerText == 0) komorka.style.backgroundColor = "red";
    else if(komorka.innerText >= 1 && komorka.innerText <= 5) komorka.style.backgroundColor = "yellow";
    else komorka.style.backgroundColor = "Honeydew";
  }
}

function aktualizuj(num) {
  tr[num].getElementsByTagName("td")[2].innerText = prompt("Podaj nowa liczbe: ");
  braki();
}

function zamow(num){
  alert(`Zamówienie nr: ${++id} Produkt: ${tr[num].firstElementChild.innerText}`);
}

braki();
