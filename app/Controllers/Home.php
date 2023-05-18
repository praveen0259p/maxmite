<?php

namespace App\Controllers;
use App\Models\CompanyModel;
use App\Models\UserModel;
class Home extends BaseController
{
    public function index()
    {
        if($this->session->get('isLoggedIn'))
        {
            return redirect()->to('/details');
        }
        else{
            echo view("./common/header");
            echo view('login');
            echo view("./common/footer");
        }
    }
    public function signup()
    { 
        if($this->session->get('isLoggedIn'))
        {
            return redirect()->to('/details');
        }else{
            echo view("./common/header");
            echo view('registration');
            echo view("./common/footer");
        }
        
    }
    public function company()
    {
       /*  echo "company function called";die; */
        $check=$this->validate([
            'company-name'=>'required',
            'admin-name'=>'required',
            'admin-email'=>'required|valid_email|is_unique[company_details.adminemail]',
            'admin-passcode'=>'required',
        ]);
        $error_msg=[];
        if(!$check)
        {
            $error_msg['validation']=$this->validator;
           /*  return redirect()->back()->withInput(); */
            echo view("./common/header");
            echo view('registration',$error_msg);
            echo view("./common/footer");
        }
        else
        {
            $companyname=$this->request->getPost('company-name');
            $adminname=$this->request->getPost('admin-name');
            $adminemail=$this->request->getPost('admin-email');
            $adminpasscode=md5($this->request->getPost('admin-passcode'));
            /* echo "company name is:".$companyname; */
            $companymodel=new CompanyModel();
            $useresult=$companymodel->check_company($companyname);
          
            if($useresult >0)
            {
                $this->session->setFlashdata('company','Company Already Registered');
                return redirect()->to('/signup');
            }
            else
            {
                 
                $companyinserted=$companymodel->Insert_Company($companyname,$adminname,$adminemail,$adminpasscode);
                if($companyinserted)
                {
                    echo "successfuly inserted in the database";
                }
                else{
                    echo "something error in insert query";
                }
            }
        } 
    }
    public function userauth()
    {
        $check=$this->validate([
            'email'=>'required|valid_email',
            'password'=>'required',
        ]);
        $error_msg=[];
        if(!$check)
        {
            $error_msg['validation']=$this->validator;
           /*  return redirect()->back()->withInput(); */
            echo view("./common/header");
            echo view('login',$error_msg);
            echo view("./common/footer");
        }
        else
        {
            $email=$this->request->getPost('email');
            $password=md5($this->request->getPost('password'));
            $usermodel= new UserModel();
            $companymodel=new CompanyModel();
            $useresult=$usermodel->fetch_User($email,$password);
            $companyresult=$companymodel->fetch_Company_Login($email,$password);
            if($useresult)
            {
                /* echo "<pre>";
                print_r($useresult);
                die; */
                $userresult = [
                    'companyname' =>$useresult['companyname'],
                    'username' => $useresult['name'],
                    'adminemail' => $useresult['email'], 
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($userresult);
                return redirect()->to('/details');
            }
            else if($companyresult){
                $companyresult = [
                    'companyname' => $companyresult['companyname'], 
                    'adminemail' => $companyresult['adminemail'],
                    'role' => $companyresult['role'],
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($companyresult);
                return redirect()->to('/details');
            }
            else{
               /*  echo "no user found";die; */
                $this->session->setFlashdata('msg', 'Invalid Credentials');
                return redirect()->to('/');
            } 
        }   
    }
    public function details()
    {
        if($this->session->get('isLoggedIn'))
        {
            $usermodel= new UserModel();
            $companymodel=new CompanyModel();
            /* echo $this->session->get('adminemail'); */
            $result['userdata']=$usermodel->fetch_User_Name($this->session->get('adminemail'));
            $result['companydata']=$companymodel->fetch_Company($this->session->get('adminemail'));
            $result['totalcompanydata']=$companymodel->fetchalluserincompany($this->session->get('companyname'));
            $result['totalusercompanydata']=$usermodel->fetchalluserincompany($this->session->get('companyname'));
            if($result)
            {
                echo view("./common/header");
                echo view("details",$result);
                echo view("./common/footer");
            }
        }
        else{
            return redirect()->to('/');
        }
        
    }
    public function adduser()
    {
        if($this->session->get('isLoggedIn') && $this->session->get('role')=='ADMIN')
        {
            $usermodel= new UserModel();
            $companymodel=new CompanyModel();
            /* echo $this->session->get('adminemail'); */
            $useresult=$usermodel->fetch_User_Name($this->session->get('adminemail'));
            $companyresult['data']=$companymodel->fetch_Company($this->session->get('adminemail'));
            echo view("./common/header");
            echo view('adduser',$companyresult);
            echo view("./common/footer");
        }else{
            return redirect()->to('/');
        }
    }  
    public function saveuser()
    {
        $usermodel= new UserModel();
        $companymodel=new CompanyModel();
        /* echo $this->session->get('adminemail'); */
        $useresult=$usermodel->fetch_User_Name($this->session->get('adminemail'));
        $companyresult['data']=$companymodel->fetch_Company($this->session->get('adminemail'));
        $check=$this->validate([
            'user-name'=>'required',
            'user-email'=>'required|valid_email|is_unique[user_details.email],|is_unique[company_details.adminemail]',
            'user-passcode'=>'required',
            'user-dob'=>'required',
            'user-phone'=>'required|min_length[10]|max_length[10]|numeric',
            'user-address'=>'required',
            'user-role'=>'required'
        ]);
        $error_msg=[];
        if(!$check)
        {
            $companyresult['validation']=$this->validator;
            /*  return redirect()->back()->withInput(); */
             echo view("./common/header");
             echo view('adduser',$companyresult);
             echo view("./common/footer");
        }
        else{
            $username=$this->request->getPost('user-name');
            $useremail=$this->request->getPost('user-email');
            $userpasscode=md5($this->request->getPost('user-passcode'));
            $userdob=date('Y-m-d',strtotime($this->request->getPost('user-dob')));
            $userphone=$this->request->getPost('user-phone');
            $useraddress=$this->request->getPost('user-address');
            $userrole=$this->request->getPost('user-role');
            $companyname=$this->session->get('companyname');
            $useresult=$usermodel->fetch_User_Name($useremail);
            $companyresult=$companymodel->fetch_Company($useremail);
            if($useresult xor $companyresult)
            {
                echo "user email already present in database";
            }
            else{

                $userinserted=$usermodel->sendUser($username,$useremail,$userdob,$userphone,$useraddress,$userpasscode,$companyname,$userrole);
                if($userinserted)
                {
                    echo "user records inserted successfully";
                    return redirect()->to('/details');
                }
                else{
                    echo "something error in insert query";
                }
                /* echo $username;echo "<br>";
                echo $useremail;echo "<br>";
                echo $userpasscode;echo "<br>";
                echo $userdob;echo "<br>";
                echo $userphone;echo "<br>";
                echo $useraddress;echo "<br>";
                echo $userrole;echo "<br>"; */
            }
            
        }
    }

    public  function logout() {
        if($this->session->get('isLoggedIn'))
        {
            $this->session->set(array('isLoggedIn' => '', 'companyname' => '','adminemail'=>'
            '));
            $this->session->destroy();
            return redirect()->to('/');
        }
        else{
            return redirect()->to('/');
        }
        
    }
    public function edituser($email)
    {
        if($this->session->get('isLoggedIn') && $this->session->get('role')=='ADMIN')
        {
        /* echo "id value is:".$email; */
            $usermodel= new UserModel();
            $companymodel=new CompanyModel();
            $companyresult['data']=$companymodel->fetch_Company($this->session->get('adminemail'));
            $companyresult['formdata']=$usermodel->fetch_User_Name($email);
        /*  echo "edit user controller called"; */
            echo view("./common/header");
            echo view('edittable',$companyresult);
            echo view("./common/footer");
        }
        else{
            return redirect()->to('/');
        }
        
    }
    public function editrights()
    {
        $usermodel= new UserModel();
        $companymodel=new CompanyModel();
        $useremail=$this->request->getPost('user-email');
        $check=$this->validate([
            'user-role'=>'required'
        ]);
        $error_msg=[];
        if(!$check)
        {
            $companyresult['data']=$companymodel->fetch_Company($this->session->get('adminemail'));
            $companyresult['validation']=$this->validator;
            $companyresult['formdata']=$usermodel->fetch_User_Name($useremail);
            echo view("./common/header");
            echo view('edittable',$companyresult);
            echo view("./common/footer");
        }
        else{
           
            $userrole=$this->request->getPost('user-role');
            $id=$this->request->getPost('id');
            $companyresult['data']=$companymodel->fetch_Company($this->session->get('adminemail'));
            $companyresult['formdata']=$usermodel->fetch_User_Name($useremail);
            $userupdate=$usermodel->update_right($id,$useremail,$userrole);
            if($userupdate)
            {
                return redirect()->to('/details');
            }else{
                echo "error in update query";
            }
           
        }
    }
}
