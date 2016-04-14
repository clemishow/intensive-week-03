	<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4 text-center text-uppercase">
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
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<form action="" name="registration" method="post">
				<div class="col-md-4"></div>
					<div class="col-md-4 login">
						<h4 class="text-uppercase">Inscription</h4>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="last">Nom</label>
									<input type="text" class="form-control" name="last" id="last" placeholder="Nom" value="<?= $last ?>">
								</div>
								<div class="col-md-6">
									<label for="first">Prénom</label>
									<input type="text" class="form-control" name="first" id="first" placeholder="Nom" value="<?= $first ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email_signin">Adresse Email</label>
					   		<input name="email_signin" type="email_signin" class="form-control" id="email_signin" placeholder="Email" value="<?= $email_signin ?>">
						</div>
						<div class="form-group">
							<label for="password_signin">Mot de passe</label>
							<input name="password_signin" type="password_signin" class="form-control" id="password_signin" placeholder="Mot de passe">
						</div>
						<div class="text-center container-btn-submit">
							<input name="submitsignin" type="submit" class="text-uppercase btn-submit" value="Envoyer">
						</div>
						<hr>
						<div class="text-center password-forget">
							<a href="#">Mot de passe oublié ?</a>
						<div>
					</div>
				<div class="col-md-4"></div>
			</form>
		</div>
	</div>