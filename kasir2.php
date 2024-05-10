<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .box {
        text-align: center;
        margin-left: 20rem;
        margin-right: 20rem;
    }
</style>
<body>
    <div class = "box">
    <span style='font-size:100px;'></span>
<h2><b>Transaksi berhasil!</b> &#128722;</h2>
    <?php
    session_start();
echo '<table class="table table-striped table-hover">';
echo '<tr>';
echo '<th>Barang</th>';
echo '<th>Harga</th>';
echo '<th>Jumlah</th>';
echo '<th>Total</th>';
echo'</tr>';

$total = 0;

foreach($_SESSION['kasir'] as $index => $value){
    $barang = $value['barang'];
    $harga = (int)$value['harga'];
    $jumlah = (int)$value['jumlah'];
    $price = $harga*$jumlah;
    echo '<tr>';
    echo '<td>'. $barang .'</td>';
    echo '<td>Rp.'. number_format($harga,0,",",".") .'</td>';
    echo '<td>'. $jumlah .'</td>';
    echo '<td>Rp. '. number_format($price,0,",",".") .'</td>';
    echo '</tr>';
    $total = $total + ($price);
    $_SESSION['total'] = $total;
}
echo '<tr>';
echo '<td colspan="3">Total</td>';
echo '<td> Rp.'. number_format($total ,0,",",".") .'</td>';
echo '</tr>';
echo '</table>';

?>
<p>Terima kasih sudah berbelanja di roymart</p>
    </div>
</body>
</html>
<?php
