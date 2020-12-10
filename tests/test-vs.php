<?php
/**
 * Class SampleTest
 *
 * @package View_Shortcodes
 */

/**
 * Sample test case.
 */
class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {
		$flag = false;
		if(view_shortcodes_admin_settings_page() != '' )
			$flag = true;
		$this->assertSame(true, $flag);
	}
}
