let angka = [2, 7, 3, 1, 2, 8, 17, 10];

// let newAngka = [];
// for (i = 0; i < angka.length; i++) {
//   for (j = 0; j < angka.length; j++) {
//     if (angka[i] < angka[j]) {
//       temp = angka[i];
//       angka[i] = angka[j];
//       angka[j] = temp;
//     }
//   }
// }

angka.sort((a, b) => a - b);


var v1 = []; // to insert even values
var v2 = []; // to insert odd values

for (var i = 0; i < angka.length; i++)
  if (angka[i] % 2 == 0) v1.push(angka[i]);
  else v2.push(angka[i]);
var index = 0,
  i = 0,
  j = 0;

var flag = false;
while (index < angka.length) {
  // If first element is even
  if (flag == true) {
    angka[index++] = v1[i++];
    flag = !flag;
  }

  // Else, first element is Odd
  else {
    angka[index++] = v2[j++];
    flag = !flag;
  }
}
console.log("2. " + angka);
