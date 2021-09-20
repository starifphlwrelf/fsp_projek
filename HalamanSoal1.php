<?php
$mysqli = new mysqli("localhost", "root", "", "projectfs");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	die();
}

session_start();

//$jawaban = $_POST['jawaban'];
//$idsoal = $_GET['$idsoal'];



$totaldataperpage = 2;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
//echo $page;
$offset = $totaldataperpage * ($page - 1);
// echo "Ini page".$page;
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Halaman Soal</title>
	<style type="text/css">
		div {
			border: 1px solid black;
			width: 200px;
			margin: 172px auto;
			padding: 10px;
			background-color: lightblue;
			font-family: monospace;
		}

		h2 {
			text-align: center;
		}

		.button {
			padding: 5px;
		}

		body {
			background-image: linear-gradient(#4682B4, #00FFFF, lightblue, lightskyblue);
			position: relative;
		}

		p {
			font-family: fantasy;
			font-size: 30px;
			text-align: center;
			color: blue;

		}
	</style>
</head>

<body>
	<div>
		<form>
			<p id="tes">KUIS</p>
			<a href="#" id="btnTes">Tesss</a>
			<?php
			$result = $mysqli->query("SELECT * FROM soal");
			$total_data = $result->num_rows;
			//echo $total_data;


			$stmt = $mysqli->prepare("SELECT * FROM soal LIMIT ?, ?");
			$stmt->bind_param("ii", $offset, $totaldataperpage);
			$stmt->execute();
			$result = $stmt->get_result();


			//while ($row = $result -> fetch_assoc())
			//{	
			$soal1 = $result->fetch_assoc();

			$sql1 = "SELECT * FROM jawaban j INNER JOIN soal s ON j.idsoal = s.idsoal  WHERE j.idsoal = ? ORDER BY rand()";
			$stmt1 = $mysqli->prepare($sql1);
			$stmt1->bind_param("i", $soal1['idsoal']);
			$stmt1->execute();
			$res_jawaban = $stmt1->get_result();


			//echo var_dump($soal1['pertanyaan']);
			$arr1 = $res_jawaban->fetch_assoc();
			$arr2 = $res_jawaban->fetch_assoc();
			$arr3 = $res_jawaban->fetch_assoc();
			$arr4 = $res_jawaban->fetch_assoc();

			// echo var_dump($soal1["pertanyaan"]);
			// echo var_dump($arr1["isi_jawaban"]);
			// $arr2 = $res_jawaban-> fetch_assoc();
			// $arr3 = $res_jawaban-> fetch_assoc();
			// $arr4 = $res_jawaban-> fetch_assoc();

			$soal2 = $result->fetch_assoc();
			$sql2 = "SELECT * FROM jawaban j INNER JOIN soal s ON j.idsoal = s.idsoal  WHERE j.idsoal = ? ORDER BY rand()";
			$stmt2 = $mysqli->prepare($sql2);
			$stmt2->bind_param("i", $soal2['idsoal']);
			$stmt2->execute();
			$res_jawaban = $stmt2->get_result();
			$arr5 = $res_jawaban->fetch_assoc();
			$arr6 = $res_jawaban->fetch_assoc();
			$arr7 = $res_jawaban->fetch_assoc();
			$arr8 = $res_jawaban->fetch_assoc();


			// $soal3 = $result -> fetch_assoc();
			// $sql3 = "SELECT * FROM jawaban j INNER JOIN soal s ON j.idsoal = s.idsoal  WHERE j.idsoal = ? ORDER BY rand()";
			// $stmt3 = $mysqli->prepare($sql3);
			// $stmt3 -> bind_param("i", $soal3['idsoal']);
			// $stmt3 -> execute();
			// $res_jawaban = $stmt3->get_result();
			// $arr9 = $res_jawaban-> fetch_assoc();
			// $arr10 = $res_jawaban-> fetch_assoc();
			// $arr11 = $res_jawaban-> fetch_assoc();
			// $arr12 = $res_jawaban-> fetch_assoc();
			// echo var_dump($arr12["isi_jawaban"]);

			// $arr5 = $res_jawaban-> fetch_assoc();
			// $arr6 = $res_jawaban-> fetch_assoc();
			// $arr7 = $res_jawaban-> fetch_assoc();
			// $arr8 = $res_jawaban-> fetch_assoc();

			// $soal3 = $result -> fetch_assoc();
			// $arr9 = $res_jawaban-> fetch_assoc();
			// $arr10 = $res_jawaban-> fetch_assoc();
			// $arr11 = $res_jawaban-> fetch_assoc();
			// $arr12 = $res_jawaban-> fetch_assoc();

			//echo var_dump($arr1["isi_jawaban"]);
			//echo var_dump($arr2["isi_jawaban"]);
			//echo var_dump($arr3["isi_jawaban"]);
			//echo var_dump($arr4["isi_jawaban"]);
			//echo var_dump($arr5["isi_jawaban"]);
			//echo var_dump($arr6["isi_jawaban"]);
			//echo var_dump($arr7["isi_jawaban"]);
			//echo var_dump($arr8["isi_jawaban"]);
			//echo var_dump($arr9["isi_jawaban"]);
			//echo var_dump($arr10["isi_jawaban"]);
			//echo var_dump($arr11["isi_jawaban"]);
			//echo var_dump($arr12["isi_jawaban"]);

			if ($page == 1) {
				echo "<label name ='soal'>" . $soal1['nomor'] . "." . $soal1['pertanyaan'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this); ' data-id='jawaban1s1' id='tes1' value='" . $arr1['idjawaban'] . "'>" . $arr1['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this); ' data-id='jawaban1s2' id='tes2' value='" . $arr2['idjawaban'] . "'>" . $arr2['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this); ' data-id='jawaban1s3' id='tes3' value='" . $arr3['idjawaban'] . "'>" . $arr3['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this); ' data-id='jawaban1s4' id='tes4' value='" . $arr4['idjawaban'] . "'>" . $arr4['isi_jawaban'] . "</label><br>";

				echo "<label name ='soal'>" . $soal2['nomor'] . "." . $soal2['pertanyaan'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban2' onclick='goDoSomething2(this); handleClick2(this);' data-id='jawaban1s5' value='" . $arr5['idjawaban'] . "'>" . $arr5['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban2' onclick='goDoSomething2(this); handleClick2(this);' data-id='jawaban1s6' value='" . $arr6['idjawaban'] . "'>" . $arr6['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban2' onclick='goDoSomething2(this); handleClick2(this);' data-id='jawaban1s7' value='" . $arr7['idjawaban'] . "'>" . $arr7['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban2' onclick='goDoSomething2(this); handleClick2(this);' data-id='jawaban1s8' value='" . $arr8['idjawaban'] . "'>" . $arr8['isi_jawaban'] . "</label><br>";
			} else {
				echo "<label name ='soal'>" . $soal1['nomor'] . "." . $soal1['pertanyaan'] . "</label><br>";
				echo "<label ><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this);' data-id='jawaban1s1' value='" . $arr1['idjawaban'] . "'>" . $arr1['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this);' data-id='jawaban1s2' value='" . $arr2['idjawaban'] . "'>" . $arr2['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this);' data-id='jawaban1s3' value='" . $arr3['idjawaban'] . "'>" . $arr3['isi_jawaban'] . "</label><br>";
				echo "<label><input type='radio' name='jawaban1' onclick='goDoSomething1(this); handleClick1(this);' data-id='jawaban1s4' value='" . $arr4['idjawaban'] . "'>" . $arr4['isi_jawaban'] . "</label><br>";
			}



			// echo "<br>";


			//}
			?>
		</form>



		<?php
		$jumlah_halaman = ceil($total_data / $totaldataperpage);
		include "generate_halaman.php";
		echo generate_halaman($jumlah_halaman, $page, $totaldataperpage);


		//for($i=1; $i<=$jumlah_halaman; $i++)
		//{
		//	echo "<a href = 'HalamanSoal.php?page=$i'>$i</a>";
		//}

		?>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var tesJaw1 = ""
		var tesJaw2 = ""

		function goDoSomething1(identifier) {
			tesJaw1 = $(identifier).data('id')

		}

		function goDoSomething2(identifier) {

		}

		function handleClick1(myRadio) {

			var field1 = tesJaw1;

			var obj1 = {};

			obj1[field1] = "checked";

			sessionStorage.setItem("data1", JSON.stringify(obj1))
			console.log(tesJaw1)

		}




		function handleClick2(myRadio) {

			var field2 = tesJaw2;

			var obj2 = {};

			obj2[field2] = "checked";
			sessionStorage.setItem("data2", JSON.stringify(obj2))

		}

		$(document).ready(function() {

			var data = sessionStorage.getItem('data1');
			console.log(data)
			var json = console.log(document.getElementById('jawaban1s1'))
			console.log(JSON.parse(data).jawaban1s2)
			if (JSON.parse(data).jawaban1s1 == 'checked') {


				document.getElementById('tes1').checked = true;
			} else if (JSON.parse(data).jawaban1s2 == 'checked') {


				document.getElementById('tes2').checked = true;
			} else if (JSON.parse(data).jawaban1s3 == 'checked') {


				document.getElementById('tes3').checked = true;
			} else if (JSON.parse(data).jawaban1s4 == 'checked') {


				document.getElementById('tes4').checked = true;
			}
		});
	</script>
</body>

</html>