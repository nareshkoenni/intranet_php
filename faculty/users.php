<?php
if ((!isset($_SESSION))) { session_start(); }
if (($_SESSION["uname"] != "")) {

include '../dbcon.php';

// Total count for display
$countRes = mysqli_query($conn, "SELECT COUNT(*) AS total FROM LogDetails");
$totalRows = mysqli_fetch_assoc($countRes)['total'];
?>
<style>
    table { width: 100%; border-collapse: collapse; }
    table, td, th { border: 1px solid black; padding: 5px; }
    thead input { width: 90%; padding: 4px; font-size: 14px; }
</style>

<script>
let offset = 0;
const limit = 10;
let currentSearch = "";

// Load first time
window.onload = function() {
    loadMore();
};

// Load More + Search Combined
function loadMore(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "userLoadMore.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if(this.responseText.trim() !== ""){
            document.querySelector("#userTable tbody").insertAdjacentHTML('beforeend', this.responseText);
            offset += limit;

            document.getElementById("countShow").innerText = offset;
        } else {
            document.getElementById("loadMore").innerText = "✔ No More Records";
            document.getElementById("loadMore").disabled = true;
        }
    };

    xhr.send("offset=" + offset + "&search=" + encodeURIComponent(currentSearch));
}

// Reset and search again
function resetAndSearch(){
    currentSearch = document.getElementById("searchText").value;
    offset = 0;

    document.getElementById("userTable").querySelector("tbody").innerHTML = "";
    document.getElementById("countShow").innerText = "0";
    document.getElementById("loadMore").innerText = "Load More";
    document.getElementById("loadMore").disabled = false;

    loadMore();
}
</script>

<?php require './facultyContainer.php'; ?>

<div class="w3-container" style="margin-left:250px;">
    <div class="w3-container w3-green w3-center"><h4>Users</h4></div>

    <br>
    <input type="text" id="searchText" placeholder="Search Email/Branch/Role..." style="padding:5px;width:300px;">
    <button onclick="resetAndSearch()" class="w3-btn w3-orange w3-round-xxlarge">Search</button>
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-blue w3-round-xxlarge">New User?</button>
     <br>

    <table id="userTable" class="w3-table-all w3-hoverable w3-card">
        <thead>
            <tr class="w3-orange">
                <th>S.No</th>
                <th>Login Mail Id</th>
                <th>Branch</th>
                <th>Section</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div id="loadMoreBox" style="margin-top:10px;">
        <button id="loadMore" onclick="loadMore()" class="w3-btn w3-blue w3-round-xxlarge">Load More</button>
        <small>(Showing <span id="countShow">0</span> of <?= $totalRows ?>)</small>
    </div>
</div>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-xlarge" style="max-width:450px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
      </div>

        <form class="w3-container" action="addUserProcess.php" method="post">
        <div class="w3-section">
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-xlarge" type="email" placeholder="" maxlength="99" name="email" required>
          <label><b>Branch</b></label>
          <select class="w3-select w3-border w3-round-xlarge" name="branch" required="" >
                    <option value="" disabled selected>Choose Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="IT">IT</option>
                    <option value="EEE">EEE</option>
                    <option value="CSE(AIML)">CSE(AIML)</option>
                    <option value="Library">Library</option>
                    <option value="admin">Admin</option>
          </select>
          
        
          <label><b>Select Role</b></label>
          <select class="w3-select w3-border w3-round-xlarge" name="role_id" required="">
                    <option value=""  selected>Choose role</option>
                    <option value="1">admin</option>
                    <option value="2">hod</option>
                    <option value="3">classteacher</option>
                    <option value="4">teacher</option>
                    <option value="5">student</option>
                    <option value="6">parent</option>
                    <option value="7">non-teaching</option>
          </select>
          <label><b>Select Section</b></label>
          <select class="w3-select w3-border w3-round-xlarge" name="section">
                    <option value=""  selected>Choose Section</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
          </select>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-xlarge" type="text" placeholder="" maxlength="99" name="password" value="123456" required>
          
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add</button>
        </div>
      

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>
      </form>      
    </div>
  </div>
<?php require '../footer.php'; ?>
<?php mysqli_close($conn); ?>
<?php } else { header("Location:index"); } ?>
