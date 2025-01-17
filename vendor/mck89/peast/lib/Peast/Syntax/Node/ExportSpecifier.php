<?php
/**
 * This file is part of the Peast package
 *
 * (c) Marco Marchiò <marco.mm89@gmail.com>
 *
 * For the full copyright and license information refer to the LICENSE file
 * distributed with this source code
 */
namespace Peast\Syntax\Node;

/**
 * A node that represents a specifier in an export declaration.
 * For example "{a}" in: export {a}
 *
 * @author Marco Marchiò <marco.mm89@gmail.com>
 */
class ExportSpecifier extends ModuleSpecifier {

	/**
	 * Map of node properties
	 *
	 * @var array
	 */
	protected $propertiesMap = array(
		'exported' => true,
	);

	/**
	 * Exported identifier
	 *
	 * @var Identifier
	 */
	protected $exported;

	/**
	 * Returns the exported identifier
	 *
	 * @return Identifier
	 */
	public function getExported() {
		return $this->exported;
	}

	/**
	 * Sets the exported identifier
	 *
	 * @param Identifier $exported Exported identifier
	 *
	 * @return $this
	 */
	public function setExported( Identifier $exported ) {
		$this->exported = $exported;
		return $this;
	}
}
