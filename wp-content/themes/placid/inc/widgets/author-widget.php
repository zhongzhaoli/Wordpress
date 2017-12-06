<?php

class Placid_Author_Widget extends WP_Widget{
     public function __construct(){
          parent::__construct(
               'author-widget',
               __( 'PT Author', 'placid' ),
               array( 'description' => __( 'Place anywhere in the Widget area.', 'placid' ) )
          );
     }
    
     public function widget( $args, $instance ){
        if(!empty($instance)){ 
         $image=$instance['image_uri'];
         $title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
         $description=$instance['description'];
          if(!empty($title) || !empty($image) || !empty($description) ){
          ?>

              <section  class="widget author-widget">
              <?php echo $args['before_widget']; ?>
                       <?php if(isset($title)) { 
                       echo $args['before_title'] .esc_html( $title ).$args['after_title'];
                    } ?>
                  <?php
                  if(isset($image) && !empty( $image )) {
                      ?>
                      <figure class="author">
                          <img src="<?php echo esc_url( $instance['image_uri'] ); ?>">
                      </figure>
                      <?php
                  }
                  ?>

                  <p><?php if(isset($description)) {  echo wp_kses_post( $instance['description'] ); } ?></p>
                   <?php
                      echo $args['after_widget']; 
                  ?>
              </section>
          <?php
        }
     }
   } 

     public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['description'] = wp_kses_post( $new_instance['description'] );
        $instance['image_uri'] = esc_url_raw( $new_instance['image_uri'] );
        return $instance;
     }

     public function form($instance ){
          ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Author or Ads Title', 'placid' ); ?></label><br />
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php
                 if (isset($instance['title']) && $instance['title'] != '' ) :
                   echo esc_attr($instance['title']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Author or Ads Description', 'placid' ); ?></label><br />
                 <textarea  rows="8" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"  class="widefat" ><?php
                 
                   if (isset($instance['description']) && $instance['description'] != '' ) :
                      echo esc_textarea( $instance['description'] ); 
                    endif;
                  ?></textarea>
             </p>
              <p>
                 <label for="<?php echo $this->get_field_id('image_uri'); ?>">
                     <?php _e( 'Select Image', 'placid' ); ?>
                 </label>
                  <br />
                 <?php
                     if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                         echo '<img class="widefat custom_media_image" src="' . esc_url( $instance['image_uri'] ) . '" />';
                     endif;
                 ?>

                 <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php 
                   if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                     echo esc_url( $instance['image_uri'] );
                    endif;
                  ?>">
                 <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php esc_attr_e('Upload Image','placid')?>" />
             </p>
          <?php
     }
}
add_action( 'widgets_init', 'placid_author_widget' ); 
function placid_author_widget(){     
    register_widget( 'Placid_Author_Widget' );

}

add_action( 'admin_enqueue_scripts', 'placid_press_widgets_backend_enqueue' ); 
function placid_press_widgets_backend_enqueue(){     
    wp_register_script( 'placid-custom-widgets', get_template_directory_uri().'/assets/js/widget.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'placid-custom-widgets' );
}














