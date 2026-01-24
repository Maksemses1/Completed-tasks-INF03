function wykonane(el) {
  el.parentNode.style.textDecoration = "line-through";
}

function dodajZadanie(){
  ul.innerHTML = "<li>"+zadanie.value + "<input type='button' value='Wykonane' onclick='wykonane(this)'>"+"</li>" + ul.innerHTML;
}
