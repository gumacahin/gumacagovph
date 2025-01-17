<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2010-2017 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class SectionIteratorObjects {

	public $start = 'It worked the first time.';

	protected $_data = array(
		array( 'item' => 'And it worked the second time.' ),
		array( 'item' => 'As well as the third.' ),
	);

	public function middle() {
		return new ArrayIterator( $this->_data );
	}

	public $final = 'Then, surprisingly, it worked the final time.';
}
