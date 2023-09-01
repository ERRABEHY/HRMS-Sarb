<?php require_once '../app/views/Inc/header.php'; ?>

    <title>Admin Department</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap" rel="stylesheet">
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel = "stylesheet">
   </head>
  <body>
    <div class = "grid-container">
      <header class = "header">
        <div class = "menu-icon" onclick = "openSidebar()">
          <span class = "material-icons-outlined">menu</span>
        </div>
        <div class = "header-right">
          <span class = "material-icons-outlined">account_circle</span>
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
              <a href="dashboard" >
                <span class="material-icons-outlined">dashboard</span> Dashboard
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="department" >
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
              <a href="../Presence/Presence.html" >
                <span class="material-icons-outlined">view_list  </span> Presence
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="../salaries/salaries.html" >
                <span class="material-icons-outlined">credit_score</span> salaries
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="../Requests/Requests.html" >
                <span class="material-icons-outlined"> note_alt</span> Requests 
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="../Events/Events.html" >
                <span class="material-icons-outlined"> event </span> Events
              </a>
            </li>
          </ul>
        </aside>
  <!-- End Sidebar -->     
      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>Departments</h2>
        </div>
          <table class="main-cards dpt">
               <th >
                  <tr class="th">
                    <td>Id </td>
                    <td>Detdartment Name</td>
                    <td>Head Department Name</td>
                    <td>Employees Number</td>
                    <td >Operation</td>
                  </tr>
               </th>
                <tbody class="tbody">
                    <?php
                     foreach ($data['departmentData'] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['headDpt']; ?></td>
                        <td><?php echo $value['employee_count']; ?></td>
                        <td>
                        <form action="editdpt" method="post">
                            <input type="hidden" name="dprId" value=" <?= $value['id'] ?>">
                            <button type="submit" name="editdpt">
                            <span class="material-symbols-outlined edit">edit</span>
                            </button>
                            <button type="submit" name="del">
                                <span class="material-symbols-outlined del">delete</span>
                            </button>
                        </form>
                        </td>
                     <?php 
                    echo "</tr>";
                    }
                    ?>            
                </tbody>
          </table>
          hr
           <form class="add-department-section" action="" method="post">
          <h2>Add a New Department</h2>
          <div class="add-department-form">
            <input type="text" name="dptName" id="newDepartmentName" placeholder="Enter department name">
            <input type="text" name="headName" id="newHeadName" placeholder="Enter the Head of department ">
            <button type="submit" id="addDepartmentButton">Add Department</button>
          </div>
        </form>
        </div>

       
        </div>
       
      
      </main>
      <!-- End Main -->
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
  grid-area: header;
  position: relative;
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
.menu-icon {
  display: none;
  cursor: pointer;
}
/* Center the welcome text horizontally and vertically */
.header-welcome {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-grow: 1; /* Take up remaining space to center the text */
  font-weight: bold;
  font-size: 20px; /* Adjusted font size */
  color: #333333; /* Set the color to a darker shade */
}

/* Style for the green text */
.green-text {
  color: #367952; /* Green color */
}

/* Style for the SRA text */
.sra-text {
  color: #367952; /* Green color */
  font-weight: bold;
  margin-right: 5px; /* Add some spacing between "SRA" and "Administration" */
}

/* Style for the gray text */
.gray-text {
  color: #333333; /* Darker color */
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

/* ---------- MAIN ---------- */

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

.main-cards {
  color: black;
  width: 100%;

}
table td {
  text-align: center;
}
.main-cards td {
  padding: 10px;
}
.main-cards .tbody td {
  color: #666262ce;
}
.main-cards .tbody {
  color: white;
}
.main-cards .th {
  background-color: #b3aeaea1;
}
.main-cards .th td {
  padding: 15px;
}
.main-cards td .material-symbols-outlined {
  color: white;
  padding: 5px;
  border-radius: 30px;
  opacity: 0.7;
}
.main-cards td .del {
  background-color: rgba(255, 0, 0, 0.685);
}
.main-cards button {
  border: 0px;
  outline: 0px;
  background-color: transparent;
  cursor: pointer;
}
.main-cards td .edit {
 background-color: rgba(0, 128, 0, 0.671);
}


/* ---------- MEDIA QUERIES ---------- */

/* Medium <= 992px */

@media screen and (max-width: 992px) {
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
 
  .main-cards .main-title {
    text-align: center;
  }

  .main-cards .th {
    display: none;
  }

  .main-cards .tbody tr {
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 6px;
    margin-bottom: 10px;
  }

  .main-cards td {
    padding: 10px;
  }

  .main-cards td .material-symbols-outlined {
    padding: 3px;
    border-radius: 50%;
    opacity: 1;
  }

  .add-department-section {
    margin-top: 20px;
  }

  .add-department-form {
    flex-direction: column;
    align-items: stretch;
  }

  .add-department-form input[type="text"] {
    width: 100%;
    margin-right: 0;
    margin-bottom: 10px;
  }

  .add-department-form button {
    width: 100%;
    padding: 10px;
    margin: 0;
  }
}


.add-department-section {
  margin-top: 20px;
  grid-column: sidebar;
  grid-row: 2 / 3;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 6px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.add-department-section h2 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #333333;
}

.add-department-form {
  display: flex;
  align-items: center;
}

.add-department-form input[type="text"] {
  flex-grow: 1;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 10px;
}

.add-department-form button {
  padding: 10px 20px;
  background-color: #22c55e;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.add-department-form button:hover {
  background-color: #1c9951;
}



@media screen and (max-width: 768px) {
  .main-cards {
    grid-template-columns: 1fr;
    gap: 10px;
    margin-bottom: 0;
  }
}


</style>

    

<?php require_once '../app/views/Inc/footer.php'; ?>
