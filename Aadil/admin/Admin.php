<?php include('myhead.php'); ?>
<?php 
//echo "welcome";
?>
<style>
        ul{
             list-style-type: none;
             margin:0;
             padding:0;
             overflow: hidden;
             background-color: #333;
         }
         li{
             float: center;
         }
         li a{
             display: block;
             padding: 15px 15px;
             color: white;
             text-align: center;
             text-decoration: none;
     
             }
             li a:hover:not(.active){
                 background-color: white;
             }
             .active{
                 background-color: #4CAF80;
             }
             body{
                 background-color: #87FFBA;
             }
     </style>
     
</head>
<body>
    <!-- navigation bar -->
     <ul>
   <li>
        <a href="Home.php">Assign Subject</a>
    </li>    
    <li>
        <a href="AddTeacher.php" target="_blank">Add Teacher</a>
    </li>
    
    <li>
         <a href="viewTeacher.php">View Teacher</a>
    </li>
    <li>
         <a href="teacher_active.php">Activate Account</a>
    </li>
</li>
 <!-- <li>
    
    <a href="admin_index.php?page=admin_all_users">View Student</a>
</li> -->
<li>
    <a href="admin_index.php?page=../teacher/class report">ViewAttendence</a>
</li>
<li>
    <a href="..\index.php">Logout</a>
</li> 
</ul>    
 <!-- <nav aria-label="breadcrumb">
<ol >
     <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i><a href="Admin_dashboard.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="Home.php">Home</a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="AddTeacher.php" target="_blank">Add Teacher</a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="viewTeacher.php">View Teacher</a></li>
     
     <li class="breadcrumb-item active" aria-current="page"><a href="..\teacher\viewattendence.php">ViewAttendence</a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="main.html">logout</a></li>

  </ol>
</nav>  -->