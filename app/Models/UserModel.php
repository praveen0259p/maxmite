<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class UserModel extends Model
    {
        protected $table='user_details';
        protected $allowedFields=['name','email','dob','phone','address','password','companyname','rights'];
        public function fetch_User($email,$password)
        {
            $array = array('email' => $email,'password'=>$password);
            $userfound= $this->where($array)->first();
            return $userfound;
        }
        public function fetch_User_Name($email)
        {
            $array = array('email' => $email);
            $userfound= $this->where($array)->find();
            return $userfound;
        }
        public function sendUser($username,$useremail,$userdob,$userphone,$useraddress,$userpasscode,$companyname,$userrole)
        {
                /* echo $username;echo "<br>";
                echo $useremail;echo "<br>";
                echo $userpasscode;echo "<br>";
                echo $userdob;echo "<br>";
                echo $userphone;echo "<br>";
                echo $useraddress;echo "<br>";
                echo $userrole;echo "<br>";
                echo $companyname; */
            $rslt=$this->insert(['name'=>$username,'email'=>$useremail,'dob'=>$userdob,'phone'=>$userphone,'address'=>$useraddress,'password'=>$userpasscode,'companyname'=>$companyname,'rights'=>$userrole]);
            return $rslt;
        }
        public function fetchalluserincompany($companyname)
        {
            $array = array('companyname' => $companyname);
            $totaluserincompany= $this->where($array)->find();
            return $totaluserincompany;
        }
        public function update_right($id,$useremail,$userrole)
        {
            $rslt=$this->update($id,['rights'=>$userrole]);
            return $rslt;
        }
    }
?>