<?php

/*
==========================================================
	This software package is intended for use with 
	ExpressionEngine.	ExpressionEngine is Copyright © 
	2002-2009 EllisLab, Inc. 
	http://ellislab.com/
==========================================================
	THIS IS COPYRIGHTED SOFTWARE, All RIGHTS RESERVED.
	Written by: Travis Smith
	Copyright (c) 2009 Hop Studios
	http://www.hopstudios.com/software/
--------------------------------------------------------
	Please do not distribute this software without written
	consent from the author.
==========================================================
	Files:
	- pi.listifier.php
----------------------------------------------------------
	Purpose: 
	- Makes a block of text into list items
----------------------------------------------------------
	Patch Credits:
	- Brandon Kelly, brandon-kelly.com
==========================================================
*/

$plugin_info = array(
						'pi_name'			=> 'Listifier',
						'pi_version'		=> '1.0',
						'pi_author'			=> 'Travis Smith',
						'pi_author_url'		=> 'http://www.hopstudios.com/software/',
						'pi_description'	=> 'Makes a block of text into list items',
						'pi_usage'			=> Listifier::usage()
					);


class Listifier {
	
	var $return_data;
	
	// ----------------------------------------
	//  Constructor
	// ----------------------------------------
	
	function Listifier()
	{
		// Define stuff
		global $TMPL;
		$text = "";

		// Fetch parameters
		$text = $TMPL->tagdata;
		
		if (($separator = $TMPL->fetch_param('separator')) === FALSE) $separator = "\n";
		if (($node = $TMPL->fetch_param('node')) === FALSE) $node = "li";

		// put in li tags between each item
		$TMPL->tagdata = str_replace($separator, "</{$node}>\n<{$node}>" , $TMPL->tagdata);
		// and at the beginning and end
		$TMPL->tagdata = "<{$node}>" . $TMPL->tagdata . "</{$node}>";
		
		// Return it
		$this->return_data =  $TMPL->tagdata;
	}
		 
		
	// ----------------------------------------
	//  Plugin Usage
	// ----------------------------------------
	
	// This function describes how the plugin is used.
	// Make sure and use output buffering
	
	function usage()
	{
	ob_start(); 
?>
To use this plugin, wrap the block of text you want to be processed by it between these tag pairs:

{exp:listifier separator="," node="li"}

:replace me:

{/exp:listifier}

Please see <a href="http://www.hopstudios.com/software/">http://www.hopstudios.com/software/</a> for additional documentation.</p>

<?php
	$buffer = ob_get_contents();
		
	ob_end_clean(); 
	
	return $buffer;
	}
	// END

}
?>
