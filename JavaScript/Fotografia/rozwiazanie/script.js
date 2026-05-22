function dodaj() {
  const el = document.createElement("div");
  el.innerHTML = `<img src="./${plik.files[0].name}"> <p>Liczba kopii: ${kopii.value}</p><p>Cena: ${kopii.value * (blyszczoncy.checked ? 1.5 : 2)}</p>`;
  koszyk.appendChild(el);
}
