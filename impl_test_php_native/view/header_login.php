<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=repos_save_list">Repos Save List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="controller/logout.php">Logout</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" id="search_key" type="text" onkeypress="handleEnter(event)" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="search()"  type="button">Search</button>
    </form>

</div>

<script type="text/javascript">
    function search() {
        var key = document.getElementById("search_key").value;
        location.href="index.php?controller=search&search_key="+key+"&per_page=30";
    }

    function handleEnter(e){
        if(e.keyCode === 13){
            e.preventDefault();
            var key = document.getElementById("search_key").value;
            location.href="index.php?controller=search&search_key="+key+"&per_page=30"
        }
    }

</script>