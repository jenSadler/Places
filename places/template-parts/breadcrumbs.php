  <?php
  $sep  = "";
  if ( is_front_page() ) {
    return;
  }

  $defaults = array(
    //'seperator'   =>  '»',
    'id'          =>  'ah-breadcrumb',
    'classes'     =>  'ah-breadcrumb',
    'home_title'  =>  esc_html__( 'Home', '' )
  );

  echo '<div class="holdBreadcrumbs">';
  echo '<ul id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';

  // Creating home link
  echo '<li class="item"><a href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></li>' . $sep;

  if ( is_single() ) {

        // Get posts type
        $post_type = get_post_type();
    
        // If post type is not post
        if( $post_type != 'post' ) {
    
          $post_type_object   = get_post_type_object( $post_type );
          $post_type_link     = get_post_type_archive_link( $post_type );
    
          echo '<li class="item item-cat"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></li>'. $sep;
    
        }
        else if(has_category('special-module')){
          echo '<li class="item item-cat"><a href="' . get_page_link( get_page_by_path( 'students' )) . '">'. get_the_title( get_page_by_path( 'students' )).'</a></li>'.$sep;
          echo '<li class="item-current item"><span><a href="#mainTitle">'. get_the_title() .'</a></span></li>';

        }
        else{
          echo '<li class="item item-cat"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">'.get_the_title(get_option( 'page_for_posts' )).'</a></li>'.$sep;
          echo '<li class="item-current item"><span><a href="#mainTitle">'. get_the_title() .'</a></span></li>';
        }
	} 
  else if ( is_page() ) {

    // Standard page
    if( $post->post_parent ) {

      // If child page, get parents
      $anc = get_post_ancestors( $post->ID );

      // Get parents in the right order
      $anc = array_reverse( $anc );

      // Parent page loop
      if ( !isset( $parents ) ) $parents = null;
      foreach ( $anc as $ancestor ) {

        $parents .= '<li class="item-parent item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></li>' . $sep;

      }

      // Display parent pages
      echo $parents;

      // Current page
      echo '<li class="item-current item"><span><a href="#">'. single_post_title('', FALSE)  .'</a></span></li>';

    } else {

      // Just display current page if not parents
      echo '<li class="item-current item"><span><a href="#">'. get_the_title() .'</a></span></li>';

    }
	} 
  else if ( is_search() ) {

    // Search results page
    echo '<li class="item-current item"><span><a href="#">Search results for: '. get_search_query() .'</a></span></li>';

  } else if ( is_404() ) {

    // 404 page
    echo '<li class="item-current item"><span><a href="#">' . 'Error 404' . '</a></span></li>';

  }
	else if ( is_home() ) {
		// If child page, get parents
		$page_for_posts = get_option( 'page_for_posts' );
		// If child page, get parents
		$anc = get_post_ancestors( $page_for_posts );

		// Get parents in the right order
		$anc = array_reverse( $anc );
  
		// Parent page loop
		if ( !isset( $parents ) ) $parents = null;
		foreach ( $anc as $ancestor ) {
  
		  $parents .= '<li class="item-parent item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></li>' . $sep;
  
		}
  
		// Display parent pages
		echo $parents;
		
		 echo '<li class="item-current item"><span><a href="#" class="disabled">'. single_post_title('', FALSE) .'</a></span></li>';
	}
  else if(is_category()){
    echo '<li class="item item-cat"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">'.get_the_title(get_option( 'page_for_posts' )).'</a></li>'.$sep;
    echo '<li class="item-current item"><span><a href="#mainTitle">'. get_the_title() .'</a></span></li>';
  
  }
  else{
    echo '<li class="item-current item"><span><a href="#mainTitle">'. get_the_title() .'</a></span></li>';
  
  }

	echo "</ul></nav></div>";
	?>