<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../db_connection.php");



if(($_SESSION['role'] !="A"))
{
	echo "You are trying to access a BAD Page. <a href='../login.php' >Login Again</a> ";
	session_destroy();
}
else{
?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - EMS Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">John Brown University</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading" display="none">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html" >
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["id"]; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Education Management System</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">View Students</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href='javascript:;' onclick='toggleData("S");'>View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">View Faculty</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href='javascript:;' onclick='toggleData("F");'>View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">View Departments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href='javascript:;' onclick='toggleData("D");'>View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">View Courses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<a class="small text-white stretched-link" href='javascript:;' onclick='toggleData("C");'>View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 d-md-none" id="studentTable">
                            <div class="card-header" id="dataDisplay">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Enrollment Year</th>
                                            <th>Major</th>
                                            <th>Cumulative GPA</th>
                                            <th>Graduation Year</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$i = 0;
										$sql_product="SELECT * FROM student_tab";
										$result_product=$connect->query($sql_product);
										while($row_product = $result_product->fetch_assoc())
										{
									?>
											<tr>
												<td> <?php echo $row_product["stu_id"]?></td>
												<td> <?php echo $row_product["stu_name"]?></td>
												<td> <?php echo $row_product["stu_year_of_enrollment"]?> </td>
												<td> <?php echo $row_product["stu_major"]?></td>
												<td> <?php echo $row_product["CGPA"]?></td>
												<td> <?php echo $row_product["year_of_graduation"]?></td>
											</tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
								<hr>
								<h3> Add New Student </h3>
								<form name="studentForm" method="POST" action="addToSDB.php">
									<input name="id" id="id" placeholder="Student ID"/><br>
									<input name="name" id="name" placeholder="Student Name"/><br>
									<input name="enrollyear" id="enrollyear" placeholder="Year of Enrollment"/><br>
									<input name="major" id="major" placeholder="Student Major"/><br>
									<input name="CGPA" id="CGPA" placeholder="Cumulative GPA"/><br>
									<input name="graduateyear" id="graduateyear" placeholder="Year of Graduation"/><br>
									
									<input type="submit" value="Add Student" />
								</form>
                            </div>
                        </div>
						<div class="card mb-4 d-md-none" id="facultyTable">
                            <div class="card-header" id="dataDisplay">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date of Joining</th>
                                            <th>Qualification</th>
                                            <th>Department</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$i = 0;
										$sql_product="SELECT * FROM faculty_tab";
										$result_product=$connect->query($sql_product);
										while($row_product = $result_product->fetch_assoc())
										{
									?>
											<tr>
												<td> <?php echo $row_product["fac_id"]?></td>
												<td> <?php echo $row_product["fac_name"]?></td>
												<td> <?php echo $row_product["fac_DOJ"]?> </td>
												<td> <?php echo $row_product["qualification"]?></td>
												<td> <?php echo $row_product["department"]?></td>
											</tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
								<hr>
								<h3> Add New Faculty </h3>
								<form name="studentForm" method="POST" action="addToFDB.php">
									<input name="id" id="id" placeholder="Faculty ID"/><br>
									<input name="name" id="name" placeholder="Faculty Name"/><br>
									<input type="date" name="doj" id="doj" placeholder="Date of Joining"/><br>
									<input name="qualification" id="qualification" placeholder="Qualification"/><br>
									<input name="department" id="department" placeholder="Department"/><br>
									<input type="submit" value="Add Faculty" />
								</form>
                            </div>
                        </div>
						<div class="card mb-4 d-md-none" id="departmentTable">
                            <div class="card-header" id="dataDisplay">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Chair</th>
                                            <th>Dean</th>
                                            <th>Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$i = 0;
										$sql_product="SELECT * FROM department_tab";
										$result_product=$connect->query($sql_product);
										while($row_product = $result_product->fetch_assoc())
										{
									?>
											<tr>
												<td> <?php echo $row_product["dept_id"]?> </td>
												<td> <?php echo $row_product["dept_name"]?> </td>
												<td> <?php echo $row_product["dept_chair"]?> </td>
												<td> <?php echo $row_product["dept_dean"]?> </td>
												<td> <?php echo $row_product["dept_budget"]?> </td>
											</tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
						<div class="card mb-4 d-md-none" id="courseTable">
                            <div class="card-header" id="dataDisplay">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" border-collapse="collapse">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Faculty ID</th>
                                            <th>Offered</th>
                                            <th>Credits</th>
                                            <th>Pre-requisit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$i = 0;
										$sql_product="SELECT * FROM courses_tab";
										$result_product=$connect->query($sql_product);
										while($row_product = $result_product->fetch_assoc())
										{
									?>
											<tr>
												<td> <?php echo $row_product["type"].$row_product["course_id"]?> </td>
												<td> <?php echo $row_product["course_name"]?> </td>
												<td> <?php echo $row_product["fac_id"]?> </td>
												<td> <?php echo $row_product["offered_in"]?> </td>
												<td> <?php echo $row_product["credits"]?> </td>
												<td> <?php echo $row_product["pre-req"]?> </td>
											</tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		<?php
	}
		?>
    </body>
</html>
