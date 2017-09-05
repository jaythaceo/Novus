<?php
function post_is_in_descendant_category( $cats, $_post = null ){
    foreach ( (array) $cats as $cat ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $cat, 'category');
        if( $descendants && in_category( $descendants, $_post ) )
            return true;
    }
    return false;
}
    if(in_category('programs-details')){
        include(get_template_directory().'/single-programs-details.php');
    }
    else if(in_category('success-stories')){
        include(get_template_directory().'/single-programs-details.php');
    }
    else if(in_category('programs')){
        include(get_template_directory().'/single-programs.php');
    }
    else if ( in_category( 6 ) || post_is_in_descendant_category( 6 ) ) {
        include(get_template_directory().'/single-news.php');
    }
    else {
        include(get_template_directory().'/single-news.php');
    }
?>

