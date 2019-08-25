<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        #sidebar .wrapper {
            display: flex;
            align-items: stretch;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            border-right: 1px solid #666666;
            background: #f7f7f7
                /*#7386D5*/
            ;
            color: #595959;
            transition: all 0.3s;
        }

        #sidebar a[data-toggle="collapse"] {
            position: relative;
        }

        #sidebar .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        i {
            width: 20px;
            height: 20px;
        }



        #sidebar a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }


        #sidebar .sidebar-header {
            padding-left: 22px;
            padding-right: 22px;
            padding-bottom: 0px;
            padding-top: 38px;
            /* background: #dedad9; */
            /* color: #db2d21; */
            font-weight: bold;
        }

        #sidebar ul.components {
            padding: 10px 0;
            padding-bottom: 0px;
            /* border-bottom: 1px solid gray;
            border-top: 1px solid gray; */
        }

        #sidebar ul p {
            color: #595959;
            padding: 5px;
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

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #595959;
            /* background: #dedad9; */
        }

        #sidebar ul ul a {
            font-size: 1.1em !important;
            /* padding: 8px; */
            padding-left: 50px !important;
            /* padding: 20px; */
            /* background: #dedad9; */
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h5>
                    <img class="img-fluid rounded-top rounded-bottom" src="/images/logo3.png"
                     style='width: 40px;border-radius: 5px;height: 45px;background-color: #ca0106;'> BSA Configurator
                </h5>
            </div>
            <ul class="list-inline components">
                    <li class="nav-item border-bottom border-top">
                <a class="dropdown-item" href="/">
                    <i class="fas fa-home"></i>&nbsp Configurator
                      </a>
                    </li>
                <li class="nav-item border-bottom border-top">
                    <a class="nav-link " style="border-color: gray;" href="/register">
                        <i class="fas fas fa-users"></i>
                        Users</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="nav-link" href="/posts">
                        <i class="fas fas fas fa-sticky-note"></i>
                        Posts</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="nav-link" href="/posts/create">
                        <i class="fas fas far fas fa-plus-square"></i>
                        Add Post</a>
                    </li>
                    {{-- <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true"
                        class="dropdown-toggle  border-top">Users</a>
                        <ul class="collapse list-unstyled show" id="homeSubmenu">
                            <li class="nav-item">
                                <a class="nav-link">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Patients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Assistants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Insurance Companies</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item border-bottom border-top">
                        <a class="nav-link" href="/about">
                            <i class="fab fa-hire-a-helper"></i>
                            Help</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link  border-bottom border-top">Inbox</a>
                        </li> --}}
                        <li class="nav-item border-bottom border-top">
                            <a class="nav-link" href="/prices">Antennas Prices</a>
                        </li>
                    </ul>
                </nav>

            </div>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');


            });

        });
    </script>
</body>

</html>
