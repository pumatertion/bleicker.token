<?php

namespace Bleicker\Token;

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
	 * @return void
	 */
	public function injectCredential();

	/**
	 * @return boolean
	 */
	public function isCredentialValid();

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
