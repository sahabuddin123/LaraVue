<template>
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img
                            src="/backend/images/icon/logo.png"
                            alt="CoolAdmin"
                        />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <router-link to="/" exact>
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </router-link>
                    </li>
                    <!-- <li><router-link to="" exact> </router-link></li> -->
                    <li>
                        <router-link to="/categories" exact>
                            <i class="fas fa-chart-bar"></i>Categories
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>
