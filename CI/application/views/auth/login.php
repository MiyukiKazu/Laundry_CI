
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?= base_url('assets/') ?>images/bg-01.jpg);">
					<span class="login100-form-title-1">
						SIGN IN
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="<?= base_url('auth/login'); ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" value="<?= set_value('username'); ?>" name="username" placeholder="Enter username">

						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>

						<div>
							<a href="<?= base_url('auth/regis'); ?>" class="txt1">
								<b>Belum punya akun ?</b>
							</a>||<a href="<?= base_url('landing'); ?>" class="txt1">
								<b>Home<b>
							</a><br>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							SIGN IN
						</button>
					</div>
				</form>
				<br>
				<br>
				<div class="wrap-input100 validate-input m-b-18">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>
		</div>
	</div>
