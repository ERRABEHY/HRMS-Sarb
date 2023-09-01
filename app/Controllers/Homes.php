<?php

class Homes extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['passwd'];

            if (empty($email) || empty($password)) {
                $data['error'] = 'emptyInput';
                $this->views('Home/index', $data);
                return; // Return to stop further execution
            }

            $userModel = $this->models('User');
            $isValidUser = $userModel->validateUser($email, $password);

            if ($isValidUser) {
                $data['userName'] =  $userModel->getUser($email);
                $dateOfDB =  $userModel->checkAttendance($data['userName']);
                $presentDay = $userModel->getPrDay($data['userName']);

                if (date("Y-m-d") > $dateOfDB ) {
                    $userModel->addAbs();
                    $userModel->addPrs($data['userName']);
                } elseif (date("Y-m-d") == $dateOfDB && $presentDay == 0 ) {
                    $userModel->addPrs($data['userName']);
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
                    $userModel = $this->models('User');
                    $data['attendance'] = $userModel->getAttendance($data['userName']);
                    $data['NbrRequest'] = $userModel->getRequest($data['userName']);
                    $this->views('Home/Employee/dashboard', $data);
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

