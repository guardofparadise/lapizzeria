<?php  

function lapizzeria_ajustes(){
	// Nombre de la pagina(titulo), Nombre qua aparecera en el menu, permisos, slug en el menu, funcion que se manda llamar, icono, posicion
	add_menu_page('La Pizzeria', 'La Pizzeria Ajustes', 'administrator', 'lapizzeria_ajustes', 'lapizzeria_opciones', '', 20);
	// parent slug (slug en el menu->lapizzeria_ajustes), nombre de la pagina, titulo del menu, permisios, slug, callback o funcion que se manda llamar
	add_submenu_page('lapizzeria_ajustes', 'Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones'); //120

	// llamar al registro de las opciones de nuestro theme
	add_action('admin_init', 'lapizzeria_registrar_opciones'); //124
}
add_action('admin_menu', 'lapizzeria_ajustes');


function lapizzeria_registrar_opciones(){
	//Registar opciones, una por campo
	register_setting('la_pizzeria_opciones_grupo', 'lapizzeria_direccion');
	register_setting('la_pizzeria_opciones_grupo', 'lapizzeria_telefono');

	register_setting('la_pizzeria_opciones_gmaps', 'lapizzeria_gmap_latitud');//143
	register_setting('la_pizzeria_opciones_gmaps', 'lapizzeria_gmap_longuitud');
	register_setting('la_pizzeria_opciones_gmaps', 'lapizzeria_gmap_zoom');
	register_setting('la_pizzeria_opciones_gmaps', 'lapizzeria_gmap_api');
}

function lapizzeria_opciones(){
	?>
		<div class="wrap">
			<h1>Ajustes la Pizzeria</h1>

			<?php  
				if(isset($_GET['tab'])):
					$active_tab = $_GET['tab'];
				endif;
			?>

			<h2 class="nav-tab-wrapper">
				<a href="?page=lapizzeria_ajustes&tab=tema" class="nav-tab <?php echo $active_tab == 'tema' ? 'nav-tab-active' : '' ?>">Ajustes</a>
				<a href="?page=lapizzeria_ajustes&tab=gmaps" class="nav-tab <?php echo $active_tab == 'gmaps' ? 'nav-tab-active' : '' ?>">Google Maps</a>
			</h2>

			<form action="options.php" method="post">

				<?php if($active_tab == 'tema'): ?>

					<?php settings_fields('la_pizzeria_opciones_grupo'); ?>
					<?php do_settings_sections('la_pizzeria_opciones_grupo'); ?>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">Direccón</th>
							<td><input type="text" name="lapizzeria_direccion" value="<?php echo esc_attr(get_option('lapizzeria_direccion')); ?>"></td>
						</tr 
						<tr valign="top">
							<th scope="row">Teléfono</th>
							<td><input type="text" name="lapizzeria_telefono" value="<?php echo esc_attr(get_option('lapizzeria_telefono')); ?>"></td>
						</tr>
					</table>

				<?php else: ?>

					<?php settings_fields('la_pizzeria_opciones_gmaps'); //143 ?> 
					<?php do_settings_sections('la_pizzeria_opciones_gmaps'); ?>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">Latitud</th>
							<td><input type="text" name="lapizzeria_gmap_latitud" value="<?php echo esc_attr(get_option('lapizzeria_gmap_latitud')); ?>"></td>
						</tr>

						<tr valign="top">
							<th scope="row">Longuitud</th>
							<td><input type="text" name="lapizzeria_gmap_longuitud" value="<?php echo esc_attr(get_option('lapizzeria_gmap_longuitud')); ?>"></td>
						</tr>

						<tr valign="top">
							<th scope="row">Zoom</th>
							<td><input type="text" name="lapizzeria_gmap_zoom" value="<?php echo esc_attr(get_option('lapizzeria_gmap_zoom')); ?>"></td>
						</tr>

						<tr valign="top">
							<th scope="row">Api</th>
							<td><input type="text" name="lapizzeria_gmap_api" value="<?php echo esc_attr(get_option('lapizzeria_gmap_api')); ?>"></td>
						</tr>
					</table>

				<?php endif; ?>

				<?php submit_button(); ?>
			</form>
		</div>

<?php
}

function lapizzeria_reservaciones(){
	?>
		<div class="wrap">
			<h1>Reservaciones</h1>

			<table class="wp-list-table widefat striped">
				<thead>
					<tr>
						<th class="manage-colum">ID</th>
						<th class="manage-colum">Nombre</th>
						<th class="manage-colum">Fecha de Reserva</th>
						<th class="manage-colum">Correo</th>
						<th class="manage-colum">Teléfono</th>
						<th class="manage-colum">Mensaje</th>
						<th class="manage-colum">Eliminar</th>
					</tr>
				</thead>

				<tbody>
					<?php global $wpdb; 
						$reservaciones = $wpdb->prefix . 'reservaciones';
						$registros = $wpdb->get_results("SELECT * FROM $reservaciones", ARRAY_A);
						foreach($registros as $registro){ ?>
							<tr>
								<td><?php echo $registro['id']; ?></td>
								<td><?php echo $registro['nombre']; ?></td>
								<td><?php echo $registro['fecha']; ?></td>
								<td><?php echo $registro['correo']; ?></td>
								<td><?php echo $registro['telefono']; ?></td>
								<td><?php echo $registro['mensaje']; ?></td>
								<td>
									<a class="borrar_registro" href="#" data-reservaciones="<?php echo $registro['id']; ?>">Eliminar</a>
								</td>
							</tr>
						
						<?php
						}
						//var_dump($registros);
					?>
				</tbody>
			</table>

		</div>


	<?php
}

?>