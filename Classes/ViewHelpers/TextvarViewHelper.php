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
class TextvarViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	
	/**
	 * pageRepository
	 *
	 * @var \TYPO3\CMS\Frontend\Page\PageRepository
	 * @inject
	 */
	protected $pageRepository = NULL;
	
	/**
	 * search
	 *
	 * @var \array
	 */
	protected $search = array();
	
	
	/**
	 * replace
	 *
	 * @var \array
	 */
	protected $replace = array();
	
	
	/**
     * return the category items
     *
     * @param \string $html
     * @return \string
     */	
	public function render($html) {
		if(empty($this->vars)){
			$sr = array();
			$rootline = $this->pageRepository->getRootLine($GLOBALS['TSFE']->id);
			$vars = array();
			sort($rootline);
			foreach($rootline as $page){
				$vars = array_merge($vars,explode(PHP_EOL,$page["abstract"]));
			}
			$search = $replace = array();
			foreach($vars as $line){
				$s = trim(substr($line,0,strpos($line,"=")));
				$r =trim(substr($line,strpos($line,"=")+1));
				$sr[$s] =$r;
			} 
			$this->search = array_keys($sr);
			$this->replace = array_values($sr);
	  	}
		/*$validFields = array("title","subtitle");
		foreach($validFields as $field){
			$search[] = '$' . $field;
			$replace[] = $page[$field];
		}	*/	
		
		return str_replace($this->search,$this->replace,$html);
	}
	
}

?>