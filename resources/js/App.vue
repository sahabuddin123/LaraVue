<template>
    <main>
        <Header />
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <Sidebar />
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <HeaderRight />
            <!-- END HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <router-view></router-view>
                        <Footer />
                    </div>
                </div>
            </div>
        </div>
        <FlashMessage position="right bottom"></FlashMessage>
    </main>
</template>
<script>
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import HeaderRight from "./components/HeaderRight.vue";
import Footer from "./components/Footer.vue";
export default {
    components: {
        Header,
        Sidebar,
        HeaderRight,
        Footer
    }
};
</script>
