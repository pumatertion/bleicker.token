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
		$this->getCredential()->setValue('foo');
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
