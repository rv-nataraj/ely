<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br>
   <h3 class="w3-bar-item">&nbsp;&nbsp;&nbsp;Menu</h3>
   <br>
  <a href="admin.php"><i class="fa fa-home"></i>&nbsp;Home</a>
   
   
 

    <a class="dropdown-btn"><i class="fa fa-user"></i>&nbsp;Admin<i class="fa fa-caret-down"></i></a>
  <div class="dropdown-container">
  <a href="insert.php"><i class="fa fa-user-plus"></i>&nbsp;add admin</a>
    <a href="user.php"><i class="fa fa-users"></i>&nbsp;manage admin</a>
    <a href="tables.php"><i class="fa fa-history"></i>&nbsp;user login history</a>
  </div>

  <a class="dropdown-btn"><i class="fa fa-user-circle"></i>&nbsp;Other users <i class="fa fa-caret-down"></i></a>
  <div class="dropdown-container">
  <a href="police_insert.php"><i class="fa fa-user-plus"></i>&nbsp;add police</a>
  <a href="police_users.php"><i class="fa fa-users"></i>&nbsp;manage police</a>

  </div>
  <a href="Complainant_users.php"><i class="fa fa-male"></i>&nbsp;Complainant</a>
  <a href="Complaint_search.php"><i class="fas fa-calendar-check"></i>&nbsp;Complaint</a>
  <a href="rewards.php"><i class="fas fa-rupee-sign"></i>&nbsp;Rewards</a>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
