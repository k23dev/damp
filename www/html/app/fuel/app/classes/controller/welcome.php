<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
	public $view;
	private $layoutData;
	private $data;
	

	public function __construct(){

		// assign variables
		$this->layoutData = array();
        $this->layoutData['title'] = 'Home';
        $this->layoutData['site_title'] = 'My Website';
		
		$this->data = array();

        //assign views as variables, forced rendering
        $this->view = View::forge('layout/layout');
        $this->view->head = View::forge('layout/head', $this->layoutData);
        $this->view->header = View::forge('layout/header', $this->layoutData);
		$this->view->header->navbar=View::forge('layout/navbar', $this->layoutData);
        $this->view->content = View::forge('welcome/404', $this->layoutData);
        $this->view->footer = View::forge('layout/footer', $this->layoutData);
		$this->view->footer->defaultjs=View::forge('layout/defaultjs', $this->layoutData);

	}

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{

		$this->view->content  = View::forge('welcome/index',$this->data);

		return $this->view;

	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
