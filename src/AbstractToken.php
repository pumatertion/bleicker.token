<?php

namespace Bleicker\Token;

/**
 * Class AbstractToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractToken implements TokenInterface {

	/**
	 * @var string
	 */
	protected $credentials;

	/**
	 * @var string
	 */
	protected $status = TokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN;

	/**
	 * @return string
	 */
	public function getCredentials() {
		return $this->credentials;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}
}
