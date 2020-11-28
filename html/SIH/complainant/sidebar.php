
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br>
   <h3 class="w3-bar-item">&nbsp;&nbsp;&nbsp; <i class="far fa-user"></i>&nbsp;&nbsp;<b>MENU</b></h3>
   <br>
  <a href="complainant.php"><i class="fa fa-home"></i>&nbsp;<b>HOME</b></a>
  <a href="complaint_terms.php"><i class="fa fa-plus-circle"></i>&nbsp;<b>FILE COMPLAINT</b></a>
  <a class="dropdown-btn"><i class="fas fa-clipboard-list"></i>&nbsp;  <b>COMPLAINT</b><i class="fa fa-caret-down"></i></a>
  <div class="dropdown-container">
    <a href="complaint_status.php"><i class="fas fa-check-circle"></i>&nbsp;  STATUS</a>
    <a href="complaint_forward.php"><i class="fas fa-share-square"></i>&nbsp;  FORWARD</a>
    <a href="complaint_history.php"><i class="far fa-folder-open"></i>&nbsp;  HISTORY</a>
  
   
  </div>
  <a href="reward_history.php"><i class="fas fa-award"></i>&nbsp;<b>REWARDS</b></a>
  <a href="404.php"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<b>CONTACT</b></a>

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
