<?php 



class Agni_Slider{


        public function __construct(){

        $this->includes();

                        
        add_action( 'agni_slider', array($this, 'slider_init') );

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_scripts' ) );
    }
    public function includes(){

        require_once AGNI_TEMPLATE_DIR . '/slider/slider-builder-block-processor.php';
        require_once AGNI_TEMPLATE_DIR . '/slider/slider-builder-css-processor.php';

    }

    public function slider_init( $slider_id ){

        if( !isset( $slider_id ) || $slider_id === '' ){
            return;
        }

                        

        $sliders = (array)get_option('agni_slider_builder_sliders');

        foreach ($sliders as $key => $slider) {
            if( $slider['id'] == $slider_id ){

                $slides = $slider['content'];
                $slider_settings = $slider['settings'];

                                


                                                                $slider_constrained = isset($slider_settings['width-choice'])?$slider_settings['width-choice']: '';
                $slider_slide_to_show = isset($slider_settings['slides-to-show'])?$slider_settings['slides-to-show']: array( 'desktop' => '1', 'laptop' => '1', 'tab' => '1', 'mobile' => '1' );
                $slider_classname = isset($slider_settings['className'])?$slider_settings['className']: '';

                $agni_slider_classnames = array(
                    'agni-slider',
                    'agni-slider-' . $slider_id,
                    !empty($slider_constrained) ? 'has-' . $slider_constrained : '',
                    $slider_classname
                )

                ?>
                <?php 
                if( sizeof($slides) > 1 && $slider['type'] == 'slider' ){
                    wp_enqueue_script( 'slick' );
                    wp_enqueue_style( 'slick' );

                    array_push( $agni_slider_classnames, 'slick' );

                    $new_slide_to_show = array();

                    if( !empty( $slider_slide_to_show ) ){
                        foreach ($slider_slide_to_show as $device => $value) {
                            if( $device == 'desktop' ){
                                $new_slide_to_show[] = array( 
                                    'breakpoint' => '1440',
                                    'value' => $value
                                );
                            }
                            else if( $device == 'laptop' ){
                                $new_slide_to_show[] = array( 
                                    'breakpoint' => '1024',
                                    'value' => $value
                                );
                            }
                            else if( $device == 'tab' ){
                                $new_slide_to_show[] = array( 
                                    'breakpoint' => '667',
                                    'value' => $value
                                );
                            }
                            else if( $device == 'mobile' ){
                                $new_slide_to_show[] = array( 
                                    'breakpoint' => '',
                                    'value' => $value
                                );
                            }
                        }
                    }

                    
                    
                                        
                    
                                                                                


                    ?>
                    <div id="<?php echo esc_attr( 'agni-slider-' . $slider_id ); ?>" class="<?php echo esc_attr( cartify_prepare_classes($agni_slider_classnames) ) ?>" data-slick="<?php echo esc_attr( cartify_prepare_slick_options( $slider_settings['slider-carousel-options'] ) ); ?>" data-slick-slide-to-show="<?php echo esc_attr( json_encode( $new_slide_to_show ) ); ?>">
                    <?php 
                } 
                else { ?>
                    <div id="<?php echo esc_attr( 'agni-slider-' . $slider_id ); ?>" class="<?php echo esc_attr( cartify_prepare_classes($agni_slider_classnames) ) ?>">
                <?php } ?>
                    <?php foreach ($slides as $key => $slide) {
                                                $revised_slide = $slide;
                        apply_filters( 'agni_slider_slide', $revised_slide );
                    } ?>
                </div>
                <?php
            }
        }


                    }

        public function get_existing_sliders(){
        return get_option('agni_slider_builder_sliders');
    }


    
                
    
            
    
    public static function get_slider_json_file( $filename = '' ){

        if( empty( $filename ) ){
            return;
        }

        global $wp_filesystem;

         require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();

                $slider_default_json = AGNI_TEMPLATE_DIR . '/slider/helper/' . $filename . '.json';
        $slider = '';
        if ( $wp_filesystem->exists( $slider_default_json ) ) {
            $slider = json_decode( $wp_filesystem->get_contents( $slider_default_json ), true );
        }

            return $slider;

    }

    public function enqueue_scripts(){

        $sliders = $this->get_existing_sliders();

                if( !empty( $sliders ) ){
            foreach ($sliders as $key => $slider) {
                $slider_id = $slider['id'];

                $styles = apply_filters( 'agni_slider_css', $slider );

                
                                wp_register_style( 'cartify-slider-custom-'.$slider_id, AGNI_FRAMEWORK_CSS_URL . '/custom.css' );

                wp_add_inline_style( 'cartify-slider-custom-'.$slider_id, $styles );

            }
        }



        $post_id = get_the_id();

        if( function_exists('is_shop') && is_shop() ){
            $post_id = wc_get_page_id('shop');
        }

        $slider_id = get_post_meta($post_id, 'agni_slider_id', true);

        if( get_query_var( 'term' ) || get_query_var('cat') || get_query_var('tag') ){
            $term = get_queried_object();

            if( isset( $term->term_id ) ){
                $term_id = $term->term_id;
                $slider_id = get_term_meta($term_id, 'agni_slider_id', true);
            }
        }

        if( $slider_id !== '' ){
            wp_enqueue_style( 'cartify-slider-custom-' . $slider_id );
            wp_enqueue_style( 'cartify-animista' );
        }

    }

    public function enqueue_editor_scripts(){

        $sliders = $this->get_existing_sliders();

        if( !empty( $sliders ) ){
            foreach ($sliders as $key => $slider) {
                wp_enqueue_style( 'cartify-slider-custom-' . $slider['id'] );
            }

            wp_enqueue_style( 'agni-builder-animista' );
        }
    }
}

$agni_slider = new Agni_Slider();

?>