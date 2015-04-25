<?php

namespace Bleicker\Token;

use Serializable;

/**
 * Interface SessionTokenInterface
 *
 * @package Bleicker\Token
 */
interface SessionTokenInterface extends Serializable {

	const AUTHENTICATION_NOCREDENTIALSGIVEN = TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN,
		AUTHENTICATION_REQUIRED = TokenInterface::AUTHENTICATION_REQUIRED,
		AUTHENTICATION_FAILED = TokenInterface::AUTHENTICATION_FAILED,
		AUTHENTICATION_SUCCESS = TokenInterface::AUTHENTICATION_SUCCESS;

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
