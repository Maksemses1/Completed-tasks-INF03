const odpKrzysztofa = [
  "Świetnie!",
  "Kto gra główną rolę?",
  "Lubisz filmy Tego reżysera?",
  "Będę 10 minut wcześniej",
  "Może kupimy sobie popcorn?",
  "Ja wolę Colę",
  "Zaproszę jeszcze Grześka",
  "Tydzień temu też byłem w kinie na Diunie",
  "Ja funduję bilety"
];

function sendMessage() {
    generateMessage("j", messageF.value, "./Jolka.jpg");
}

function losowaOdpowidz() {
   generateMessage("k", odpKrzysztofa[Math.floor(Math.random()*odpKrzysztofa.length)], "./Krzysiek.jpg");
}

function generateMessage(user, text, png){
  let element = document.createElement("div");
  element.classList.add("message-"+user);
  element.innerHTML = "<img src='"+png+"' alt=''><p>"+text+"</p>";
  chat.appendChild(element);
  element.scrollIntoView()
}
