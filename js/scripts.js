/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {

         if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
             document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
function toggleData(type)
{
	switch(type)
	{
		case "F":
			document.getElementById("facultyTable").classList.toggle('d-md-none');
			break;
		case "S":
			document.getElementById("studentTable").classList.toggle('d-md-none');
			break;
		case "C":
			document.getElementById("courseTable").classList.toggle('d-md-none');
			break;
		case "P":
			document.getElementById("personalTable").classList.toggle('d-md-none');
			break;
		case "D":
			document.getElementById("departmentTable").classList.toggle('d-md-none');
			break;
	}
	return ;
}