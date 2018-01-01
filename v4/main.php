<?php include "seetables.php"; ?>
<html>
<body>
<style>


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.show {display:block;}
</style>
    <h1 class="mainpage"><a href="main.php"><em>Welcome to AP SSP testbeds Page!</em></a></h1>
    <ul>
        <li><a href="create.php" target="_blank"><em>Create Table</em></a></li>
        <!--<li><a href="../v2/fetch.php" target="_blank"><em>View Table</em></a></li>-->
        <div class="dropdown">
          <li onclick="myFunction()" class="dropbtn"><a href="#vtable"><em>View Table</em></a></li>
          <div id="myDropdown" class="dropdown-content">
            <!--<a href="#home">Home</a>-->
          </div>
       </div> 
    </ul>

<p id="demo"></p>
</body>
</html>
