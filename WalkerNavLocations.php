<?php 


class WalkerNavLocations extends WordpressUikitMenuWalker {

	function start_lvl( &$output, $depth ) { //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\" >\n";
	}	

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { //li a span

		$indent = ($depth) ? str_repeat("\t",$depth) : '';

		$li_attribute = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = ($args->walker->has_children) ? 'uk-dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->has_children) {
			$classes[] = 'uk-nav uk-nav-dropdown';
		}

		$class_names = join( ' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names). '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="'. esc_attr( $id ) .'"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) . '"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) . '"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) . '"' : '';

		$attributes .= ! empty( $args->walker->has_children ) ? ' class="" data-uk-dropdown ': '';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<i class="uk-icon-chevron-right"></i></a>' : '</a>' ;
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
	}

	// function end_el( &$output, $item, $depth = 0, $args = array() ) {
	// 	$output .= "\n";
	// }

	// function end_lvl( &$output, $depth = 0, $args = array() ) {
	// 	$indent = str_repeat("\t", $depth);
	// 	$output .= "$indent\n";
	// }

}



	// function start_lvl( &$output, $depth = 0, $args = array() ) {
	// 	$indent = str_repeat("\t", $depth);
	// 	$output .= "\n$indent\n";
	// }

	// function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	// 	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	// 	$class_names = $value = '';
	// 	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	// 	$classes[] = 'menu-item-' . $item->ID;
	// 	$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	// 	$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	// 	$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	// 	$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	// 	$output .= $indent . '';
	// 	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	// 	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	// 	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	// 	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	// 	$item_output = $args->before;
	// 	$item_output .= '<a'. $attributes .'>';
	// 	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	// 	$item_output .= '</a>';
	// 	$item_output .= $args->after;
	// 	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	// }





?>