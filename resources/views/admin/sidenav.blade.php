<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        .wrapper {
            display: flex;
            align-items: stretch;
        }

        #sidebar.active {
            margin-left: -270px;
        }

        #sidebar {
            min-width: 270px;
            max-width: 270px;
            min-height: 100vh;
            border-right: 1px solid #666666;
            background: #dedad9
                /*#7386D5*/
            ;
            color: #595959;
            transition: all 0.3s;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }


        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }


        #sidebar .sidebar-header {
            padding: 22px;
            padding-bottom: 5px;
            padding-top: 50px;
            background: #dedad9;
            color: #db2d21;
            font-weight: bold;
        }

        #sidebar ul.components {
            padding: 20px 0;
            padding-bottom: 3px;
            /* border-bottom: 1px solid gray;
            border-top: 1px solid gray; */
        }

        #sidebar ul p {
            color: #595959;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 13px;
            padding-left: 30px;
            font-size: 1.3em;
            display: block;

        }

        #sidebar ul li a:hover {
            color: #db2d21;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #595959;
            background: #dedad9;
        }

        ul ul a {
            font-size: 1.1em !important;
            /* padding: 8px; */
            padding-left: 50px !important;
            /* padding: 20px; */
            background: #dedad9;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h2>
                    <img class="img-fluid img-thumbnail rounded-top" src="/images/rfsworld.png" width="60"
                        height="auto"> RFS World
                    <hr>
                </h2>
            </div>
            <ul class="list-inline components">
                <li class="nav-item">
                    <a class="nav-link border-bottom border-top" style="border-color: gray;" href="/register">Register
                        Salesman</a>
                </li>
                <li>
                    <a class="nav-link" href="/posts">Posts</a>
                </li>
                <li>
                    <a class="nav-link" href="/posts/create">Add Post</a>
                </li>
                <li class="active">
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
                </li>

                <li class="nav-item">
                    <a class="nav-link  border-bottom border-top">Inbox</a>
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
