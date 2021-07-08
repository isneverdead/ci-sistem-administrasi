</div>
    </div>
  </body>
  <script>
    var dropdownMenu = document.getElementById('dropdownMenu')

    function openDropdown() {
      console.log('atas')
      dropdownMenu.classList.remove('hidden')
      dropdownMenu.classList.add('flex')
    }
    
    function closeDropdown() {
      console.log('bawah')
      dropdownMenu.classList.add('hidden')
      dropdownMenu.classList.remove('flex')
    }

    var pageTitle = <?php echo json_encode($page_title, JSON_HEX_TAG); ?>; 
    document.title = pageTitle;
  </script>
</html>
