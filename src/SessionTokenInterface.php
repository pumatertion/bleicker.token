<?php

namespace Bleicker\Token;

use Serializable;

/**
 * Interface SessionTokenInterface
 *
 * @package Bleicker\Token
 */
interface SessionTokenInterface extends Serializable {

	const AUTHENTICATION_NOCREDENTIALSGIVEN = PrototypeTokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN,
		AUTHENTICATION_REQUIRED = PrototypeTokenInterface::AUTHENTICATION_REQUIRED,
		AUTHENTICATION_FAILED = PrototypeTokenInterface::AUTHENTICATION_FAILED,
		AUTHENTICATION_SUCCESS = PrototypeTokenInterface::AUTHENTICATION_SUCCESS;

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
