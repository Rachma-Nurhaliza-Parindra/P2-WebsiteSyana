<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
	<style>
        /* Menggunakan inline CSS */
        h1, p {
            text-align: center;
        }
    </style>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<div class="container">
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>

		<style>
		.centered-message {
		display: flex;
    	align-items: center;
    	justify-content: center;
  		}
		</style>

	<?php if ($this->session->flashdata('message_login_error')): ?>
  		<div class="centered-message">
    	<div class="invalid-feedback">
      	<?= $this->session->flashdata('message_login_error') ?>
    	</div>
  		</div>
		<?php endif ?>

		<form action="" method="post" style="max-width: 400px;">
			<div>
				<label for="name">Email/Username*</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
				</div>
			</div>
			<div>
				<label for="password">Password*</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>
	</div>
	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>