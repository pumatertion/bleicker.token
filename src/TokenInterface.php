<?php

namespace Bleicker\Token;

use Bleicker\Account\AccountInterface;

/**
 * Class TokenInterface
 *
 * @package Bleicker\Token
 */
interface TokenInterface {

	const AUTHENTICATION_NOT_REQUIRED = 'authenticationNotRequired',
		AUTHENTICATION_REQUIRED = 'authenticationRequired',
		AUTHENTICATION_FAILED = 'authenticationFailed',
		AUTHENTICATION_SUCCESS = 'authenticationSuccess';

	/**
	 * @return AccountInterface
	 */
	public function getAccount();

	/**
	 * @return void
	 */
	public function injectCredential();

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount();

	/**
	 * @return string
	 */
	public function getStatus();

	/**
	 * @return $this
	 */
	public function authenticate();

	/**
	 * @param string $alias
	 * @return static
	 */
	public static function register($alias = NULL);
}
