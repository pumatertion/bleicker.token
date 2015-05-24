<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Account\Account;
use Bleicker\Account\AccountInterface;
use Bleicker\Token\AbstractSessionToken;

/**
 * Class SessionExistsAndCredentialArrivedToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class SessionExistsAndCredentialArrivedToken extends AbstractSessionToken {

	/**
	 * @return void
	 */
	public function injectCredential() {
		$this->getCredential()->setValue('newCredentials');
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		$account = new Account('newAndNotReconstitutedFromSession');
		$this->getCredential()->setAccount($account);
		return $this;
	}

	/**
	 * @return AccountInterface
	 * @throws \Exception
	 */
	public function reconstituteAccountFromSession() {
		throw new \Exception('This exception should never be thrown. There should be no reconstitution from session if new credential arrives.');
	}

	/**
	 * @return void
	 */
	public function clearSession() {
	}
}
