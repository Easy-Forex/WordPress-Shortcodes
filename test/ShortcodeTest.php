<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Shortcode.php';

/**
 * Tests for Shortcode class
 */
class ShortcodeTest extends PHPUnit_Framework_TestCase {

	/**
	 * Content data provider
	 * 
	 * Provide a list of strings with shortcodes and their expected parsed results.
	 * 
	 * @return array
	 */
	public function getContent() {
		return array(
				// No supported shortcodes
				array('lorem ipsum', 'lorem ipsum'),
				array('lorem [foobar] ipsum', 'lorem [foobar] ipsum'),
				
				// Single shortcode
				array('lorem ipsum [demo] lorem ipsum', 'lorem ipsum tag="demo" attrs="0=" and content="" lorem ipsum'),
				array('lorem ipsum [demo param1] lorem ipsum', 'lorem ipsum tag="demo" attrs="0=param1" and content="" lorem ipsum'),
				array('lorem ipsum [demo param1=value1] lorem ipsum', 'lorem ipsum tag="demo" attrs="param1=value1" and content="" lorem ipsum'),
				array('lorem ipsum [demo param1="value1"] lorem ipsum', 'lorem ipsum tag="demo" attrs="param1=value1" and content="" lorem ipsum'),
				
				// Single shortcode with content block
				array('lorem ipsum [demo]block[/demo] lorem ipsum', 'lorem ipsum tag="demo" attrs="0=" and content="block" lorem ipsum'),
				array('lorem ipsum [demo param1]block[/demo] lorem ipsum', 'lorem ipsum tag="demo" attrs="0=param1" and content="block" lorem ipsum'),
				array('lorem ipsum [demo param1=value1]block[/demo] lorem ipsum', 'lorem ipsum tag="demo" attrs="param1=value1" and content="block" lorem ipsum'),
				array('lorem ipsum [demo param1="value1"]block[/demo] lorem ipsum', 'lorem ipsum tag="demo" attrs="param1=value1" and content="block" lorem ipsum'),
		
				// Multiple same shortcodes
				array('lorem [demo] ipsum lorem [demo] ipsum', 'lorem tag="demo" attrs="0=" and content="" ipsum lorem tag="demo" attrs="0=" and content="" ipsum'),
				array('lorem [demo]block[/demo] ipsum lorem [demo]block[/demo] ipsum', 'lorem tag="demo" attrs="0=" and content="block" ipsum lorem tag="demo" attrs="0=" and content="block" ipsum'),

				// Multiple different shortcodes
				array('lorem [test] ipsum lorem [test] ipsum', 'lorem tag="test" attrs="0=" and content="" ipsum lorem tag="test" attrs="0=" and content="" ipsum'),
				array('lorem [test]block[/test] ipsum lorem [test]block[/test] ipsum', 'lorem tag="test" attrs="0=" and content="block" ipsum lorem tag="test" attrs="0=" and content="block" ipsum'),

			);
	}
	
	/**
	 * Test shortcode parsing
	 * 
	 * @dataProvider getContent
	 */
	public function test_parse($content, $expected) {
		$shortcode = new Shortcode();
		$result = $shortcode->parse($content);
		$this->assertEquals($expected, $result);
	}
}
?>
