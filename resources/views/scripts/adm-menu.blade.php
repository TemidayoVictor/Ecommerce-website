<script>
    const adminMenuOpen = document.getElementById('admin-menu-open')
    const adminMenuClose = document.getElementById('admin-menu-close')
    // ADMIN MENU SHOW
  if(adminMenuOpen) {
    adminMenuOpen.addEventListener('click', () => {
      sidebar.classList.add('active');
    })
  }

  // ADMIN MENU HIDE
  if(adminMenuClose) {
    adminMenuClose.addEventListener('click', () => {
      sidebar.classList.remove('active');
    })
  }
</script>