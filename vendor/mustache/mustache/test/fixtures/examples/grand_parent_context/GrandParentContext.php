<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2010-2017 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class GrandParentContext {

	public $grand_parent_id = 'grand_parent1';
	public $parent_contexts = array();

	public function __construct() {
		$this->parent_contexts[] = array(
			'parent_id'      => 'parent1',
			'child_contexts' => array(
				array( 'child_id' => 'parent1-child1' ),
				array( 'child_id' => 'parent1-child2' ),
			),
		);

		$parent2                 = new stdClass();
		$parent2->parent_id      = 'parent2';
		$parent2->child_contexts = array(
			array( 'child_id' => 'parent2-child1' ),
			array( 'child_id' => 'parent2-child2' ),
		);

		$this->parent_contexts[] = $parent2;
	}
}
