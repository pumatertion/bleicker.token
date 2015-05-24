<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Account\AccountInterface;
use Bleicker\Token\SessionTokenInterface;
use Bleicker\Token\TokenInterface;
use Tests\Bleicker\Token\Unit\Fixtures\FailingToken;
use Tests\Bleicker\Token\Unit\Fixtures\NoCredentialToken;
use Tests\Bleicker\Token\Unit\Fixtures\SessionExistsAndCredentialArrivedToken;
use Tests\Bleicker\Token\Unit\Fixtures\SessionExistsToken;
use Tests\Bleicker\Token\Unit\Fixtures\SessionNotExistsToken;
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
		$this->assertInstanceOf(AccountInterface::class, $token->getCredential()->getAccount());
	}

	/**
	 * @test
	 */
	public function noCredentialsTokenTest() {
		$token = new NoCredentialToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->getStatus());
		$this->assertNull($token->getCredential()->getAccount());
	}

	/**
	 * @test
	 */
	public function failingTokenTest() {
		$token = new FailingToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_FAILED, $token->getStatus());
		$this->assertNull($token->getCredential()->getAccount());
	}

	/**
	 * @test
	 */
	public function reconstructionFromSessionTest() {
		$token = new SessionExistsToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->getStatus());
		$this->assertInstanceOf(AccountInterface::class, $token->getCredential()->getAccount());
		$this->assertEquals('john', $token->getCredential()->getAccount()->getIdentity());
		$this->assertEquals(SessionTokenInterface::CREDENTIAL_VALUE, $token->getCredential()->getValue());
	}

	/**
	 * @test
	 */
	public function notReconstructionFromSessionIfAuthIsRequiredTest() {
		$token = new SessionExistsAndCredentialArrivedToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_SUCCESS, $token->getStatus());
		$this->assertInstanceOf(AccountInterface::class, $token->getCredential()->getAccount());
		$this->assertEquals('newAndNotReconstitutedFromSession', $token->getCredential()->getAccount()->getIdentity());
		$this->assertEquals('newCredentials', $token->getCredential()->getValue());
	}

	/**
	 * @test
	 */
	public function noReconstructionFromSessionTest() {
		$token = new SessionNotExistsToken();
		$token->authenticate();
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->getStatus());
		$this->assertNull($token->getCredential()->getAccount());
	}

	/**
	 * @test
	 */
	public function logoutTokensTest() {
		$token = new SessionExistsToken();
		$token->authenticate()->logout();
		$this->assertNull($token->getCredential()->getValue());
		$this->assertNull($token->getCredential()->getAccount());
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->getStatus());

		$token = new SuccessToken();
		$token->authenticate()->logout();
		$this->assertNull($token->getCredential()->getValue());
		$this->assertNull($token->getCredential()->getAccount());
		$this->assertEquals(TokenInterface::AUTHENTICATION_NOT_REQUIRED, $token->getStatus());
	}
}
