<div class="header-title">
	<div class="container-title">
		<h2>Ajouter une musique</h2>
	</div>
	<div class="divider"></div>
</div>
<div class="divider"></div>
<div class="add-song">
		<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4 text-center text-uppercase">
					<?php if(!empty($errors)): ?>
						<div class="alert bg-danger">
							<?php foreach($errors as $_error): ?>
								<div><?= $_error ?></div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($success)): ?>
						<div class="alert bg-success">
							<?php foreach($success as $_success): ?>
								<div><?= $_success ?></div>
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
						<div class="form-group">
							<label for="url">YouTube URL :</label>
							<input id="url" type="text" name="url" class="form-control" value="<?= $url ?>">
						</div>
						<div class="form-group">
							<label for="song">Titre du son :</label>
							<input id="song" type="text" name="song" class="form-control" value="<?= $song ?>">
						</div>
						<div class="form-group">
							<label for="artist">Artiste :</label>
							<input id="artist" type="text" name="artist" class="form-control" value="<?= $artist ?>">
						</div>
						<input class="btn btn-default" name="submitUrl" type="submit" value="envoyer">
					</form>
				</div>
			<div class="col-md-4"></div>
		</div>
	</div>