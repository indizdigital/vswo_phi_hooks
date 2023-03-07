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
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
/**
 * This class is the text color view helper for the Fluid templating engine.
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class LinksViewHelper extends AbstractViewHelper {


	    public function initializeArguments()
	    {
	        $this->registerArgument('link', 'string', 'link', true);
	    }

		 public static function renderStatic(
		 		 array $arguments,
		 		 \Closure $renderChildrenClosure,
		 		 RenderingContextInterface $renderingContext) {


		return $_SERVER["REQUEST_URI"] . str_replace("fileadmin/user_upload","pdfs",$link);
	}

}

?>
