<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

class PeopleController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
    public function index() {
    	$list = $this->DMPLApi->call(
    			'people',
    			'list'
    			);
    	$this->set(compact('list'));
    }
    
    public function view($aId = null) {
    	$person = $this->DMPLApi->call(
    			'people',
    			'view',
    			array(
    					'Params' => array(
    							'CPFCNPJ' => $aId
    					)
    					
    			)
    			);
    	$this->set(compact('person'));
    }

}
