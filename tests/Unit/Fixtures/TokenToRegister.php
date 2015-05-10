<?php

namespace Tests\Bleicker\Token\Unit\Fixtures;

use Bleicker\Token\AbstractToken;

/**
 * Class TokenToRegister
 *
 * @package Tests\Bleicker\Token\Unit\Fixtures
 */
class TokenToRegister extends AbstractToken {

	/**
	 * Calculates token match score for provided argument.
	 *
	 * @param $argument
	 * @return bool|int
	 */
	public function scoreArgument($argument) {
		// TODO: Implement scoreArgument() method.
	}

	/**
	 * Returns true if this token prevents check of other tokens (is last one).
	 *
	 * @return bool|int
	 */
	public function isLast() {
		// TODO: Implement isLast() method.
	}

	/**
	 * Returns string representation for token.
	 *
	 * @return string
	 */
	public function __toString() {
		// TODO: Implement __toString() method.
	}
}
