<?php # -*- coding: utf-8 -*-
/**
 * Create a nav menu with very basic markup.
 *
 * @author Thomas Scholz http://toscho.de
 * @version 1.0
 */
class Sidebar_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $data_object   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    public function start_el(&$output, $data_object, $depth = -1, $args = NULL, $current_object_id = 0)
    {
        $output     .= '<li class="list-group-item depth-' . $depth . ' ' . ($data_object->current ? 'active" aria-current="true"' : '"') . '>'/*  . ' depth startel: ' . $depth */;
        $attributes  = '';

       /*  !empty($data_object->attr_title)
            // Avoid redundant titles
            and $data_object->attr_title !== $data_object->title
            and $attributes .= ' title="' . esc_attr($data_object->attr_title) . '"';

        !empty($data_object->url)
            and $attributes .= ' href="' . esc_attr($data_object->url) . '"';

        $attributes  = trim($attributes);
        $title       = apply_filters('the_title', $data_object->title, $data_object->ID); */

        /* $data_object_output = "$args->before<a $attributes>$args->link_before$title</a>"
            . "$args->link_after$args->after"; */

        $data_object_output = "hiii";

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el',
            $data_object_output,
            $data_object,
            $depth,
            $args
        );
    }

    /**
     * @see Walker::start_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    public function start_lvl(&$output, $depth = -1, $args = NULL)
    {
        $output .= (false ? '<ul class="list-group">' : '')/*  . ' depth startlvl: ' . $depth */;
    }

    /**
     * @see Walker::end_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    public function end_lvl(&$output, $depth = -1, $args = NULL)
    {
        $output .= (false ? '</ul>' : '')/*  . ' depth endlvl: ' . $depth */;
    }

    /**
     * @see Walker::end_el()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    function end_el(&$output, $data_object, $depth = -1, $args = NULL)
    {
        $output .= '</li>'/*   . ' depth endel: ' . $depth */;
    }
}
