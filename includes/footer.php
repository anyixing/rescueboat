  <script src="./js/jquery.min.js"></script>
  <script src="./plugins/select2/js/select2.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/script.js"></script>

  <script>

    
    function check() {
      var input1 = document.getElementById("input1")
      var input2 = document.getElementById("input2")
      var center = document.getElementById("center")
      input1.classList.toggle("input1")
      input2.classList.toggle("input2")
      center.classList.toggle("center")
    }
  
    var sidebarName = document.getElementById("sidebar-admin-name");

    sidebarName.innerHTML = 'Welcome, <?php echo $_SESSION['fullName'] ?>';

  </script>

</body>

</html>