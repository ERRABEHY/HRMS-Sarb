<?php 
  class Presences extends Controller 
  {
    public function Presence()
    {

      $suerModel = $this->models('Attendance');
      $data['users'] = $suerModel->getUsers();
       
       $userData = [];

      foreach ($data['users'] as $key => $value) {
        $userId = $value->employee_id ;
        $userAbt = $value->absnt;
        $userPres = $value->present;
        $presentDay = $value->presentDay;
        $username = $suerModel->getUserName($userId);

       $userData[] = [
        'empId' => $userId,
        'empName' => $username->first_name . " " . $username->last_name,
        'Absences' => $userAbt,
        'Presences' => $userPres,
        'presentDay' => $presentDay,
       ];

      }

      $data['employeesPr'] = $userData;

        $this->views('Home/Admin/presence', $data);

    }
  }