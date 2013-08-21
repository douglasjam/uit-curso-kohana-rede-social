<?phpdefined('SYSPATH') or die('No direct script access.');class Template_Padrao extends Controller_Template {    public $template = 'template/padrao';    /**     * The before() method is called before your controller action.     * In our template controller we override this method so that we can     * set up default values. These variables are then available to our     * controllers if they need to be modified.     */    public function before() {        parent::before();                // valida login do usuário        if(!in_array(Request::current()->action(), array('login','cadastrar')) && Session::instance()->get('usuario') == NULL){            Request::current()->redirect(URL::base() . 'login');        }        if ($this->auto_render) {            // Initialize empty values            $this->template->title = 'Curso de Kohana';            $this->template->content = '';            $this->template->styles = array();            $this->template->scripts = array();        }    }    /**     * The after() method is called after your controller action.     * In our template controller we override this method so that we can     * make any last minute modifications to the template before anything     * is rendered.     */    public function after() {        if ($this->auto_render) {            $styles = array(                'media/css/estilo.css' => 'screen',            );            $scripts = array(            );            $this->template->styles = array_merge($this->template->styles, $styles);            $this->template->scripts = array_merge($this->template->scripts, $scripts);        }        parent::after();    }}