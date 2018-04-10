<?php get_header(); ?>
	
	<?php while(have_posts()): the_post(); ?>


	
		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<?php the_title('<h1>', '</h1>'); // o puede ir dentro de un h1 o con parametros?> 
				</div>
			</div>
		</div>


		<div class="principal contenedor contacto">
			<main class="contenido-paginas">
				
				<?php get_template_part('templates/formulario', 'reservacion') ?>
				<!--Incio-->					
				
					<form class="" method="post">
		        <div class="col s12 m5 offset-m1">
		          <div class="card darken-1 participaReta">
		            <div class="card-content white-text center">
		              <p class="center">Ingresa el link de Facebook, Youtube, etc.</p>
		              <input class="cajaRegistro" type="text" name="linkVideo" placeholder="Link de Redes Sociales" required>
		            </div>
		          </div>
		        </div>

		        <div class="col s12 m5">
		          <div class="card darken-1 participaReta">
		            <div class="card-content white-text center">
		              <p class="center">Ingresa el link de Facebook, Youtube, etc.</p>
		             <div class="file-field input-field btnRfield">
				      <div class="btn btnRup">
				        <span>Cargar archivo</span>
				        <input type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
		            </div>
		          </div>
		          <!--<button class="btnUpVideo right">Sube tu video</button>-->
		          <input type="submit" name="enviar_video" class="button btnUpVideo right">
				<input type="hidden" name="oculto_vid" value="1">
		        </div>	        	
      		</form>

				<!--Fin-->
			</main>
		</div>
	<?php endwhile ?>

	<div>
		<?php
	
if (is_user_logged_in()){
	
		
	
			    $cu = wp_get_current_user();
	
			
	
			    echo 'ID: '                . $cu->ID             . '<br />';
	
    			echo 'Nombre de usuario: ' . $cu->user_login     . '<br />';
	
    			echo 'Nombre: '            . $cu->user_firstname . '<br />';
	
    			echo 'Apellidos: '         . $cu->user_lastname  . '<br />';
	
    			echo 'Nombre publico: '    . $cu->display_name   . '<br />';
	
    			echo 'Email: '             . $cu->user_email     . '<br />';
	
    			echo 'Web: '               . $cu->user_url       . '<br />';
	
		
	
		}
	
?>
	</div>
<?php get_footer(); ?>