<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Account\Account;
use Bleicker\Token\AbstractToken;

/**
 * Class SuccessToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class SuccessToken extends AbstractToken {

	/**
	 * @return void
	 */
	public function injectCredential() {
		$this->credential = 'foo';
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		$this->account = new Account();
		return $this;
	}
}
