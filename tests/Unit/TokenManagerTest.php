<?php

namespace Tests\Bleicker\Token\Unit;

use Bleicker\Token\TokenManager;
use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Session\Session;
use Bleicker\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\Bleicker\Token\Unit\Fixtures\FailingToken;
use Tests\Bleicker\Token\Unit\Fixtures\SuccessSessionToken;
use Tests\Bleicker\Token\Unit\Fixtures\SuccessToken;
use Tests\Bleicker\Token\UnitTestCase;

/**
 * Class TokenManagerTest
 *
 * @package Tests\Bleicker\Token\Unit
 */
class TokenManagerTest extends UnitTestCase {

	/**
	 * @var SessionInterface
	 */
	protected $session;

	protected function setUp() {
		parent::setUp();
		ObjectManager::register(SessionInterface::class, new Session(new MockArraySessionStorage()));
		$this->session = ObjectManager::get(SessionInterface::class);
	}

	/**
	 * @test
	 */
	public function addTokenTest() {
		$tokenManager = new TokenManager();

		$tokenManager->registerPrototypeToken('foo', new SuccessToken());
		TokenManager::registerPrototypeToken('bar', new FailingToken());

		$this->assertTrue($tokenManager->hasToken('foo'));
		$this->assertTrue($tokenManager->hasToken('bar'));
		$this->assertTrue(TokenManager::hasToken('foo'));
		$this->assertTrue(TokenManager::hasToken('bar'));

		$this->assertInstanceOf(SuccessToken::class, $tokenManager->getPrototypeToken('foo'));
		$this->assertInstanceOf(FailingToken::class, $tokenManager->getPrototypeToken('bar'));
		$this->assertInstanceOf(SuccessToken::class, TokenManager::getPrototypeToken('foo'));
		$this->assertInstanceOf(FailingToken::class, TokenManager::getPrototypeToken('bar'));
	}

	/**
	 * @test
	 */
	public function addSessionToken() {
		TokenManager::registerSessionToken(SuccessSessionToken::class, new SuccessSessionToken());
		$this->assertTrue(TokenManager::hasSessionToken(SuccessSessionToken::class));
		$this->assertInstanceOf(SuccessSessionToken::class, TokenManager::getSessionToken(SuccessSessionToken::class));
	}
}
