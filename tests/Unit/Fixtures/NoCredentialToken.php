<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Account\Account;
use Bleicker\Token\AbstractToken;

/**
 * Class NoCredentialToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class NoCredentialToken extends AbstractToken {

	/**
	 * @return void
	 */
	public function injectCredential() {
		$this->getCredential()->setValue();
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		$account = new Account('john');
		$this->getCredential()->setAccount($account);
		return $this;
	}
}
