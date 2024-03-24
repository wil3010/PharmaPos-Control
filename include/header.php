

<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
			
				<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
				  Pharmapost-Control
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li><a href="#">
							Admin
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
<?php $query=mysqli_query($con,"select * from admin");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>	
							<ul class="dropdown-menu">
								<li><a href="cambiar_contrasenia.php">Cambiar contraseña</a></li>
								<li><a href="editar_usuario.php?id=<?php echo $row['id']?>">Informacion del usuario</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Cerrar sesión</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<?php } ?>
	