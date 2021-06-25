<?php 
/**
 Plugin Name: Bloquer
 Description: cleaning default behaviour of Wordpress
 Version: 1
 Author: MH
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class Bloquer{
  
  public function __construct(){

    $this->feeds();
    $this->cleanHeaderMeta();
    $this->accentuationUploadedMedia();
    $this->comments();
    $this->pingback();
  }

  private function disable_all_feeds() {
    wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
  }

  private function feeds(){
    add_action('do_feed', array($this,'disable_all_feeds'), 1);
    add_action('do_feed_rdf', array($this,'disable_all_feeds'), 1);
    //add_action('do_feed_rss', array($this,'disable_all_feeds'), 1);
    add_action('do_feed_rss2', array($this,'disable_all_feeds'), 1);
    add_action('do_feed_atom', array($this,'disable_all_feeds'), 1);
  }

  //pour ne plus afficher automatiquement les liens vers flux */
  private function cleanHeaderMeta(){

    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'index_rel_link' ); // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that 
    remove_action('wp_head', 'meta_generator_tag');
  }

  private function accentuationUploadedMedia(){
    add_filter('sanitize_file_name', 'remove_accents' );
  }

  private function comments(){
    add_filter('comments_open', array($this,'wpc_comments_closed'), 10, 2);
  }

  public function wpc_comments_closed(){
    return false;
  }

  private function pingback(){
    add_filter( 'xmlrpc_methods', array($this,'remove_xmlrpc_pingback_ping') );
  }

  private function remove_xmlrpc_pingback_ping( $methods ) {
    unset( $methods['pingback.ping'] );
    return $methods;
  }

}

new Bloquer();