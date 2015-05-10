<?php

namespace Bleicker\Token;

use Bleicker\ObjectManager\ObjectManager;
use ReflectionClass;

/**
 * Class AbstractToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractToken implements TokenInterface {

	/**
	 * @var string
	 */
	protected $credential;

	/**
	 * @var string
	 */
	protected $status = TokenInterface::AUTHENTICATION_NOT_REQUIRED;

	/**
	 * @return $this
	 */
	protected final function initialize() {
		$this->injectCredential();
		if ($this->credential !== NULL) {
			$this->status = TokenInterface::AUTHENTICATION_REQUIRED;
		}
	}

	/**
	 * @return string
	 */
	protected final function getCredential() {
		return $this->credential;
	}

	/**
	 * @return string
	 */
	public final function getStatus() {
		return $this->status;
	}

	/**
	 * @return $this
	 */
	public final function authenticate() {

		$this->initialize();

		if ($this->getStatus() !== self::AUTHENTICATION_REQUIRED) {
			return $this;
		}

		if ($this->isCredentialValid()) {
			$this->status = self::AUTHENTICATION_SUCCESS;
			return $this;
		}

		$this->status = self::AUTHENTICATION_FAILED;
		return $this;
	}

	/**
	 * @param string $alias
	 * @return static
	 */
	public static final function register($alias = NULL) {
		if ($alias === NULL) {
			$alias = static::class;
		}
		$reflection = new ReflectionClass(static::class);
		/** @var static $instance */
		$instance = $reflection->newInstanceArgs(array_slice(func_get_args(), 1));
		/** @var TokensInterface $tokens */
		$tokens = ObjectManager::get(TokensInterface::class, function () {
			$tokens = new Tokens();
			ObjectManager::add(TokensInterface::class, $tokens, TRUE);
			return $tokens;
		});
		$tokens->add($alias, $instance);
		return $instance;
	}
}
