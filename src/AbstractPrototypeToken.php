<?php

namespace Bleicker\Token;

/**
 * Class AbstractPrototypeToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractPrototypeToken implements PrototypeTokenInterface {

	/**
	 * @var string
	 */
	protected $credentials;

	/**
	 * @var string
	 */
	protected $status = PrototypeTokenInterface::AUTHENTICATION_NOCREDENTIALSGIVEN;

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
