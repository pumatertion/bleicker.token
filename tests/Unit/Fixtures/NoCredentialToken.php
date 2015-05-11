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
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		$this->account = new Account();
		return $this;
	}
}
