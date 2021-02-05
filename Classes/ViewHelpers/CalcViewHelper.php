<?php
namespace Phi\ViewHelpers;
/*                                                                        *
 * This script is backported from the TYPO3 Flow package "TYPO3.Fluid".   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
/**
 * This class is the text color view helper for the Fluid templating engine.
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class CalcViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {




	/**
     * return the category items
     *
     * @param \string $param1
     * @param \string $param2
     * @param \string $operation
     * @return \string
     */
	public function render($param1,$param2,$operation) {
			switch($operation){
				case "/":
					return $param1 / $param2;
					break;
			}
		;
	}

}

?>
