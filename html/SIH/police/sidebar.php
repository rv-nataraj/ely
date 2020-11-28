

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <br>
   <h3 class="w3-bar-item">&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>&nbsp;<?php echo $_SESSION['user']['username']; ?></h3>
   <br>
  <a href="police.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a>
  
  <a class="dropdown-btn"><i class="far fa-list-alt"></i>&nbsp;Complaint<i class="fa fa-caret-down"></i></a>
  <div class="dropdown-container">
  <a href="complaint_main.php"><i class="far fa-check-circle"></i>&nbsp;&nbsp;Accept</a>
  <a href="complaint_forward.php"><i class="fas fa-arrow-circle-right"></i>&nbsp;&nbsp;Forward</a>
    <a href="complaint_status.php"><i class="fab fa-searchengin"></i>&nbsp;&nbsp;status</a>
    <a href="complaint_history.php"><i class="fa fa-history"></i>&nbsp; &nbsp;History</a>
  </div>
  <a href="complainant_search.php"><i class="fas fa-search"></i>&nbsp;Complainant</a>
  <a href="complainant_search.php"><i class="fas fa-map-marked-alt"></i>&nbsp;Red Zone</a>
  <a href="complainant_search.php"><i class="fas fa-money-check-alt"></i>&nbsp;Clustering</a>
  <a class="dropdown-btn" ><i class="fas fa-award "></i>&nbsp;Rewards<i class="fa fa-caret-down"></i></a>
  <div class="dropdown-container">
  <a href="rewards_add.php"><i class="fas fa-coins"></i>&nbsp;Add Rewards</a>
  <a href="rewards_history.php"><i class="fas fa-folder-open"></i>&nbsp;Reward History</a>
  </div> 

  </div>
  
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
