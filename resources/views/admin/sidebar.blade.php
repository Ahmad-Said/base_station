<style>
        /* The sidebar menu */
        .sidebar {
          height: 100%; /* 100% Full-height */
          width : 250px; /* 0 width - change this with JavaScript */
          position: fixed; /* Stay in place */
          z-index: 1; /* Stay on top */
          margin-left: 250;
          top: 0;
          left: 0;
          background-color: #f7f7f7; /* Black*/
          color: #595959;
          border-right: 1px solid #818181;
          overflow-x: hidden; /* Disable horizontal scroll */
          padding-top: 5px; /* Place content 60px from the top */
          transition: all 0.3s; /* 0.5 second transition effect to slide in the sidebar */
        }

        /* The sidebar links */
        .sidebar a {
          padding: 12px 8px 12px 22px;
          text-decoration: none;
          font-size: 1.0em;
          /* color: #818181; */
          display: block;
          transition: all 0.3s; /* 0.5 second transition effect to slide in the sidebar */

          /* transition: 0.0s; */
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #db2d21;
                background: #fff;
          transition: all 0.3s; /* 0.5 second transition effect to slide in the sidebar */

          /* color: #f1f1f1; */
        }

        /* Position and style the close button (top right corner) */
        /* .sidebar .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        } */

        /* The button used to open the sidebar */
        /* .openbtn {
          font-size: 20px;
          cursor: pointer;
          background-color: #111;
          color: white;
          padding: 10px 15px;
          border: none;
        } */

        /* .openbtn:hover {
          background-color: #444;
        } */

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
          transition: margin-left .3s; /* If you want a transition effect */
          margin-left: 250px;
          /* padding: 20px; */
        }

        #mySidebar .sidebar-heading {
                padding-left: 22px;
                padding-right: 20px;
                padding-bottom: 5px;
                padding-top: 5px;
                font-size:17px;
                display: flex;
                align-items: center;
                /* height: 56px; */
                padding-right: 3%;
                /* font-weight: bold; */
            }
        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
          .sidebar {padding-top: 15px;}
          .sidebar a {font-size: 18px;}
        }
        </style>

<div id="mySidebar" class="sidebar border-right">
        {{-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> --}}
        <div class="sidebar-heading">
            <img src="images/logo3.png" style="width: 40px;border-radius: 5px;height: 40px;background-color: #ca0106;">
            <span style="color:black;">
            &nbsp;&nbsp;BSA Configurator
            </span>
        </div>
            <ul class="list-inline components">
                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action border-0 bg-light" href="/">
                        <i class="fas fa-home"></i>
                        &nbsp Configurator</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action border-0 bg-light" style="border-color: gray;" href="/register">
                        <i class="fas fas fa-users"></i>
                        &nbsp Users</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action bg-light border-0" href="/posts">
                        <i class="fas fas fas fa-sticky-note"></i>
                        &nbsp Posts</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action bg-light border-0" href="/posts/create">
                        <i class="fas fas far fas fa-plus-square"></i>
                        &nbsp Add Post</a>
                </li>

                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action bg-light border-0" href="/about">
                        <i class="fab fa-hire-a-helper"></i>
                        &nbsp Help</a>
                </li>
                <li class="nav-item border-bottom border-top">
                    <a class="list-group-item list-group-item-action bg-light border-0" href="/bands">
                        <i class="fab fab fa-buysellads"></i>
                        &nbsp Antennas Bands</a>
                </li>
            </ul>
</div>


<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    var i=0;
    function openNav() {
        if(i%2==0){
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            i++;
        }
        else{
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            i++;
        }
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    }
</script>
