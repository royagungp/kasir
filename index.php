<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    h2 {
        text-align: center;
    }
</style>
<body>
    <div class= container>
        <h2>Masukan Data Barang</h2>
    <form action="" method="post">
    <input class="form-control" type="text" name="barang" id="barang" placeholder="Masukan Item" aria-label="default input example" required>
    <input class="form-control" type="number" name="harga" id="harga" placeholder="Masukan Harga" aria-label="default input example" required>
    <input class="form-control" type="number" name="jumlah" id="jumlah" placeholder="Masukan Jumlah" aria-label="default input example" required>
    <button class="btn btn-primary" type="submit">Tambah</button>
    <a class="btn btn-primary" href='kasir2.php' role="button">Bayar</a>
    </form>

    <?php

session_start();


if(!isset($_SESSION['kasir'])) {
    $_SESSION['kasir']= array();
}

if(isset($_POST['barang']) && isset($_POST['harga']) && isset($_POST['jumlah'])){
    $data = array(
        'barang' => $_POST['barang'],
        'harga' => $_POST['harga'],
        'jumlah' => $_POST['jumlah']
    );
    array_push($_SESSION['kasir'], $data);
}

if(isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['kasir'][$index]);
    //kembali ke hal awal
    header('Location: http://localhost/kasir/index.php');
    exit;
}
// var_dump($_SESSION['kasir']);

echo '<table class="table table-striped table-hover">';
echo '<tr>';
echo '<th>Barang</th>';
echo '<th>Harga</th>';
echo '<th>Jumlah</th>';
echo '<th>Total</th>';
echo '<th>Action</th>';
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
    echo '<td><a href="?hapus='.$index.'"><button type="button" class="btn btn-danger">Hapus</button></a></td>';
    echo '</tr>';
     $total = $total + ($price);
     $_SESSION['total'] = $total;
}
    echo '<tr>';
    echo '<td colspan="4">Total</td>';
    echo '<td> Rp.'. number_format($total ,0,",",".") .'</td>';
    echo '</tr>';
    echo '<table/>';


?>
</body>
</html>