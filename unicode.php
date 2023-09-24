<?php 
$start = isset($_POST["nilai"])? $_POST["nilai"] : 128000;
$jumlah = isset($_POST["jumlah"])? $_POST["jumlah"] : 30;
$start = $start < 0 ? 0 : $start;
$jumlah = $jumlah < 0 ? 1 : $jumlah;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <style>

  * { box-sizing: border-box; font-family:Arial; }

  div { text-align:center; }

  .uni {
   min-width: 64px;
   float: left;
   border:1px solid grey;
   border-radius:10px;
   margin: 5px;
  }

  .uni div:nth-child(1) {
   font-size: 2rem;
   margin-bottom: 10px;
   text-align:center;
  }

  mark { padding:0 4px; margin: 10px 0;}
  button { font-weight: bold; }
  </style>
</head>
<body>
<form action="" method="post">
 <label>Kode mulai dari angka :
  <input type="number" name="nilai" id="nilai"  value="<?=$start?>">
 </label>
 <label>Jumlah tampil
  <input type="number" name="jumlah" id="jumlah" value="<?=$jumlah?>" step="10">
 </label>
 <button type="submit">Tampilkan</button>
 --------
 <button onclick="next('-')">&laquo; Sebelumnya</button>
 <button onclick="next('+')">Berikutnya &raquo;</button>
<hr>
Melompat berdasarkan :
 <button onclick="kurangi(10000)">-10.000</button>
 <button onclick="kurangi(1000)">-1000</button>
 <button onclick="kurangi(100)">-100</button>
 <button onclick="kurangi(10)">-10</button>
 -|-
 <button onclick="tambahi(10)">+10</button>
 <button onclick="tambahi(100)">+100</button>
 <button onclick="tambahi(1000)">+1000</button>
 <button onclick="tambahi(10000)">+10.000</button>
 </form>
 <hr>
<?php 

for ($i=$start; $i<$start + $jumlah; $i++) {
 cetak($i);
}


?>
</body>
</html>
<script>
function tambahi(n) {
 nilai.value = parseInt(nilai.value) + n
}
function kurangi(n) {
 if (parseInt(nilai.value) - n > 0)
      nilai.value = parseInt(nilai.value) - n
}
function next(jenis) {
 if (jenis=='+'){
  nilai.value = parseInt(nilai.value) + parseInt(jumlah.value)
 } else
 if (jenis=='-'){
  if (parseInt(nilai.value) - parseInt(jumlah.value) > 0)
    nilai.value = parseInt(nilai.value) - parseInt(jumlah.value)
 }
}
 </script>

<?php 
function cetak($num) {
 $hex = strtoupper(dechex($num));
 $shex = mb_chr($num);
 $name = strtolower(IntlChar::charName($shex));
 echo "<div class='uni'>
  <div>&#$num;</div>
  <div><mark># $num</mark></div>
  <div><mark>#x $hex</mark></div>
  <div><sup>$name</sup></div>

 </div>\n";
}
