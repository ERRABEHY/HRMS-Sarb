<?php require_once '../app/views/Inc/header.php'; ?>

    <title>Employee Dashboard</title>
  </head>
  <body>
    <div class="grid-container">
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="userName" ><?= "Mrs. ".$_SESSION['userName'] ?></div>
        <div class="header-right">
          <a href="/Sarb-HRMS/public/Homes/login">
            <span class="material-symbols-outlined">logout</span>
          </a>
        </div>
      </header>
           <aside id="sidebar">
              <div class="sidebar-title">
                <div class="sidebar-brand">
                  <span class="material-icons-outlined ">inventory</span> S.A.R.B
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
              </div>
      
              <ul class="sidebar-list">
                <li class="sidebar-list-item">
                  <a href="/Sarb-HRMS/public/Homes/dashboardUser" >
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                  </a>
                </li>
                <li class="sidebar-list-item">
                  <a href="../Employees/staf.html" >
                    <span class="material-icons-outlined"> face</span> Employees
                  </a>
                <li class="sidebar-list-item">
                  <a href="../salaries/salaries.html" >
                    <span class="material-icons-outlined">credit_score</span> salaries
                  </a>
                </li>
                <li class="sidebar-list-item">
              <a href="/Sarb-HRMS/public/Requests/RequestUser" >
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

      <!-- Main -->
      
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">
          <a href ="#"  class="card">
            <div class="card-inner">
              <p class="text-primary">Presents</p>
              <span class="material-symbols-outlined text-green">how_to_reg</span>
            </div>
            <span class="text-primary font-weight-bold"><?= $data['attendance']->present ?></span>
          </a>

          <a href ="#" class="card">
            <div class="card-inner">
              <p class="text-primary">Absents</p>
              <span class="material-symbols-outlined text-red">unpublished</span>
            </div>
            <span class="text-primary font-weight-bold"><?= $data['attendance']->absnt?></span>
          </a>
          <a href ="/Sarb-HRMS/public/Requests/RequestUser" class="card">
            <div class="card-inner">
              <p class="text-primary">Requests</p>
              <span class="material-symbols-outlined text-blue1">notification_add</span>
            </div>
            <span class="text-primary font-weight-bold"><?= $data['NbrRequest'] ?></span>
          </a>
          <a href ="../salaries/salaries.html" class="card">
            <div class="card-inner">
              <p class="text-primary">Salaries</p>
              <span class="material-symbols-outlined text-green1">payments</span>
            </div>
            <span class="text-primary font-weight-bold">79/</span>
          </a>
          <a href ="../Events/Events.html" class="card">
            <div class="card-inner">
              <p class="text-primary">Events</p>
              <span class="material-symbols-outlined text-red1">today</span>
            </div>
            <span class="text-primary font-weight-bold">79/</span>
          </a>

        </div>
     </main>
    </div>
  </div>
<style>
    body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: #e6e8ed;
  color: #666666;
  font-family: "Montserrat", sans-serif;
}

.material-icons-outlined, .material-symbols-outlined {
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
.text-blue1 {
  color: #0b409c;
}

.text-green1 {
  color: #086d32;
}
.text-red1 {
  color: #7e080e;
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
.header-right  a span {
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
  padding: 20px ;
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
}

.main-title {
  display: flex;
  justify-content: space-between;
}


.main-title > p {
  font-size: 20px;
}

.main-cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  margin: 20px 0;
}

.card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 25px;
  background-color: #ffffff;
  box-sizing: border-box;
  border: 1px solid #d2d2d3;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
  position: relative;
}

.main-cards a {
  text-decoration: none;
  transition: 1s;
}
.main-cards a:hover {
  box-shadow: 10px 16px 10px -4px rgba(0, 0, 0, 0.2);
  margin: -5px;
}
.card:first-child {
  border-left: 7px solid #246dec;
}
.card:nth-child(2) {
  border-left: 7px solid #f5b74f;
}
.card:nth-child(3) {
  border-left: 7px solid #367952;
}
.card:nth-child(4) {
  border-left: 7px solid #cc3c43;
}
.card:nth-child(5) {
  border-left: 7px solid #0b409c;
}
.card:nth-child(6) {
  border-left: 7px solid #086d32;
}
.card:nth-child(7) {
  border-left: 7px solid #7e080e;
}

.card > span {
  font-size: 20px;
  font-weight: 600;
}

.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-inner > p {
  font-size: 18px;
}

.card-inner > span {
  font-size: 35px;
}



/* ---------- MEDIA QUERIES ---------- */


/* Medium <= 992px */
@media screen and (max-width: 1200px) {
  .grid-container {
    grid-template-columns: 1fr;
    grid-template-rows: 0.2fr 3fr;
    grid-template-areas:
      "header"
      "main";
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
  .header .userName {  
    font-size: 10px;
    left: 50%;
    position: absolute;
    transform: translateX(-50%);
}
}

/* Small <= 768px */
@media screen and (max-width: 768px) {
  .main-cards {
    grid-template-columns: 1fr;
    gap: 10px;
    margin-bottom: 0;
  }

  .charts {
    grid-template-columns: 1fr;
    margin-top: 30px;
  }
}

/* Extra Small <= 576px */
@media screen and (max-width: 576px) {
  .header-left {
    display: none;
  }
}
</style>
<?php require_once '../app/views/Inc/footer.php'; ?>

 

    