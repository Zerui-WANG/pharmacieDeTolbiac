<?php
require("_header-panier.php");
?>
<?php var_dump($panier->total());?>
<html>
<head>
	<title>Paiement</title>
	<meta charset="utf-8">
</head>
<body>
<div><a href='javascript:history.back()'>Retourner</a><div>
	<h1>Paiement</h1>
	<table>
		<th colspan="2">Total : <?php echo $panier->total();?>€</th>
		<form action="paye.php" method="post">
		<tr>
			<td>Numéros de carte : </td>
			<td><input type="number" name="numcarte"></td>
		</tr>
		<tr>
			<td>Date de fin d'expiration : </td>
			<td><input type="date" name="date"></td>
		</tr>
		<tr>
			<td>Cryptogramme visuel : </td>
			<td><input type="number" name="crypto"></td>
		</tr>
		<tr>
			<td><input type="submit" name="valider" value="Valider"></td>
		</tr>
		</form>
	</table>
</body>
</html>