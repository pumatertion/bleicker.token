<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Account\Account;
use Bleicker\Account\AccountInterface;
use Bleicker\Token\AbstractSessionToken;

/**
 * Class SessionExistsToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class SessionExistsToken extends AbstractSessionToken {

	/**
	 * @return $this
	 */
	public function injectCredential() {
		return $this;
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		return $this;
	}

	/**
	 * @return AccountInterface
	 */
	public function reconstituteAccountFromSession() {
		return new Account('john');
	}
}
