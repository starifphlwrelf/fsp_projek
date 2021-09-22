<?php
require 'function.php';

session_start();


var_dump( $_SESSION['jawaban']);
$totalData = count(query("SELECT * FROM `soal`"));
$jumlahDataPerHalaman = 2;
$jumlahHalaman = ceil($totalData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
echo $awalData;



$prd1 = query("SELECT * FROM `soal` LIMIT $awalData,$jumlahDataPerHalaman;");

$prd2 = query("SELECT * FROM soal INNER JOIN jawaban ON soal.idsoal = jawaban.idsoal WHERE soal.idsoal = $i;");

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<form action="next.php" method="post" id="theForm">
<?php 
$i = 0;
foreach ($prd1 as $product) :

    $i++;

    $prd2 = query("SELECT * FROM soal INNER JOIN jawaban ON soal.idsoal = jawaban.idsoal WHERE soal.idsoal = $i;");

?>

        <div class="col-6">

<div class="card" style="width: 30rem;">
    <div class="card-body">
        <!-- <h5 class="card-title"><?= $product['idsoal']; ?> </h5> -->
        <p class="card-text">Nomor: <?= $product['nomor']; ?></p>
        <p class="card-text">Pertanyaan: <?= $product['pertanyaan']; ?></p>
        <p class="card-text">Jawaban:
            <?php
                $prd2 = query("SELECT * FROM soal INNER JOIN jawaban ON soal.idsoal = jawaban.idsoal WHERE soal.idsoal = $i;");

                $freq = [];
                $number = rand(0, 3);
                $times = 4;
                while ($times-- > 0) {
                    while (in_array($number, $freq)) $number = rand(0, 3);
                    $freq[] = $number;
                }

                ?>
        <div class="form-check">
            <label><input nosoal="<?= $i ?>" class="form-check-input" type='radio'
                name='jawaban<?= $product['nomor'] ?>' id="flexRadioDefault1" 
                value='<?= $prd2[$freq[0]]["isi_jawaban"] ?>'>
            <label class="form-check-label" for="flexRadioDefault1">
                <?php
                    echo $prd2[$freq[0]]["isi_jawaban"];
                    ?>
            </label>
        </div>

        <div class="form-check">
            <label><input nosoal="<?= $i ?>" class="form-check-input" type='radio'
                name='jawaban<?= $product['nomor'] ?>' id="flexRadioDefault1" 
                value='<?= $prd2[$freq[1]]["isi_jawaban"] ?>'>
            <label class="form-check-label" for="flexRadioDefault1">
                <?php
                    echo $prd2[$freq[1]]["isi_jawaban"];
                    ?>
            </label>
        </div>

        <div class="form-check">
            <label><input nosoal="<?= $i ?>" class="form-check-input" type='radio'
                name='jawaban<?= $product['nomor'] ?>' id="flexRadioDefault1" 
                value='<?= $prd2[$freq[2]]["isi_jawaban"] ?>'>
            <label class="form-check-label" for="flexRadioDefault1">
                <?php
                    echo $prd2[$freq[2]]["isi_jawaban"];
                    ?>
            </label>
        </div>

        <div class="form-check">
            <label><input nosoal="<?= $i ?>" class="form-check-input" type='radio'
                name='jawaban<?= $product['nomor'] ?>' id="flexRadioDefault1" 
                value='<?= $prd2[$freq[3]]["isi_jawaban"] ?>'>
            <label class="form-check-label" for="flexRadioDefault1">
                <?php
                    echo $prd2[$freq[3]]["isi_jawaban"];
                    ?>
            </label>
        </div>
    </p>
</div>
</div>
<br><br>
</div>



<?php

endforeach;
?>
<?php if ($halamanAktif == $jumlahHalaman) : ?>
<!-- <input class="btn btn-primary" type="submit" name="submit"> -->
<?php else : ?>
<input class="btn disabled" style="color:white;" type="" name="" value="">
<?php endif; ?>

</form>
<input type="button" onclick="submit()" value="submit">

<script>
        function submit() {

document.getElementById('theForm').submit();
        }

</script>