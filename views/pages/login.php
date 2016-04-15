<div class="header-title">
	<div class="container-title">
		<h2>Mon compte</h2>
	</div>
	<div class="divider"></div>
</div>
<div class="col-md-5">
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
				<div class="row">
					<div class="group">      
				      <input type="email" name="email_signin" value="<?= $email_signin ?>" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
				      <label>Adresse Email</label>
				    </div>
				</div>
			    <div class="row">
					<div class="group">      
						<input type="password" name="password_signin" required>
							<span class="highlight"></span>
							<span class="bar"></span>
						<label>Mot de passe</label>
					</div>
			    </div>
			   <input name="submitlogin" type="submit" class="text-uppercase btn-submit submit-login" value="Envoyer">
			</div>
		</form>
	</div>
</div>
<div class="col-md-2"></div>
<div class="col-md-5">
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
				<div class="row">
					<div class="col-md-6">
						<div class="group">      
							<input type="text" name="last" value="<?= $last ?>" required>
								<span class="highlight"></span>
								<span class="bar"></span>
							<label>Nom</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="group">      
							<input type="text" name="first" value="<?= $first ?>" required>
								<span class="highlight"></span>
								<span class="bar"></span>
							<label>Prénom</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="group">      
						<input name="email_signin" type="email_signin" value="<?= $email_signin ?>" required>
							<span class="highlight"></span>
							<span class="bar"></span>
						<label>Adresse Email</label>
					</div>
				</div>
				<div class="row">
					<div class="group">      
						<input name="password_signin" type="password" required>
							<span class="highlight"></span>
							<span class="bar"></span>
						<label>Mot de passe</label>
					</div>
				</div>
				<div class="text-center container-btn-submit">
					<input name="submitsignin" type="submit" class="text-uppercase btn-submit" value="Envoyer">
				</div>
			</div>
		</form>
	</div>
</div>










