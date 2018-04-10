<?php //EL cambio al actualizar no se mustra en la bd(heidi) se cierra y se tine que volver abrir para ver el cambipo
// Inicializa la creación de las tablas nuevas  
function toquefinal_database(){
    // WPDB nos da los métodos para trabajar con tablas
    global $wpdb;
    // Agregamos una versión
    global $toquefinal_dbversion;
    $toquefinal_dbversion = '1.0';
    
    // Obtenemos el prefijo
    $tabla = $wpdb->prefix . 'video_la_reta';
    
    //obtenemos el collation de la instalación
    $charset_collate = $wpdb->get_charset_collate();
    
    // Agregamos la estructura de la BD
    $sql = "CREATE TABLE $tabla (
            id int(5) NOT NULL AUTO_INCREMENT,
            url varchar(100) NOT NULL,
            usuario varchar(10) NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; ";
    
    // Se necesita dbDelta para ejecutar el SQL y está en la siguiente dirección
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
    // Agregamos la versión de la BD Para compararla con futuras actualizaciones
    add_option('toquefinal_dbversion', $toquefinal_dbversion);
    
    // ACTUALIZAR EN CASO DE SER NECESARIO
    $version_actual = get_option('toquefinal_dbversion');
    
    // Comparamos las 2 versiones
    if($toquefinal_dbversion != $version_actual) {
          $tabla = $wpdb->prefix . 'video_la_reta';
          
          // Aquí realizarias las actualizaciones
           $sql = "CREATE TABLE $tabla (
            id int(5) NOT NULL AUTO_INCREMENT,
            url varchar(100) NOT NULL,
            usuario varchar(10) NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; ";
          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
          dbDelta($sql);
          //Actualizamos a la versión actual en caso de que asi sea
          update_option('toquefinal_dbversion', $toquefinal_dbversion);
    }
    
}
add_action('after_setup_theme', 'toquefinal_database');
// Función para comprobar que la versión instalada es igual a la base de datos nueva.
function toquefinal_revisar(){ 
  global $toquefinal_dbversion;
  if(get_site_option('toquefinal_dbversion') != $toquefinal_dbversion) {
      toquefinal_database();
  }
}
add_action('plugins_loaded', 'toquefinal_revisar');