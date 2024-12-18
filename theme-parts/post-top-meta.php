<?php
/**
 * Template part for displaying post meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
$meta_html = '';
$meta_html .= pbmit_meta_date( '', true );
$meta_html .= pbmit_meta_author();
$meta_html .= pbmit_meta_category();
$meta_html .= pbmit_meta_comment();
