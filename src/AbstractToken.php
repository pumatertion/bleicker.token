<?php

namespace Bleicker\Token;

use Bleicker\Account\Credential;
use Bleicker\Account\CredentialInterface;
use Bleicker\ObjectManager\ObjectManager;
use ReflectionClass;

/**
 * Class AbstractToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractToken implements TokenInterface {

	/**
	 * @var CredentialInterface
	 */
	protected $credential;

	/**
	 * @var string
	 */
	protected $status = TokenInterface::AUTHENTICATION_NOT_REQUIRED;

	public function __construct() {
		$this->credential = new Credential();
	}

	/**
	 * @return $this
	 */
	protected function initialize() {
		$this->injectCredential();
		if ($this->getCredential()->getValue() !== NULL && $this->getCredential()->getAccount() === NULL) {
			$this->status = TokenInterface::AUTHENTICATION_REQUIRED;
		}
	}

	/**
	 * @return CredentialInterface
	 */
	public function getCredential() {
		return $this->credential;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return $this
	 */
	public function authenticate() {

		$this->initialize();

		if ($this->getStatus() !== self::AUTHENTICATION_REQUIRED) {
			return $this;
		}

		if($this->getCredential()->getAccount() === NULL){
			$this->fetchAndSetAccount();
		}

		if ($this->getCredential()->getAccount() !== NULL) {
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
	public static function register($alias = NULL) {
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
