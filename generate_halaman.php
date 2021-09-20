<?php

function generate_halaman($jumlah_halaman, $page, $totaldataperpage)
{
	$hasil = "";

	if($page > 1)
	{
		$hasil .= "<a href ='HalamanSoal.php?page=".($page-1)."' class='button' id='btnPrev'><button>Previous</button></a>";
		$hasil .= "<a href ='Kesimpulan.php?page=".($page+1)."' class='button' id='btnNext'><button style='float:right'>Next</button></a>";

	}

	/*
	for($i=1; $i<=$jumlah_halaman; $i++)
	{
		$hasil .= "<a href = '?page=$i'>$i</a>";
	}
	*/

	if($page < $jumlah_halaman)
	{
		$hasil .= "<a href ='HalamanSoal.php?page=".($page+1)."' class='button' id='btnNext'><button style='float:right'>Next</button></a>";
	}

	return $hasil;
}

?>