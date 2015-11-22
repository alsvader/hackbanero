<table border="1">
	<thead>
		<tr>id</tr>
		<tr>nombre</tr>
		<tr></tr>
	</thead>
	<tbody>
		<?php foreach($departamentos as $depto): ?>
			<tr>
				<td><?=$depto[id];?></td>
				<td><?=$depto[nombre];?></td>
				<td></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>