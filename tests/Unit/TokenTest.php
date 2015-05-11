<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Account\AccountInterface;
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
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->getStatus());
		$this->assertInstanceOf(AccountInterface::class, $token->getAccount());
	}

	/**
	 * @test
	 */
	public function noCredentialsTokenTest() {
		$token = new NoCredentialToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->getStatus());
		$this->assertNull($token->getAccount());
	}

	/**
	 * @test
	 */
	public function failingTokenTest() {
		$token = new FailingToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_FAILED, $token->getStatus());
		$this->assertNull($token->getAccount());
	}
}
