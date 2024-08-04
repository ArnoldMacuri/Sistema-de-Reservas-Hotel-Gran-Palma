<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/css/app.css" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIPAL; ?>assets/admin/css/icons.css" rel="stylesheet">
	<title><?php echo $data['title']; ?></title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="<?php echo RUTA_PRINCIPAL; ?>assets/img/logo.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class=""><?php echo $data['title']; ?></h3>
									</div>
									<div class="form-body">
										<form class="row g-3" id="formulario" autocomplete="off">
											<div class="col-12">
												<label for="correo" class="form-label">Correo Electrónico</label>
												<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" value="info@angelsifuentes.net">
											</div>
											<div class="col-12">
												<label for="clave" class="form-label">Contraseña</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="clave" name="clave" value="12345" placeholder="Contraseña"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Acceder</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--Password show & hide js -->
	<script>
		const ruta_admin = '<?php echo RUTA_ADMIN; ?>';

		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});	

		function alertaSW(mensaje, tipo) {
			Swal.fire({
				position: "top-end",
				icon: tipo,
				title: mensaje,
				showConfirmButton: false,
				timer: 2500,
				toast: true
			});
		}
	</script>
	<!--app JS-->
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/js/app.js"></script>
	<script src="<?php echo RUTA_PRINCIPAL; ?>assets/admin/js/pages/login.js"></script>
</body>

</html>