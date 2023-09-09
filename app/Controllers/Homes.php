<?php

class Homes extends Controller
{
     public function dashboardUser()
    {
        $userModel = $this->models('User');
        $data['message'] = "employee";
        $data['attendance'] = $userModel->getAttendance($_SESSION['employee-id']);
        $data['NbrRequest'] = $userModel->getRequest($_SESSION['employee-id']);
        $this->views('Home/Employee/dashboard', $data);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['passwd'];

            if (empty($email) || empty($password)) {
                $data['error'] = 'emptyInput';
                $this->views('Home/index', $data);
                return; 
            }

            $userModel = $this->models('User');
            $isValidUser = $userModel->validateUser($email, $password);

            if ($isValidUser) {
                 $dataUser   =  $userModel->getUser($email);
                $_SESSION['userName'] =  $dataUser->first_name . " " . $dataUser->last_name  ;
                $data['employee-id'] = $dataUser->employe_id ;
                $_SESSION['employee-id'] = $dataUser->employe_id ;
                $data['userName'] =  $data['employee-id'];
                $dateOfDB =  $userModel->checkAttendance($data['employee-id']);
                $presentDay = $userModel->getPrDay($data['employee-id']);

                if (date("Y-m-d") > $dateOfDB ) {
                    $userModel->addAbs();
                    $userModel->addPrs($data['employee-id']);
                } elseif (date("Y-m-d") == $dateOfDB && $presentDay == 0 ) {
                    $userModel->addPrs($data['employee-id']);
                }
                
                if (preg_match("/@rh.com$/i", $email)) {
                    $adminModel = $this->models('Admin');
                    $adminModel->getdept();
                    $data['departments'] = $adminModel->getdept();
                    $data['employees'] = $adminModel->getUsers();
                    $data['presents'] = $adminModel->getPrs();
                    $data['absents'] = $adminModel->getAbs();
                    $data['requests'] = $adminModel->getReqts();
                    $data['message'] = "Admin ";
                    $this->views('Home/Admin/Addashboard', $data);
                } else {
                    $this->dashboardUser();
                }
            } else {
                $data['error'] = 'Invalid email or password.';
                $this->views('Home/index', $data);
            }
        } else {
            $this->views('Home/index');
        }
    }

    public function dashboard()
    {
        $adminModel = $this->models('Admin');
        $adminModel->getdept();
        $data['departments'] = $adminModel->getdept();
        $data['employees'] = $adminModel->getUsers();
        $data['presents'] = $adminModel->getPrs();
        $data['absents'] = $adminModel->getAbs();
        $data['requests'] = $adminModel->getReqts();
        $data['message'] = "Admin ";
        $this->views('Home/Admin/Addashboard', $data);
    }
   
}

