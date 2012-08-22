<?php

function minify_init() {
	//make sure this runs after everyone else is done
	elgg_register_plugin_hook_handler('view', 'js/elgg', 'minify_views_js', 1000);
	elgg_register_plugin_hook_handler('view', 'css/elgg', 'minify_views_css', 1000);
}

function minify_views_js($hook, $type, $content, $params) {
	if (include_once dirname(__FILE__) . '/vendors/min/lib/JSMin.php') {
		return JSMin::minify($content);
	}
}

function minify_views_css($hook, $type, $content, $params) {
	if (include_once dirname(__FILE__) . '/vendors/min/lib/CSS.php') {
		return Minify_CSS::minify($content);
	}
}

elgg_register_event_handler('init', 'system', 'minify_init');
