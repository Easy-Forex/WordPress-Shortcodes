<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Shortcode.php';

/**
 * Tests for Shortcode class
 */
class ShortcodeTest extends PHPUnit_Framework_TestCase {

	public function getContent() {
		return array(
				array('this is a text without any shortcodes', 'this is a text without any shortcodes'),
			);
	}
	
	/**
	 * Test shortcode parsing
	 * 
	 * @dataProvider getContent
	 */
	public function test_parse($content, $expected) {
		$result = Shortcode::parse($content);
		$this->assertEquals($expected, $result);
	}
}
?>
