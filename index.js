 function showsidebar(){
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.add('active');
    }

    function hidesidebar(){
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.remove('active');
    }
    
    // Close sidebar when clicking outside
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.querySelector('.menu-button');
        
        if (!sidebar.contains(event.target) && !menuButton.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });