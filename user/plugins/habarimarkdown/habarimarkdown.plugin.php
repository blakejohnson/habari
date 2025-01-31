<?php

/**
 * A Markdown plugin for Habari
 *
 * @package habarimarkdown
 */

require_once "markdown.php";
require_once "smartypants.php";

class HabariMarkdown extends Plugin
{
	const VERSION = '0.4.4';
	
	public function action_init()
	{
		// Added by Caius Durling <dev@caius.name> <http://caius.name/>
		// Escapes unsafe chars in the title
		Format::apply( 'htmlescape', 'post_title_out' );
		
		
		Format::apply( 'markdown', 'post_content_out' );
		Format::apply( 'markdown', 'post_content_summary' );
		Format::apply( 'markdown', 'post_content_more' );
		Format::apply( 'markdown', 'post_content_excerpt' );
		Format::apply( 'markdown', 'comment_content_out' );
	}

	/**
	 * Adds a Configure action to the plugin
	 * 
	 * @param array $actions An array of actions that apply to this plugin
	 * @param string $plugin_id The id of a plugin
	 * @return array The array of actions
	 */
	public function filter_plugin_config( $actions, $plugin_id )
	{
		if ( $this->plugin_id() == $plugin_id ){
			$actions[]= 'Configure';		
		}
		return $actions;
	}
	
	/**
	 * Creates a UI form to handle the plugin configuration
	 *
	 * @param string $plugin_id The id of a plugin
	 * @param array $actions An array of actions that apply to this plugin
	 */
	public function action_plugin_ui( $plugin_id, $action )
	{
		if ( $this->plugin_id()==$plugin_id && $action=='Configure' )
			{
			$form = new FormUI( strtolower(get_class( $this ) ) );
			$form->append( 'checkbox', 'enable SmartyPants', 'option:habarimarkdown__smarty', _t('Enable SmartyPants') );
			$form->append( 'submit', 'save', _t( 'Save' ) );
			$form->out();
			}
	}

	/**
	 * Filter Atom Feed
	 * @param SimpleXMLElement $feed_entry the Atom feed entry
	 * @param Post $post The post
	 * @return SimpleXMLElement the filtered Atom feed entry
	 */
	public function action_atom_add_post( $feed_entry, $post )
	{
		$feed_entry->content = markdown( $post->content );
		return $feed_entry;
	}
}

class MarkdownFormat extends Format
{
	// try and take over autop to prevent conflicts...
	// there really should be a "remove" in Format!
	public static function autop( $content )
	{
		return $content;
	}
	
	public static function markdown( $content )
	{
		$smarty_enabled = Options::get( 'habarimarkdown__smarty') || false;
		if ( $smarty_enabled ) {
			return SmartyPants( Markdown ($content ) );
		}
		else {
			return Markdown( $content );
		}
	}
}

?>
