
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {  
    /**
     * Eventos - Area Administrativa
     *
     * @package     CodeIgniter
     * @subpackage  Controllers
     * @category    Area Administrativa
     * @author      Escritório Escola Dev Team
     * @link        http://www.semanatrans.esy.es
     * 
     * Este Controller foi projetado para exibir os eventos!
     */
    
    public function __construct(){
        parent::__construct();
        /* Esta condição verifica se algum
         * Usuario está logado
         * Caso não esteja logado é carregada a view de login
         */
        if(!$this->session->userdata('logado')){            
            redirect(base_url());            
        }        
    }
    public function index(){
        $this->load->model('eventosmodel');
        $dados['dia1'] = $this->eventosmodel->get_eventodia1();
        $dados['dia2'] = $this->eventosmodel->get_eventodia2();
        $dados['dia3'] = $this->eventosmodel->get_eventodia3();
        $this->load->view('admin/eventos_semana',$dados);
    }
    public function inscrever(){
        $dados['id_evento_cadas'] = $this->input->post('inscrever');
        $dados['nome'] = $this->session->userdata('nome');
        $this->db->insert('eventos_usuario', $dados);
        redirect('admin/paineladm');
    }
}