<?php
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Phi\PhiHooks\Controller;


use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * File controller.
 *
 * @category    Controller
 * @package     TYPO3
 * @subpackage  tx_filelist
 * @author      Xavier Perseguers <xavier@causal.ch>
 * @copyright   Causal Sàrl
 * @license     http://www.gnu.org/copyleft/gpl.html
 */
class XtFileController extends \Causal\FileList\Controller\FileController
{

  /**
   * Listing of files.
   *
   * @param string $path Optional path of the subdirectory to be listed
   * @param bool $download
   * @return void|string
   */
  public function listAction($path = '',$download=false)
  {


     
    
    if($download == true && strpos($path,"/fileadmin/user_upload") === 0){
      $filename = urldecode($path);

      $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable("sys_file");
      $shortenedPath = str_replace("/fileadmin","",$filename);
      
      $res = $queryBuilder->select("*")->from("sys_file")->where(
        $queryBuilder->expr()->eq('identifier', $queryBuilder->createNamedParameter($shortenedPath))
      )->executeQuery();

      if(count($res->fetchAllAssociative())){
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        readfile(getcwd() . '/' . urldecode($path));
        exit;
      }
    }
    return parent::listAction($path);
    
  }
}
