function changeBlock(num) {
  Array.from(document.getElementsByTagName("div")).forEach((element, index) => {element.style.display = (index == num) ? "block" : "none";});
}

let startWidth = 4;
function focusOut(){
  const postep = document.getElementById("postep");
  startWidth+=12;
  postep.style.width = startWidth >= 100 ? "100%" : startWidth + "%";
}

function zatwierdz(){
  const inputs = document.querySelectorAll('input:not([type="button"])');
  console.log(`${inputs[0].value}, ${inputs[1].value}, ${inputs[2].value}, ${inputs[3].value}, ${inputs[4].value}, ${inputs[5].value}, ${inputs[6].value}, ${inputs[7].checked ? "on" : "off"}`)
}
