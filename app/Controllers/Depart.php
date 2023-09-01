<?php 
  class Depart extends Controller 
  {
    public function dashboard()
    {       
           $userModel = $this->models('Dahboard');
            $data['dprt'] = $userModel->getDprt();

            $departmentData = [];

            foreach ($data['dprt'] as $key => $value) {
                $departmentId = $value->id;
                $departmentName = $value->dpName;
                $departmentHead = $value->headDpt; 
                $employeeCount = $userModel->getSum($departmentName);

                $departmentData[] = [
                    'id' => $departmentId,
                    'name' => $departmentName,
                    'headDpt' => $departmentHead,
                    'employee_count' => $employeeCount,
                ];
            }

            $data['departmentData'] = $departmentData;
            $this->views('Home/Admin/department', $data);


    }
    
    public function editdpt()
    {   
           $userModel = $this->models('Dahboard');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editdpt']))
        {
            $data['id'] = $_POST['dprId'];

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
            $data['Id'] = $_POST['Id'];
            $data['department_name'] = $_POST['department_name'];
            $data['head_department'] = $_POST['head_department'];

            $userModel->Update($data['Id'], $data['department_name'], $data['head_department'] );


        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del'])) {
            $data['Id'] = $_POST['dprId'];
            $userModel->del($data['Id']);

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addNewDpr'])) {
            
            $data['headName'] = $_POST['headName'];
            $data['dptName'] = $_POST['dptName'];
            $permission = $userModel->check($data['dptName'], $data['headName']);
            if (!$permission ) {
                $userModel->Insert($data['dptName'], $data['headName']);       
            }else{
                $data['message'] = 'data already in the database';
            }
        }  
       $this->dashboard();
    }

  }