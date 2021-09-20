<?php
session_start();

$_SESSION["tes"] = "tes";
require 'function.php';

$totalData = count(query("SELECT * FROM `soal`;"));
$jumlahDataPerHalaman = 2;
$jumlahHalaman = ceil($totalData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// if (isset($_GET["halaman"])) {
//     $halamanAktif = $_GET["halaman"];
// } else {
//     $halamanAktif = 1;
// }


$prd1 = query("SELECT * FROM `soal` LIMIT $awalData,$jumlahDataPerHalaman;");
// $prd2 = query("SELECT * FROM `soal` INNER JOIN jawaban ON soal.idsoal = jawaban.soal_idsoal;");

// var_dump($prd1);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1 class="text-center mt-3">KUIS UPIN IPIN</h1><br><br>
    <!-- <h1>Hello, world!</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Soal</th>
                <th scope="col">Nomor</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Halaman_ke</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>1</td>
                <td> Siapa nama saudara Upin?</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->

    <div class="container mx-auto">
        <div class="row">
            <?php
            $i = 0;
            $result = mysqli_query($conn, "SELECT * FROM product");
            foreach ($prd1 as $product) :
                $i++;

            ?>

                <div class="col-6">

                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                            <!-- <h5 class="card-title"><?= $product['idsoal']; ?> </h5> -->
                            <p class="card-text">Nomor: <?= $product['nomor']; ?></p>
                            <p class="card-text">Pertanyaan: <?= $product['pertanyaan']; ?></p>
                            <p class="card-text">Jawaban:
                                <?php
                                $prd2 = query("SELECT * FROM `soal` INNER JOIN jawaban ON soal.idsoal = jawaban.soal_idsoal WHERE idsoal = $i;");

                                $freq = [];
                                $number = rand(0, 3);
                                $times = 4;
                                while ($times-- > 0) {
                                    while (in_array($number, $freq)) $number = rand(0, 3);
                                    $freq[] = $number;
                                }
                                ?>
                            <form action="result.php" method="POST">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" onclick="handleClick(this);" value="<?= $prd2[$freq[0]]["isi_jawaban"]; ?>">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php
                                        echo $prd2[$freq[0]]["isi_jawaban"];
                                        ?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" onclick="handleClick(this);" value="<?= $prd2[$freq[0]]["isi_jawaban"]; ?>">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php
                                        echo $prd2[$freq[1]]["isi_jawaban"];
                                        ?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" onclick="handleClick(this);" value="<?= $prd2[$freq[0]]["isi_jawaban"]; ?>">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php
                                        echo $prd2[$freq[2]]["isi_jawaban"];
                                        ?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" onclick="handleClick(this);" value="<?= $prd2[$freq[0]]["isi_jawaban"]; ?>">
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
            <?php if ($halamanAktif == 2) : ?>
                <input class="btn btn-primary" type="submit" name="submit">
            <?php else : ?>
                <input class="btn btn-primary disabled" type="submit" name="submit" value="Get Values">
            <?php endif; ?>
            </form>
            <!-- <form action="result.php" method="POST"> -->

        </div>
    </div>

    <!-- <form action="result.php" method="POST">
        <input type="submit" name="submit2">
    </form> -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($halamanAktif > 1) : ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item"><a class="page-link" style="font-weight: bold; color: red;" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if ($halamanAktif < 2) : ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a></li>
            <?php endif; ?>
            <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
        </ul>
    </nav>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script>
        function handleClick(myRadio) {
            sessionStorage.setItem("data", JSON.stringify({
                "flexRadioDefault1": "checked"
            }));
        }

        var data = sessionStorage.getItem('data');
        if (JSON.parse(data).flexRadioDefault1 == 'checked') {
            document.getElementById("flexRadioDefault1").checked = true;
        }
    </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>