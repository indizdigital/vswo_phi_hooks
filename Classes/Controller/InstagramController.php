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
class InstagramController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

  /**
   * Listing of files.
   *
   * @return void|string
   */
  public function authAction()
  {
    $grantAccessTokenContent = file_get_contents("insta.data");

    $grantAccessTokenData = explode("---",$grantAccessTokenContent);
    $grantAccessToken = $grantAccessTokenData[0];
    $grantAccessTokenDatum = $grantAccessTokenData[1];
    if($grantAccessTokenDatum > (time() - (3600*24*55))){
      //take old token in first 55 days
      $this->view->assign("script","<script>
      var instagramToken = '" .$grantAccessToken . "';
      </script>");
    }else{
      //refresh token

      $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $grantAccessToken;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 20);
      // curl_setopt($ch,CURLOPT_POST,true);
      // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      $resultraw = curl_exec($ch);
      curl_close($ch);
      $result = json_decode($resultraw);
 
      //  if(isset($result->access_token) && $result->expires_in < (3600 * 24)){
      if(isset($result->access_token)){
        $oauthToken = $result->access_token;
          file_put_contents("insta.data",$oauthToken ."---" . time());
          $this->view->assign("script","<script>
          var instagramToken = '" .$oauthToken . "';
          </script>");
        }else{
          mail("tech@indiz.digital","Insta Error on " . $_SERVER["HTTP_HOST"],print_r($resultraw,true));
          file_put_contents("insta.error",$result);
        }
      }
    }

}
