<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'lapizzeria');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Maqueda31');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'SNs08?1>$Ld)+&7Y-%xODb1A2DXZX=Wf7];gGLOs[!Z0 Vn.EZP$=m&/jPpw#$wX');
define('SECURE_AUTH_KEY', '}i?W|0l/@x!3sX7*C~jK;hwOX`A6Z4jJsLY1D37);eU%rjLtPlglS-&6},>RIQ(V');
define('LOGGED_IN_KEY', 'Lr F-w%6+Q.?$45H=nplqD|O1`.]1aE:I<f]&xXfk6.]q$sOxYTRR.z(K AooY,*');
define('NONCE_KEY', 'iL X)I]Vz566^=Pl+FLW]XQ(^(:^0@N`(oL!f]Y)<2`l>.,{).v^, gH9mm~w!FC');
define('AUTH_SALT', 'z X>abKJ/h7Cf1%B~ZZ5%{~oyl_$C6t9R]}UYSba>l,=47rSe , t= K/|TQD/iO');
define('SECURE_AUTH_SALT', 'T:6+dbb6P?QVU=%Oq4oVdxBsw|)KR3 hx<Eor|,aMl>W#15zR%rzm[adh/fskME}');
define('LOGGED_IN_SALT', 'g*m1;+%c-2 af-f+$(t=rC,VDl!1IEQ~|:JPx`%cCf1{RS{9^ xkH=~(nJI-9n.X');
define('NONCE_SALT', 'XKnE@uA|H:y&vQ-(B}KOIvRqJZ{L;pUzVRHb`It? 5M,lb@C<X_m1n],%$(!2@%+');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

