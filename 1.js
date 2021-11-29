let deposito = 350000000;
let obligasi = 195000000;
let sahamA = 227500000;
let sahamB = 227500000;

// modalAkhir = modalAwal (1 + persenBunga ) pangkat jumlahTahun
// modalAkhir = modalAwal (1 + 3.5 /100 ) pangkat jumlahTahun
let totalDeposito = deposito * Math.pow(1.035, 3);
let totalObligasi = obligasi * Math.pow(1.13, 3);
let totalSahamA = sahamA * Math.pow(1.145, 3);
let totalSahamB = sahamB * Math.pow(1.125, 3);

let totalInvest = totalDeposito + totalObligasi + totalSahamA + totalSahamB;
console.log("1. Total Uang Investor: " + Math.floor(totalInvest));
