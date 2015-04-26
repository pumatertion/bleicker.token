<?php

namespace Bleicker\Token;

use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Session\SessionInterface;

/**
 * Class TokenManager
 *
 * @package Bleicker\Token
 */
class TokenManager implements TokenManagerInterface {

	const SESSION_INDEX = 'TOKENS';

	/**
	 * @param string $alias
	 * @param PrototypeTokenInterface $token
	 */
	public static function registerPrototypeToken($alias, PrototypeTokenInterface $token) {
		PrototypeTokenContainer::add($alias, $token);
	}

	/**
	 * @param string $alias
	 * @param SessionTokenInterface $token
	 */
	public static function registerSessionToken($alias, SessionTokenInterface $token) {
		if (!self::hasSessionToken($alias)) {
			/** @var SessionInterface $session */
			$session = ObjectManager::get(SessionInterface::class);
			$tokens = $session->get(self::SESSION_INDEX) ? : [];
			$tokens[$alias] = $token;
			self::setSessionTokens($tokens);
		}
	}

	/**
	 * @param string $alias
	 * @return PrototypeTokenInterface|NULL
	 */
	public static function getPrototypeToken($alias) {
		return PrototypeTokenContainer::get($alias);
	}

	/**
	 * @param $alias
	 * @return PrototypeTokenInterface|NULL
	 */
	public static function getSessionToken($alias) {
		if (self::hasSessionToken($alias)) {
			$tokens = self::getSessionTokens();
			return $tokens[$alias];
		}
		return NULL;
	}

	/**
	 * @param string $alias
	 * @return boolean
	 */
	public static function hasToken($alias) {
		return PrototypeTokenContainer::has($alias);
	}

	/**
	 * @param string $alias
	 * @return boolean
	 */
	public static function hasSessionToken($alias) {
		return array_key_exists($alias, self::getSessionTokens());
	}

	/**
	 * @param array $tokens
	 */
	public static function setSessionTokens(array $tokens = array()){
		/** @var SessionInterface $session */
		$session = ObjectManager::get(SessionInterface::class);
		$session->set(self::SESSION_INDEX, $tokens);
	}

	/**
	 * @return array
	 */
	public static function getPrototypeTokens() {
		return PrototypeTokenContainer::storage();
	}

	/**
	 * @return array
	 */
	public static function getSessionTokens() {
		/** @var SessionInterface $session */
		$session = ObjectManager::get(SessionInterface::class);
		return $session->get(self::SESSION_INDEX) ? : [];
	}
}
