<?php

include "functions/compteur.php";

$actual_year = (int)date('Y');
$actual_month = date('m');
$selected_year = empty($_GET['year']) ? null : (int) $_GET['year'];
$selected_month = empty($_GET['month']) ? null : $_GET['month'];
if ($selected_year && $selected_month) {
	$total = count_month_visits($selected_year, $selected_month);
	$detail = count_details($selected_year, $selected_month);
} else {
	$total = nombre_vues();
}


$months = [
	'01' => 'Janvier',
	'02' => 'Février',
	'03' => 'Mars',
	'04' => 'Avril',
	'05' => 'Mai',
	'06' => 'Juin',
	'07' => 'Juillet',
	'08' => 'Aout',
	'09' => 'Septembre',
	'10' => 'Octobre',
	'11' => 'Novembre',
	'12' => 'Decembre'
];

require "header.php";
?>
<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<?php for ($i = 0; $i < 5; $i++) : ?>
				<a href="dashboard.php?year=<?= $actual_year - $i ?>" class="list-group-item <?= $selected_year === $actual_year - $i ? 'active' : '' ?>">
					<?= $actual_year - $i ?>
				</a>
				<?php if ($actual_year - $i === $selected_year) : ?>
					<div class="list-group">
						<?php foreach ($months as $key => $month) : ?>
							<a class="list-group-item <?= $selected_month === $key ? 'active' : '' ?>" style="font-size:0.8em;" href="dashboard.php?year=<?= $selected_year ?>&month=<?= $key ?>">
								<?= $month; ?>
							</a>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			<?php endfor ?>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card mb-4">
			<div class="card-body">
				<strong style="font-size:2em;"><?= $total; ?></strong>
				visite<?= $total > 1 ? 's' : ''; ?>
			</div>
		</div>
		<?php if (isset($detail)) : ?>
			<h2>Détail des visites pour le mois</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Jour</th>
						<th scope="col">Nombre de visites</th>
					</tr>
				</thead>
				<?php foreach ($detail as $row) : ?>
					<tr>
						<td><?= $row['day'] ?></td>
						<td><?= $row['count'] ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>


<?php require "footer.php"; ?>