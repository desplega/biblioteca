<!-- Sidebar -->
<aside id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
            <span class="material-icons-outlined">library_books</span> Biblioteca
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
    </div>

    <ul class="sidebar-list">
        <a href="/">
            <li class="sidebar-list-item">
                <span class="material-icons-outlined">dashboard</span> Inicio
            </li>
        </a>
        <a href="/libro">
            <li class="sidebar-list-item">
                <span class="material-icons-outlined">book</span> Libros
            </li>
        </a>
        <?php
        if (Login::isAdmin() || Login::hasPrivilege(500)) {
        ?>
            <a href="/tema">
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">label</span> Temas
                </li>
            </a>
            <a href="/socio">
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">person</span> Socios
                </li>
            </a>
        <?php
        }
        ?>
        <?php
        if (Login::isAdmin()) {
        ?>
            <a href="/usuario">
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">account_circle</span> Usuarios
                </li>
            </a>
        <?php
        }
        ?>
    </ul>
</aside>
<!-- End Sidebar -->