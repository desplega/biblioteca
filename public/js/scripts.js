/*
 * Código JS asociado a la plantilla Bob's Programming Academy Responsive Admin Dashboard
 * https://github.com/BobsProgrammingAcademy/responsive-admin-dashboard
 */

// SIDEBAR TOGGLE
var sidebarOpen = false;
var sidebar = document.getElementById('sidebar');

function openSidebar() {
  if(!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if(sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}
