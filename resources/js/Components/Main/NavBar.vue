<template>

    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">


                <Link class="list-group-item list-group-item-action py-2 ripple" :href="route('categories')">
                <i class="fas fa-chart-line fa-fw me-3"></i><span>Job Categories</span>
                </Link>

                <Link class="list-group-item list-group-item-action py-2 ripple active" :href="route('dashboard')"
                    aria-current="true">
                <i class="fas fa-chart-line fa-fw me-3"></i><span>Pending Approve</span>
                </Link>

                <Link class="list-group-item list-group-item-action py-2 ripple" :href="route('ApprovedJobs')">
                <i class="fas fa-chart-line fa-fw me-3"></i><span>Approved Jobs</span>
                </Link>

                <Link class="list-group-item list-group-item-action py-2 ripple" :href="route('RejectedJobs')">
                <i class="fas fa-chart-line fa-fw me-3"></i><span>Rejected Jobs</span>
                </Link>

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button data-mdb-button-init class="navbar-toggler" type="button" data-mdb-collapse-init
                data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="25" alt="MDB Logo"
                    loading="lazy" />
            </a>


            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Avatar -->
                <li class="nav-item">
                    <Link class="nav-link d-flex flex-column text-center text-danger" aria-current="page" @click="logout"
                        :href="route('logout')" method="post">
                    <i class="fas fa-comment-dots fa-lg"></i><span class="small">Log Out</span>
                    </Link>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>

</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    methods: {
        logout() {
            alert('Logged out.');
        }
    }
}

</script>

<style>
body {
    background-color: #fbfbfb;
}

@media (min-width: 991.98px) {
    main {
        padding-left: 240px;
    }
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 58px 0 0;
    /* Height of navbar */
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    width: 240px;
    z-index: 600;
}

@media (max-width: 991.98px) {
    .sidebar {
        width: 100%;
    }
}

.sidebar .active {
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: 0.5rem;
    overflow-x: hidden;
    overflow-y: auto;
    /* Scrollable contents if viewport is shorter than content. */
}
</style>
