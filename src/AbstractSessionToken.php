<?php

namespace Bleicker\Token;

/**
 * Class AbstractPrototypeToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractSessionToken implements SessionTokenInterface {

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

	/**
	 * String representation of object
	 *
	 * @link http://php.net/manual/en/serializable.serialize.php
	 * @return string the string representation of the object or null
	 */
	public function serialize() {
		return $this->getStatus();
	}

	/**
	 * Constructs the object
	 *
	 * @link http://php.net/manual/en/serializable.unserialize.php
	 * @param string $serialized
	 * @return void
	 */
	public function unserialize($serialized) {
		$this->status = $serialized;
	}
}
