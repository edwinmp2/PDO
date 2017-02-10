<?php

require_once "database/Connection.php";
require_once "database/QueryBuilder.php";
require_once "config/database.php";

$connection = Connection::make($config);
$db = new QueryBuilder($connection);
$article = $db->select('tbl_article');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Article</title>
</head>
<body>
	<a href="create.php">Tambah</a>
	<table border="1px black solid">
		<thead>
			<tr>
				<td>No</td>
				<td>Judul</td>
				<td>Isi</td>
				<td>Tanggal di buat</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach ($article as $d) {
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $d->judul; ?></td>
				<td><?= $d->isi; ?></td>
				<td><?= $d->created_at; ?></td>
				<td>
					<a href="edit.php?id=<?= $d->id; ?>">ubah</a>
					<a href="delete.php?id=<?= $d->id; ?>">Hapus</a>
				</td>
			</tr>
			<?php
				$no++;
				}
			?>
		</tbody>
	</table>
</body>
</html>
