<div class="header-title">
	<div class="container-title">
		<h2>Mon compte</h2>
	</div>
	<div class="divider"></div>
</div>
<div class="col-md-6">
	<div class="row">
		<div class="col-md-12 text-center text-uppercase">
			<?php if(!empty($errors_login)): ?>
				<div class="alert bg-danger">
					<?php foreach($errors_login as $_error): ?>
						<div><?= $_error ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($success_login)): ?>
				<div class="alert bg-success">
					<?php foreach($success_login as $_success_login): ?>
						<div><?= $_success_login ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<form action="" name="connection" method="post">
			<div class="col-md-12 login">
				<h4 class="text-uppercase">Connexion</h4>
				<div class="form-group">
					<label for="email_login">Adresse Email</label>
			   		<input name="email_signin" type="email" class="form-control username" id="email_login" value="<?= $email_signin ?>">
				</div>
				<div class="form-group">
					<label for="password_login">Mot de passe</label>
					<input name="password_signin" type="password" class="form-control password_" id="password_login">
				</div>
				<div class="text-center container-btn-submit">
					<input name="submitlogin" type="submit" class="text-uppercase btn-submit submit-login" value="Envoyer">
				</div>
			</div>
		</form>
	</div>
</div>
<div class="col-md-6">
	<div class="row">
		<div class="col-md-12 text-center text-uppercase">
			<?php if(!empty($errors_signin)): ?>
				<div class="alert bg-danger">
					<?php foreach($errors_signin as $_error_signin): ?>
						<div><?= $_error_signin ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($success_signin)): ?>
				<div class="alert bg-success">
					<?php foreach($success_signin as $_success_signin): ?>
						<div><?= $_success_signin ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<form action="" name="registration" method="post">
			<div class="col-md-12 login">
				<h4 class="text-uppercase">Inscription</h4>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="last">Nom</label>
							<input type="text" class="form-control" name="last" id="last" value="<?= $last ?>">
						</div>
						<div class="col-md-6">
							<label for="first">Prénom</label>
							<input type="text" class="form-control" name="first" id="first" value="<?= $first ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email_signin">Adresse Email</label>
			   		<input name="email_signin" type="email_signin" class="form-control" id="email_signin" value="<?= $email_signin ?>">
				</div>
				<div class="form-group">
					<label for="password_signin">Mot de passe</label>
					<input name="password_signin" type="password" class="form-control" id="password_signin">
				</div>
				<div class="text-center container-btn-submit">
					<input name="submitsignin" type="submit" class="text-uppercase btn-submit" value="Envoyer">
				</div>
			</div>
		</form>
	</div>
</div>









