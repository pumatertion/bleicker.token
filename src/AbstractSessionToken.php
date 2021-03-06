<?php

namespace Bleicker\Token;

use Bleicker\Account\AccountInterface;
use Bleicker\Account\Credential;

/**
 * Class AbstractToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractSessionToken extends AbstractToken implements SessionTokenInterface {

	/**
	 * @return $this
	 */
	protected function initialize() {
		parent::initialize();
		if ($this->status === TokenInterface::AUTHENTICATION_REQUIRED) {
			$this->clearSession();
			return $this;
		}
		$reconstitutedAccountFromSession = $this->reconstituteAccountFromSession();
		if ($reconstitutedAccountFromSession instanceof AccountInterface) {
			$this->credential = new Credential(SessionTokenInterface::CREDENTIAL_VALUE, $reconstitutedAccountFromSession);
			$this->status = TokenInterface::AUTHENTICATION_SUCCESS;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public final function getSessionKey() {
		return static::class;
	}

	/**
	 * @return boolean
	 */
	public function logout() {
		$this->clearSession();
		return parent::logout();
	}
}
