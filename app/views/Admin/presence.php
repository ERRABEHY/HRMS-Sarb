<?php require_once '../app/views/Inc/header.php'; ?>
<title>Presence Dashboard</title>
  </head>
  <body>
    <div class="grid-container">
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-right">
            <a href="/Sarb-HRMS/public/Homes/login">
            <span class="material-symbols-outlined">logout</span>
          </a>
          
        </div>
      </header>
      <!-- End Header -->
        <!-- Sidebar -->
        <aside id="sidebar">
          <div class="sidebar-title">
            <div class="sidebar-brand">
              <span class="material-icons-outlined ">inventory</span> S.A.R.B
            </div>
            <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
          </div>
  
          <ul class="sidebar-list">
                <li class="sidebar-list-item">
                  <a href="/Sarb-HRMS/public/Homes/dashboard" >
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="/Sarb-HRMS/public/Depart/dashboard" >
                    <span class="material-icons-outlined">
                      assured_workload </span> Departments
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="../Employees/staf.html" >
                    <span class="material-icons-outlined"> face</span> Employees
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="/Sarb-HRMS/public/Presences/Presence" >
                    <span class="material-icons-outlined">view_list  </span> Presence
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="../salaries/salaries.html" >
                    <span class="material-icons-outlined">credit_score</span> salaries
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="/Sarb-HRMS/public/Requests/Request" >
                    <span class="material-icons-outlined"> note_alt</span> Requests 
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="../Events/Events.html" >
                    <span class="material-icons-outlined"> event </span> Events
                  </a>
                </li>
        </aside>
      <main class="main-container">
        <div class="main-title">
          <h2>Presence Of Today</h2>
        </div>
          <table class="mainData">
               <th >
                  <tr class="th">
                    <td>Id </td>
                    <td>Employees</td>
                    <td >Status</td>
                  </tr>
               </th>
                <tbody class="tbody">
                   <?php 
                    $id = 1;
                    foreach ($data['employeesPr'] as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $value['empName'] ?></td>
                            <?php  
            
                            if ($value['presentDay'] == 1) {
                                echo "<td class='Present'>". "Present" . "</td>";
                            } else {
                                echo "<td class='Absent'>". "Absent" . "</td>";
                            }
                            ?>
                        </tr>                  
                    <?php
                    } 
                    ?>      
                </tbody>
          </table>
          <br>
          <hr>
          <br>
          <div class="main-title">
          <h2>Attendance History </h2>
        </div>
          <table class="mainData">
               <th>
                  <tr class="th">
                    <td>Id </td>
                    <td>Employees</td>
                    <td class="text-green">Presences</td>
                    <td class="text-red">Absences</td>
                  </tr>
               </th>
                <tbody class="tbody">
                  <?php 
                    $id = 1;
                    foreach ($data['employeesPr'] as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $value['empName'] ?></td>
                            <td><?= $value['Presences'] ?></td>
                            <td><?= $value['Absences'] ?></td>
                        </tr>                  
                    <?php
                    } 
                    ?>  
                </tbody>
          </table>
          </div>
        </div>    
        
      </main>
      <style>
        
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: #e6e8ed;
  color: #666666;
  font-family: "Montserrat", sans-serif;
}

.material-icons-outlined {
  vertical-align: middle;
  line-height: 1px;
}

.text-primary {
  color: #666666;
}

.text-blue {
  color: #246dec;
}

.text-red {
  color: #cc3c43;
}

.text-green {
  color: #367952;
}

.text-orange {
  color: #f5b74f;
}

.font-weight-bold {
  font-weight: 600;
}

.grid-container {
  display: grid;
  grid-template-columns: 260px 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 3fr;
  grid-template-areas:
    "sidebar header header header"
    "sidebar main main main";
  height: 100vh;
}


/* ---------- HEADER ---------- */


.header {
  position: relative;
  grid-area: header;
  height: 70px;
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px 0 30px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}
.header-right {
  position: absolute;
  right: 20px;
}
.header-right  a {
  color: #666666;
}
.menu-icon {
  display: none;
  cursor: pointer;
}


/* ---------- SIDEBAR ---------- */

#sidebar {
  grid-area: sidebar;
  height: 100%;
  background-color: #21232d;
  color: #9799ab;
  overflow-y: auto;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

.sidebar-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 20px 20px 20px;
  margin-bottom: 30px;
}

.sidebar-title > span {
  display: none;
}

.sidebar-brand {
  margin-top: 15px;
  font-size: 20px;
  font-weight: 700;
}

.sidebar-list {
  padding: 0;
  margin-top: 15px;
  list-style-type: none;
}

.sidebar-list-item {
  padding: 20px 20px 20px 20px;
}

.sidebar-list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.sidebar-list-item > a {
  text-decoration: none;
  color: #9799ab;
}

.sidebar-responsive {
  display: inline !important;
  position: absolute;
  z-index: 12 !important;
}


.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 20px 20px;
  color: rgba(255, 255, 255, 0.95);
}
.main-title {
  display: flex;
  justify-content: space-between;
  color: #312020; /* Set the color to black */
}
.mainData {
  grid-area: main;
  color: black;
  width: 100%;
}
table td {
  text-align: center;
  position: relative;

}
.mainData td {
  padding: 10px;
}
.mainData .tbody td {
  color: #666262ce;
}
.mainData .tbody {
  color: white;
}
.mainData .th {
  background-color: #b3aeaea1;
}

.mainData .th td {
  padding: 15px;
}

.mainData .tbody tr td:last-child {
  padding: 5px;
  width: 100px;
  border-radius: 30px;
  margin: 20px;
}

.mainData tr .Absent {
  color: red;
}

.mainData tr .Present {
 color: rgba(0, 128, 0, 0.671);
}

@media screen and (max-width: 1200px) {
  .grid-container {
    grid-template-columns: 1fr;
    grid-template-rows: 0.2fr 3fr;
    grid-template-areas:
      'header'
      'main';
  }

  #sidebar {
    display: none;
  }

  .menu-icon {
    display: inline;
  }

  .sidebar-title > span {
    display: inline;
  }

  .mainData .main-title {
    text-align: center;
  }

  .mainData .tbody td {
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 6px;
    margin-bottom: 10px;
    overflow: hidden;
  }
  
  .mainData td {
    padding: 10px;
  }
}



      </style>
<?php require_once '../app/views/Inc/footer.php'; ?>
