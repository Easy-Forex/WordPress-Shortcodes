<?php
/**
 * PHP5
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'BaseShortcode.php';

/**
 * Demo shortcode
 */
class DemoShortcode extends BaseShortcode {
	public static function getCallbacks() {
		return array(
				'demo' => array('DemoShortcode', 'doDemo'),
				'test' => array('DemoShortcode', 'doDemo'),
			);
	}

	/**
	 * Demo callback
	 * 
	 * This is a demo callback that simply returns all
	 * passed attributes, content, and a shortcode.
	 * 
	 * @param array|string $attrs Shortcode attributes
	 * @param string $content Content inside shortcode
	 * @param string $tag Shortcode tag being used
	 * @return string
	 */
	public static function doDemo($attrs, $content, $tag) {
		$result = '';

		if (!is_array($attrs)) {
			$attrs = array($attrs);
		}
		
		$result .= 'tag="' . $tag . '" ';
		$result .= 'attrs="';
		foreach ($attrs as $key => $value) {
			$result .= $key . '=' . $value . ' ';
		}
		$result = trim($result); // remove last space from attributes
		$result .= '" ';
		$result .= 'and content="' . $content . '"';

		return $result;
	}
}
?>
