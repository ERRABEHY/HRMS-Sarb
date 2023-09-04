<?php 
  class Presences extends Controller 
  {
    public function Presence()
    {

      $suerModel = $this->models('Attendance');
      $data['users'] = $suerModel->getUsers();
       
       $userData = [];

      foreach ($data['users'] as $key => $value) {
        $userName = $value->employee;
        $userAbt = $value->absnt;
        $userPres = $value->present;
        $userType = $value->boolean;
        $presentDay = $value->presentDay;
        $Dept = $suerModel->getDprt($userName);

       $userData[] = [
        'empName' => $userName,
        'Absences' => $userAbt,
        'Presences' => $userPres,
        'presentDay' => $presentDay,
        'Dept' => $Dept,
       ];

      }

      $data['employees'] = $userData;

        $this->views('Home/Admin/presence', $data);

    }
  }