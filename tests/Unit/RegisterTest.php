<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Token\Tokens;
use Tests\Bleicker\Token\Unit\Fixtures\TokenToRegister;
use Tests\Bleicker\Token\UnitTestCase;

/**
 * Class RegisterTest
 *
 * @package Tests\Bleicker\Token\Unit
 */
class RegisterTest extends UnitTestCase {

	protected function setUp() {
		parent::setUp();
		Tokens::prune();
	}

	protected function tearDown() {
		parent::tearDown();
		Tokens::prune();
	}

	/**
	 * @test
	 */
	public function registerTest(){
		TokenToRegister::register('foo');
		$this->assertInstanceOf(TokenToRegister::class, Tokens::get('foo'));
	}

}
