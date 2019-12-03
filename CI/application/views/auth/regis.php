
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?= base_url('assets/') ?>images/bg-01.jpg);">
					<span class="login100-form-title-1">
						SIGN UP
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="<?= base_url('auth/regis'); ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" value="<?= set_value('username'); ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="nama" placeholder="Enter Full Name" value="<?= set_value('nama'); ?>"> 
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" name="alamat" placeholder="Enter Address" value="<?= set_value('alamat'); ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone Number is required">
						<span class="label-input100">No HP</span>
						<input class="input100" type="text" name="no_telp" placeholder="Enter Phone Number" value="<?= set_value('no_telp'); ?>">
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
							<a href="<?= base_url('auth/login');  ?>" class="txt1">
								<b>Sudah punya akun ?<b>||<a href="<?= base_url('landing'); ?>" class="txt1">
								<b>Home<b>
							</a><br>
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							SIGN UP
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
