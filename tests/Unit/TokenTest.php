<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Token\TokenInterface;
use Tests\Bleicker\Token\Unit\Fixtures\FailingToken;
use Tests\Bleicker\Token\Unit\Fixtures\NoCredentialsToken;
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
	public function noCredentialsTokenTest() {
		$token = new NoCredentialsToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials');

		$token->injectCredentialsAndSetStatus();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials injected');

		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials after authentication');
	}

	/**
	 * @test
	 */
	public function failingTokenTest() {
		$token = new FailingToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials');

		$token->injectCredentialsAndSetStatus();
		$this->assertEquals(TokenInterface::AUTHENTICATION_REQUIRED, $token->getStatus(), 'Credentials injected and Auth required');

		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_FAILED, $token->getStatus(), 'Authentication failed with injected credentials');
	}

	/**
	 * @test
	 */
	public function successTokenTest() {
		$token = new SuccessToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials');

		$token->injectCredentialsAndSetStatus();
		$this->assertEquals(TokenInterface::AUTHENTICATION_REQUIRED, $token->getStatus(), 'Credentials injected and Auth required');

		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->getStatus(), 'Authentication failed with injected credentials');
	}

	/**
	 * @test
	 */
	public function successSessionTokenTest() {
		$token = new SuccessSessionToken();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN, $token->getStatus(), 'No Credentials');

		$token->injectCredentialsAndSetStatus();
		$this->assertEquals(TokenInterface::AUTHENTICATION_REQUIRED, $token->getStatus(), 'Credentials injected and Auth required');

		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->getStatus(), 'Authentication failed with injected credentials');
	}
}
