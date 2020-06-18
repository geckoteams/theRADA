<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Informant extends CI_Controller {

        public function index()
        {
			$this->load->library('session');
			$this->load->library('email');
			$this->load->model('Database');
			$this->load->helper('url');
			$head_data['PAGE_TITLE']="Informant";
			$this->load->view('header',$head_data);
			if (!$this->session->userdata('logged_in'))
			{
				header('Location: '.base_url().'');
			}
			else
			{
				$childDetail=$this->Database->getRow('child_of_user','user_id','10');
				$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
				
				$probQue=$this->Database->getAllRecord('questionnaires_probes');
				$extraQue=$this->Database->getAllRecord('questionnaires_extras');
				if(count($childDetail)>0)
				{
					foreach($childDetail as $child)
					{
						$childId[]="'".$child->child_id."'";
					}
				}
				$childrens=implode(', ',$childId);
				$childsvalues=$this->Database->getchildByIdIN('children',$childrens);
				$data['childs']=$childsvalues;
				$data['masterquestions']=$masterQuestion;
				$data['probquestion']=$probQue;
				$data['extraquestion']=$extraQue;
				
				$this->load->view('tpl_informant',$data);
				$this->load->view('modal',$data);
				$this->load->view('footer');
			}
        }
		public function giveAnswers()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$this->load->helper('url');
			?>
			<?php
		}
}

