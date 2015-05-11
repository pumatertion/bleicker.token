<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Account\AccountInterface;
use Bleicker\Token\AbstractSessionToken;

/**
 * Class SessionNotExistsToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class SessionNotExistsToken extends AbstractSessionToken {

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
		return NULL;
	}
}
