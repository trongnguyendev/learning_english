<div class="container">
	<table class="table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">word</th>
			<th scope="col">type</th>
			<th scope="col">family word</th>
			<th scope="col">created_at</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($words as $word): ?>
		<tr>
			<th scope="row"><?php echo $word['id']; ?></th>
			<td><?php echo $word['word']; ?></td>
			<td><?php echo $word['type']; ?></td>
			<td><?php echo $word['family_word']; ?></td>
			<td><?php echo $word['created_at']; ?></td>
		</tr>
		<?php endforeach; ?>

		</tbody>
	</table>
</div>
