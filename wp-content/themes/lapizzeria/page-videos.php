<?php  

$videos_por_pagina = 4;
$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p']:1);
$inicio = ($pagina_actual > 1) ? $pagina_actual * $videos_por_pagina - $videos_por_pagina : 0;	
 global $wpdb; 
	$reservaciones = $wpdb->prefix . 'reservaciones';
	$registros = $wpdb->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM $reservaciones LIMIT $inicio, $videos_por_pagina", ARRAY_A);
	print_r($registros);
	
	$n_registros = $wpdb->get_results("SELECT FOUND_ROWS() as total_filas", ARRAY_A);
	$total_post = $n_registros[0]['total_filas'];
	print_r($total_post);
	print_r($n_registros);			
	$total_paginas = ceil($total_post/$videos_por_pagina);
	?>
	<div>
		
		<?php foreach ($registros as $registro): ?>
	            <p><?php echo $registro['id']; ?></p>
				<p><?php echo $registro['nombre']; ?></p>
	        <?php endforeach; ?>

	</div>

	<div class="paginacion">
	          <!--<a href="#" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
	          <a href="#" class="derecha">Pagina Siguente <i class="fa fa-long-arrow-right"></i></a>-->
	          <?php if ($pagina_actual > 1): ?>
	            <a href="<?php echo the_permalink()."?p=". $pagina_actual -1;?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
	          <?php endif; ?>

	          <?php if ($total_paginas != $pagina_actual): ?>
	              <a href="<?php echo the_permalink();?>"  class="derecha">Pagina Siguente <i class="fa fa-long-arrow-right"></i></a>
	          <?php endif; ?>
	        </div>

	<?php

?>