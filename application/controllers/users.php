<?php

class  Users extends CI_Controller{
    public function  registration(){
        
        
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');
        if($this->form_validation->run()==FALSE){
            $data['main_content'] = 'users/registration';
        
        $this->load->view('layouts/main', $data);
            
        }
        
        else{
             if($this->User_model->create_member()){
                 $this->session->set_flashdata('registered','You are now registered and can log in......');
                 
                 redirect('home/index');
                 
                 
             }
            
        }
    }
    public function login(){
        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');        
        
        if($this->form_validation->run() == FALSE){
            
            $data['main_content'] = 'users/login';
        
        $this->load->view('layouts/main', $data);
            
            $this->session->set_flashdata('login_failed', 'Sorry, the login info that you have entered is invalid or You may required a registration first');
            //redirect('home/index');
        } else {
           
           $username = $this->input->post('username');
           $password = $this->input->post('password');
               
           
           $user_id = $this->User_model->login_user($username,$password);
               
       
           if($user_id){
             
               $user_data = array(
                       'user_id'   => $user_id,
                       'username'  => $username,
                       'logged_in' => true
                );
                
               $this->session->set_userdata($user_data);
               $this->session->set_flashdata('login_success','You are now logged in....');
                                  
               redirect('home/index');
            } else {
                
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid or you may need a registration first');
                redirect('home/index');
            }
        }
    }
    public function  logout(){
        
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
         
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('home/index');
    }
    
    
    
    
    
}

