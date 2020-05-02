<template>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="backend/images/icon/logo.png" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                        <router-link to="/" exact>
                            <i class="fas fa-tachometer-alt"></i
                            >{{ "Dashboard" }}
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/categories" exact>
                            <i class="fas fa-chart-bar"></i>{{ "Categories" }}
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>
