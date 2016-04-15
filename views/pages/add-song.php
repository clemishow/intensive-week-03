<div class="header-title">
	<div class="container-title">
		<h2>Ajouter une musique </h2>
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
						<div class="row">
							<div class="group">      
						      <input type="url" name="url" value="<?= $url ?>" required>
							      <span class="highlight"></span>
							      <span class="bar"></span>
						      <label>YouTube URL</label>
						    </div>
						</div>
					    <div class="row">
							<div class="group">      
								<input type="text" name="song" value="<?= $song ?>" required>
									<span class="highlight"></span>
									<span class="bar"></span>
								<label>Titre de la musique</label>
							</div>
					    </div>
					     <div class="row">
							<div class="group">      
								<input type="text" name="artist" value="<?= $artist ?>" required>
									<span class="highlight"></span>
									<span class="bar"></span>
								<label>Artiste</label>
							</div>
					    </div>
						<input class="btn btn-default" name="submitUrl" type="submit" value="envoyer">
					</form>
				</div>
			<div class="col-md-4"></div>
		</div>
	</div>