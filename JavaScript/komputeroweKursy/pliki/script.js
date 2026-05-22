function oblicz() {
  wynik.innerText =
    `Kurs odbędzie się w ${miasto.value}. Koszt całkowity: ${((react.checked * 5000) + (javascript.checked * 3000))} zł. Płacisz ${ilRaty.value} rat po ${((react.checked * 5000) + (javascript.checked * 3000)) / ilRaty.value} zł`;
}
