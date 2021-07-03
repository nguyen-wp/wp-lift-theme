<?php
use ScssPhp\ScssPhp\Compiler;

add_action('redux/options/' . $opt_name . '/saved',  "lift_compiler_sass"  );
add_action('redux/options/' . $opt_name . '/saved',  "lift_save_css"  );
add_action('redux/options/' . $opt_name . '/saved',  "lift_save_js"  );
// add_filter('redux/options/' . $opt_name . '/compiler', 'lift_compiler_css', 10, 3);

	if ( ! function_exists( 'lift_compiler_sass' ) ) {
		function lift_compiler_sass($values) {
			global $wp_filesystem;
			global $lift_theme;
		
			$filename = dirname(__DIR__) .'/../dist/css/style.css';

			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}
		
			if( $wp_filesystem ) {

				$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';

				$scss = new Compiler();
				$css = $scss->compileString($tmp.$lift_theme['lift-theme-cssjs-scss-code'])->getCss();
		
				$wp_filesystem->put_contents(
					$filename,
					$css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

	if ( ! function_exists( 'lift_compiler_css' ) ) {
		function lift_compiler_css( $options, $css, $changed_values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = dirname(__DIR__) .'/../dist/css/export.css';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}
		
			if( $wp_filesystem ) {
				$wp_filesystem->put_contents(
					$filename,
					$css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

	if ( ! function_exists( 'lift_save_css' ) ) {
		function lift_save_css($values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = dirname(__DIR__) .'/../dist/css/theme.css';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';
		
			if( $wp_filesystem ) {
				$css = $tmp.$lift_theme['lift-theme-cssjs-css-code'];
				$wp_filesystem->put_contents(
					$filename,
					$css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

	if ( ! function_exists( 'lift_save_js' ) ) {
		function lift_save_js($values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = dirname(__DIR__) .'/../dist/js/theme.js';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';
		
			if( $wp_filesystem ) {
				$js = $tmp.$lift_theme['lift-theme-cssjs-js-code'];
				$wp_filesystem->put_contents(
					$filename,
					$js,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'lift-theme-options' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'lift-theme-options' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

