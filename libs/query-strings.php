<?php 

function smamo_remove_query_strings_1( $src ){	
	$rqs = explode( '?ver', $src );
        return $rqs[0];
}

function smamo_remove_query_strings_2( $src ){
	$rqs = explode( '&ver', $src );
        return $rqs[0];
}

if ( !is_admin() ){
    add_filter( 'script_loader_src', 'smamo_remove_query_strings_1', 15, 1 );
    add_filter( 'style_loader_src', 'smamo_remove_query_strings_1', 15, 1 );
    add_filter( 'script_loader_src', 'smamo_remove_query_strings_2', 15, 1 );
    add_filter( 'style_loader_src', 'smamo_remove_query_strings_2', 15, 1 );
}