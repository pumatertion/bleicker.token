<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Token\TokenInterface;
use Tests\Bleicker\Token\Unit\Fixtures\FailingToken;
use Tests\Bleicker\Token\Unit\Fixtures\NoCredentialToken;
use Tests\Bleicker\Token\Unit\Fixtures\SuccessSessionToken;
use Tests\Bleicker\Token\Unit\Fixtures\SuccessToken;
use Tests\Bleicker\Token\UnitTestCase;

/**
 * Class TokenTest
 *
 * @package Tests\Bleicker\Token\Unit
 */
class TokenTest extends UnitTestCase {

	/**
	 * @test
	 */
	public function successTokenTest() {
		$token = new SuccessToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->authenticate()->getStatus());
	}

	/**
	 * @test
	 */
	public function noCredentialsTokenTest() {
		$token = new NoCredentialToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->authenticate()->getStatus());
	}

	/**
	 * @test
	 */
	public function failingTokenTest() {
		$token = new FailingToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_FAILED, $token->authenticate()->getStatus());
	}
}
