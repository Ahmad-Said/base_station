    {{-- <head> --}}
        <style>
            #sidebar {
                min-width: 250px;
                max-width: 250px;
                min-height: 100vh;
                border-right: 1px solid #666666;
                background: #f7f7f7;
                color: #595959;
                transition: all 0.3s;
                /* left:250px; */
            }

            #sidebar .wrapper {
                display: flex;
                /* align-items: stretch; */
            }

            #sidebar.active {
                margin-left: -250px;
            }

            #sidebar a,
            a:hover,
            a:focus {
                color: inherit;
                text-decoration: none;
                transition: all 0.3s;
            }


            #sidebar .sidebar-header {
                padding-left: 25px;
                padding-right: 20px;
                padding-bottom: 0px;
                padding-top: 5px;
                font-weight: bold;
            }

            #sidebar ul li a {
                padding: 13px;
                padding-left: 30px;
                font-size: 1.0em;
                display: block;

            }

            #sidebar ul li a:hover {
                color: #db2d21;
                background: #fff;
            }

        </style>
    {{-- </head> --}}


<!-- Sidebar -->
<div id="sidebar" >
    <div class="sidebar-header">
        <h5>
            <img class="img-fluid rounded-top rounded-bottom" src="/images/logo3.png"
                style='width: 40px;border-radius: 5px;height: 45px;background-color: #ca0106;'> BSA Configurator
        </h5>
    </div>
    <ul class="list-inline components">
        <li class="nav-item border-bottom border-top">
            <a class="dropdown-item" href="/">
                <i class="fas fa-home"></i>
                &nbsp Configurator</a>
        </li>
        <li class="nav-item border-bottom border-top">
            <a class="nav-link " style="border-color: gray;" href="/register">
                <i class="fas fas fa-users"></i>
                &nbsp Users</a>
        </li>
        <li class="nav-item border-bottom border-top">
            <a class="nav-link" href="/posts">
                <i class="fas fas fas fa-sticky-note"></i>
                &nbsp Posts</a>
        </li>
        <li class="nav-item border-bottom border-top">
            <a class="nav-link" href="/posts/create">
                <i class="fas fas far fas fa-plus-square"></i>
                &nbsp Add Post</a>
        </li>

        <li class="nav-item border-bottom border-top">
            <a class="nav-link" href="/about">
                <i class="fab fa-hire-a-helper"></i>
                &nbsp Help</a>
        </li>
        <li class="nav-item border-bottom border-top">
            <a class="nav-link" href="/bands">
                <i class="fab fab fa-buysellads"></i>
                &nbsp Antennas Bands</a>
        </li>
    </ul>
</div>


    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>
