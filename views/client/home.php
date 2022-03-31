<a href="/add">add client</a>
<br><br>
<table border="1" cellpadding="10">
	<tr>
		<td>name</td>
		<td colspan="2" align="center">actions</td>
	</tr>
	<?php foreach($clients as $client): ?>
		<tr>
			<td><?= $client['name'] ?></td>
			<td>
				<a href="edit?id=<?= $client['id'] ?>"><button>edit</button></a>
			</td>
			<td>
				<form action="doDelete" method="post" style="margin: 0;">
					<input
						required
						type="hidden"
						name="id"
						value="<?= $client['id'] ?>"
					>
					<button>delete</button>
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>