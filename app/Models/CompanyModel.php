<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class CompanyModel extends Model
    {
        protected $table='`company_details`';
        protected $allowedFields=['companyname','adminname','adminemail','adminpasscode'];
        /* function to fetch admin email */
        public function fetch_Company($adminemail)
        {
            $array = array('adminemail' => $adminemail);
            $companyfound= $this->where($array)->find();
            return $companyfound;
        }
        /* function to check if company exist or not */
        public function check_company($companyname)
        {
            $array = array('companyname' => $companyname);
            $companyfound= $this->where($array)->first();
           /*  echo "<pre>";
            print_r($companyfound);die; */
            return $companyfound;
        }
        /* function to check login for company and its email */
        public function fetch_Company_Login($email,$password)
        {
            $array = array('adminemail' => $email,'adminpasscode'=>$password);
            $userfound= $this->where($array)->first();
            return $userfound;
        }
        /* function to insert company in database */
        public function Insert_Company($companyname,$adminname,$adminemail,$adminpasscode)
        {
            $rslt=$this->insert(['companyname'=>$companyname,'adminname'=>$adminname,'adminemail'=>$adminemail,'adminpasscode'=>$adminpasscode,'role'=>'ADMIN']);
            return $rslt;
        }
        /* function to fetch all user in selected company */
        public function fetchalluserincompany($companyname)
        {
            $array = array('companyname' => $companyname);
            $totaluserincompany= $this->where($array)->find();
            return $totaluserincompany;
        }
    }
?>