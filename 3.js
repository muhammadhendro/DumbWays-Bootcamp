function kotak(panjang) {
  let hasil = "";
  for (i = 0; i < panjang; i++) {
    if (i % 2 == 0) {
      for (j = 0; j < panjang; j++) {
        if (j % 2 == 0) {
          hasil += "* ";
        } else {
          hasil += "# ";
        }
      }
    } else {
      for (j = 0; j < panjang; j++) {
        if (j % 2 == 0) {
          hasil += "# ";
        } else {
          hasil += "* ";
        }
      }
    }
    hasil += "\n";
  }
 return hasil;
}
console.log("3. ")
console.log(kotak(5));
