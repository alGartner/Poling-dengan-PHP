<!DOCTYPE>
<html>
<head>
	<title>Poling dengan operasi file created</title>
</head>
<body>
	<style type="text/css">
		<!--
			.style1 {font-size : 24px}
			.style2 {color:#0000ff}
		-->
	</style>
	<form name="form1" method="post"	action="index.php?isi=poling" >
		<p>
			<label><span class="style1">Polling</span></label>
		</p>
		<p>
			<label>Basaha pemgograman web apa yang ada suka ?</label>
		</p>
		<p>
			<label>
				<input type="radio" name="vote" value="php">PHP
			</label>
			<br>
			<label>
				<input type="radio" name="vote" value="asp">ASP
			</label>
		</p>
		<p>
			<label>
				<input type="submit" name="Submit" value="Submit">
			</label>
			<br>
		</p>
	</form>
	<?php
		if (@$_GET['isi']) {
			$vote = $_POST['vote'];
			if ($vote =="")//jika belum menentkan pilihan. 
			{
				print "<font color=red>Anda belum mengisi polling</font>";
				exit;
			}
			if ($vote == "php") // menambah 1 untuk pilihan php
			{
				$buka = fopen("php.txt", "r");
				$baca = fgets($buka,65535);
				fclose($buka);
				$buka = fopen("php.txt", "w");
				$baca++;
				fwrite($buka,$baca);
				fclose($buka);
			}
			if ($vote == "asp") // menambah 1 untuk pilihan asp
			{
				 $buka = fopen("asp.txt", "r");
				 $baca = fgets ($buka,65535);
				 fclose($buka);
				 $buka = fopen("asp.txt", "w");
				 $baca++;
				 fwrite($buka, $baca);
				 fclose($buka);
			}
			$buka_php = fopen("php.txt", "r");
			$bacaphp =fgets($buka_php,65535);
			fclose($buka_php);
			$buka_asp = fopen("asp.txt", "r");
			$bacaasp = fgets($buka_asp,65535);
			fclose($buka_asp);
			$total_pemilih = $bacaphp+$bacaasp;
			$persentase_php = ($bacaphp/$total_pemilih)*100;
			$persentase_asp = ($bacaasp/$total_pemilih*100);
			print"Total pemilih : $total_pemilih <br> <br> <br>";
			print"PHP :";
			printf("%1.0f","$persentase_php");
			print"%<img src=poll.jpg width=$persentase_php height=10>$bacaphp pemilih<br><br>";
			print "ASP : "; 
			printf("%1.0f","$persentase_asp");
			print "%<img src=poll.jpg width=$persentase_asp height=10>$bacaasp pemilih<br>";
		}
	?>
</body>
</html>