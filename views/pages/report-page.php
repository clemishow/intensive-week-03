<?php 
if(!empty($_GET['id'])){
    $movie = $_GET['id'];
}
$query      = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
$video      = $query->fetch();
?>
<div class="header-title">
	<div class="container-title">
		<h2>Signaler : <?= $video->song ?> – <?= $video->artist ?></h2>
	</div>
	<div class="divider"></div>
</div>
<div class="divider"></div>
<div class="add-song">
		<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4 text-center text-uppercase">
					<?php if(!empty($errors_report)): ?>
						<div class="alert bg-danger">
							<?php foreach($errors_report as $_error_report): ?>
								<div><?= $_error_report ?></div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($success_report)): ?>
						<div class="alert bg-success">
							<?php foreach($success_report as $_success_report): ?>
								<div><?= $_success_report ?></div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="" method="post">
						<div class="row">
							<div class="group">      
						      <input type="text" name="reason" value="<?= $reason ?>" required>
							      <span class="highlight"></span>
							      <span class="bar"></span>
						      <label>Raison</label>
						    </div>
						</div>
						<input class="btn btn-default" name="submitReport" type="submit" value="envoyer">
					</form>
				</div>
			<div class="col-md-4"></div>
		</div>
	</div>