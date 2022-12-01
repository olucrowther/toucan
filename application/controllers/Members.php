<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	
	public function member_form()
	{
        if($this->session->has_userdata('loggedIn')){

            if ( ! file_exists(APPPATH.'views/member-form.php'))
            {
                // Whoops, we don't have a page for that!

                show_404();
            }

            $data['title'] = 'Add Member Form';

            $data['page_link'] = 'member-form';

            $data['schools'] = $this->members_model->getSchools();

            $this->load->view('templates/header', $data);

            $this->load->view('templates/sidebar', $data);

            $this->load->view('member-form', $data);

            $this->load->view('templates/footer');

        }else{

            redirect( base_url() ,'refresh');

        }

	}

    public function member_list()
	{
        if($this->session->has_userdata('loggedIn')){
            if ( ! file_exists(APPPATH.'views/member-list.php'))
            {
                // Whoops, we don't have a page for that!

                show_404();
            }

            $data['members'] = $this->members_model->getMembersDetails();

            $data['page_link'] = 'member-list';

            $data['title'] = 'Member List';

            $this->load->view('templates/header', $data);

            $this->load->view('templates/sidebar', $data);

            $this->load->view('member-list', $data);

            $this->load->view('templates/footer');

        }else{

            redirect( base_url() ,'refresh');

        }


	}

    public function search_school_list()
	{
        if($this->session->has_userdata('loggedIn')){
            if ( ! file_exists(APPPATH.'views/member-list.php'))
            {
                // Whoops, we don't have a page for that!

                show_404();
            }

            $s_data = [];

            $s_data['country']  = $this->input->post('country');

            (@$s_data['country'] === null)? $s_data = $this->session->userdata('search') : $this->session->set_userdata('search', $s_data);

            $data['schools'] = $this->members_model->getSchoolDetailByCountry($s_data);

            $data['countries'] = $this->members_model->getCountries();

            $data['page_link'] = 'school-list';

            $data['title'] = 'School List';

            $this->load->view('templates/header', $data);

            $this->load->view('templates/sidebar', $data);

            $this->load->view('school-list', $data);

            $this->load->view('templates/footer');

        }else{

            redirect( base_url() ,'refresh');

        }


	}

    public function school_list()
	{
        if($this->session->has_userdata('loggedIn')){
            if ( ! file_exists(APPPATH.'views/school-list.php'))
            {
                // Whoops, we don't have a page for that!

                show_404();
            }

            $data['schools'] = $this->members_model->getSchoolDetails();

            $data['countries'] = $this->members_model->getCountries();

            $data['page_link'] = 'school-list';

            $data['title'] = 'School List';

            $this->load->view('templates/header', $data);

            $this->load->view('templates/sidebar', $data);

            $this->load->view('school-list', $data);

            $this->load->view('templates/footer');

        }else{

            redirect( base_url() ,'refresh');

        }


	}

    public function member_chart()
	{
        if($this->session->has_userdata('loggedIn')){
            if ( ! file_exists(APPPATH.'views/member-chart.php'))
            {
                // Whoops, we don't have a page for that!

                show_404();
            }


            $result = $this->members_model->getSchoolDetails();
    
            foreach($result as $row) {
    
                $data['label'][] = $row['school_name'];
    
                $data['data'][] = (int) $row['no_of_students'];
    
            }
    
            $data['chart_data'] = json_encode($data);

            $data['title'] = 'Member Chart';

            $data['page_link'] = 'member-chart';

            $this->load->view('templates/header', $data);

            $this->load->view('templates/sidebar', $data);

            $this->load->view('member-chart', $data);

            $this->load->view('templates/footer');

        }else{

            redirect( base_url() ,'refresh');

        }


	}

    public function add_member(){

        $name = $this->input->post('name');

        $email = $this->input->post('email');

        $school = $this->input->post('school');

        if($this->members_model->ifUserExists($email) > 0){

            echo "Member exists in DB already";

        }else{

            $id = $this->members_model->addMember($name, $email);

            if($id){

                for($i = 0; $i < count($school); $i++){

                    $result = $this->members_model->insertSchool($school[$i], $id);

                }

                echo 1;

            }else{

                echo "Error adding member";

            }

        }

    }

    public function exportMemberData(){
        // file name 
        $filename = 'members_'.date('Ymd').'.csv'; 

        header("Content-Description: File Transfer"); 

        header("Content-Disposition: attachment; filename=$filename"); 

        header("Content-Type: application/csv; ");
        
        // get data 
        $usersData = $this->members_model->getMembersDetails();
    
        // file creation 
        $file = fopen('php://output', 'w');
    
        $header = array("Name","Email","School"); 

        fputcsv($file, $header);

        foreach ($usersData as $key => $line){ 

            $schools = explode(',', $line['school']); 

            $line['school'] = '';

            for($i = 0; $i < count($schools); $i++){
                ($i != (count($schools) - 1))? $line['school'] .= $this->members_model->getSchool($schools[$i]).', ' : $line['school'] .= $this->members_model->getSchool($schools[$i]);
            }
            fputcsv($file, $line);

        }

        fclose($file); 

        exit; 
   
    }
}
