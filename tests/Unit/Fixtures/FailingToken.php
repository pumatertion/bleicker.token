<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Token\AbstractToken;

/**
 * Class FailingToken
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class FailingToken extends AbstractToken {

	/**
	 * @return void
	 */
	public function injectCredential() {
		$this->getCredential()->setValue('bar');
	}

	/**
	 * @return $this
	 */
	public function fetchAndSetAccount() {
		$this->getCredential()->setAccount(NULL);
		return $this;
	}
}
