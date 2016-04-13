<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4 text-center text-uppercase">
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
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<form action="" name="connection" method="post">
				<div class="col-md-4"></div>
					<div class="col-md-4 login">
						<h4 class="text-uppercase">Connexion</h4>
						<div class="form-group">
							<label for="email">Adresse Email</label>
					   		<input name="email" type="email" class="form-control username" id="email" placeholder="Email" value="<?= $email ?>">
						</div>
						<div class="form-group">
							<label for="password">Mot de passe</label>
							<input name="password" type="password" class="form-control password" id="password" placeholder="Mot de passe">
						</div>
						<div class="text-center container-btn-submit">
							<input name="submitlogin" type="submit" class="text-uppercase btn-submit submit-login" value="Envoyer">
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