<?php

namespace Bleicker\Token;

/**
 * Interface PrototypeTokenInterface
 *
 * @package Bleicker\Token
 */
interface PrototypeTokenInterface {

	const AUTHENTICATION_NOCREDENTIALSGIVEN = 'authenticationNoCredentialsGiven',
		AUTHENTICATION_REQUIRED = 'authenticationRequired',
		AUTHENTICATION_FAILED = 'authenticationFailed',
		AUTHENTICATION_SUCCESS = 'authenticationSuccess';

	/**
	 * @return $this
	 */
	public function injectCredentialsAndSetStatus();

	/**
	 * @return mixed
	 */
	public function getCredentials();

	/**
	 * @return string
	 */
	public function getStatus();

	/**
	 * @return $this
	 */
	public function authenticate();
}
