<template>
    <div id="affiliatedb">
        <b-navbar toggleable="sm" type="light" variant="light" class="navbar-bg mx-0">

            <b-navbar-brand>
                Awkward Styles
            </b-navbar-brand>

            <b-navbar-toggle target="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </b-navbar-toggle>

            <b-collapse id="navbarSupportedContent">
                <b-navbar-nav class="mr-auto">
                    <b-nav-item href="#" @click="current = 'Dashboard'">
                        Dashboard
                    </b-nav-item>
                    <b-nav-item href="#" @click="current = 'Wallet'">
                        My Wallet
                    </b-nav-item>
                    <b-nav-item href="#" @click="current = 'Report'">
                        Purchase Report
                    </b-nav-item>
                    <b-nav-item href="#" @click="current = 'Settings'">
                        Settings
                    </b-nav-item>
                </b-navbar-nav>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </b-collapse>

        </b-navbar>

        <div class="row main p-0 m-0">
            <div v-if="showSidebar === true" class="sideCol">
                <i class="fa fa-chevron-circle-left" id="sideSlideLeft"
                   @click="showSidebar = false"></i>
                <div class="col sidebar p-0">
                    <div class="SidebarComponent">
                        <div class="container-fluid sideBarDiv" @click="current = 'Dashboard'">
                            <i class="fa fa-tachometer-alt pr-2"></i>
                            <small class="sideText">Dashboard</small>
                        </div>
                        <div class="container-fluid sideBarDiv" @click="current = 'Wallet'">
                            <i class="fa fa-wallet pr-2"></i>
                            <small class="sideText">My Wallet</small>
                        </div>
                        <div class="container-fluid sideBarDiv" @click="current = 'Report'">
                            <i class="fa fa-file-invoice pr-2"></i>
                            <small class="sideText">Purchase Report</small>
                        </div>
                        <div class="container-fluid sideBarDiv" @click="current = 'Settings'">
                            <i class="fa fa-cog pr-2"></i>
                            <small class="sideText">Settings</small>
                        </div>
                    </div>
                </div>
            </div>

            <div v-else-if="showSidebar === false" class="sideCol">
                <i class="fa fa-chevron-circle-right" id="sideSlideRight"
                   @click="showSidebar = true"></i>
                <div class="col sidebar-thin p-0">
                    <div class="SidebarComponent" v-if="!showSidebar">
                        <div class="container-fluid sideBarDiv text-center" title="Dashboard"
                             @click="current = 'Dashboard'">
                            <h4 class="fa fa-tachometer-alt" alt="Dashboard"></h4>
                        </div>
                        <div class="container-fluid sideBarDiv text-center" title="My Wallet"
                             @click="current = 'Wallet'">
                            <h4 class="fa fa-wallet"></h4>
                        </div>
                        <div class="container-fluid sideBarDiv text-center" title="Purchase Reports"
                            @click="current = 'Report'">
                            <h4 class="fa fa-file-invoice"></h4>
                        </div>
                        <div class="container-fluid sideBarDiv text-center" title="Settings"
                             @click="current = 'Settings'">
                            <h4 class="fa fa-cog pr-2"></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col contentArea">
                <component v-bind:is="current"></component>
            </div>
        </div>
    </div>
</template>

<script>

    import Vue from 'vue';
    //import App from './Affiliates.vue';

    // Clipboard
    import Clipboard from 'vue-clipboard2';

    // Bootstrap Vue
    import BootstrapVue from 'bootstrap-vue';

    // Bootstrap CSS files
    import 'bootstrap/dist/css/bootstrap.css';
    import 'bootstrap-vue/dist/bootstrap-vue.css';

    Vue.config.productionTip = true;

    Vue.use(Clipboard);
    Vue.use(BootstrapVue);

    export const nv = new Vue();

    // Dashboard
    import DashboardComponent from './components/DashboardComponent.vue';

    // Wallet
    import WalletComponent from './components/WalletComponent.vue';

    // Reports
    import ReportComponent from './components/ReportComponent.vue';

    // Settings
    import SettingsComponent from './components/SettingsComponent.vue';

    export default {
        name: 'affiliatedb',

        data() {
            return {
                current: 'Dashboard',
                showSidebar: true

            }
        },

        components: {
            'Dashboard': DashboardComponent,
            'Wallet': WalletComponent,
            'Report': ReportComponent,
            'Settings': SettingsComponent
        },

        mounted() {
            this.$root.$on('bv::collapse::state', (collapseId, isJustShown) => {
                let id = collapseId.split("-");
                let up = $("#" + id[1] + "-up");
                let down = $("#" + id[1] + "-down");

                up.css('display', ((!isJustShown) ? 'none' : 'block'));


                down.css('display', ((!isJustShown) ? 'block' : 'none'));

                console.log('collapseId:', collapseId)
                console.log('isJustShown:', isJustShown)
            });
        }
    };
</script>

<style>

    /* Cast Shadow Under ALL Div */
    .box-shadow {
        box-shadow: 2px 2px 10px rgba(0,0,0,0.6);
    }

    .sideCol {
        position: relative;
        background-image: linear-gradient(to left, rgba(150,255,150,0.5), white);
        box-shadow: inset -10px -10px 5px -10px #000;
    }

    #affiliatedb {
        height: 100%;
    }

    .navbar-bg {
        box-shadow: inset 0px -10px 5px -10px #000;
    }

    .sideBarDiv {
        padding: 5px;
        cursor: pointer;
        color: rgba(0,0,0,0.5);
    }

    .sideBarDiv:hover {
        background-image: linear-gradient(to right, green, transparent);
        color: #000;
    }

    #sideSlideLeft, #sideSlideRight {
        position: absolute;
        right: -5px;
        top: 50vh;
        cursor: pointer;
        z-index: 2;
    }

    a.sideText{
        color: #000000;
        font-size: 11px;
        font-weight: bold;
    }

    a.sideText:hover, a.sideText::selection,
    a.sideText:active {
        color: darkblue;
        text-decoration: none;
        font-size: 12px;
    }

    .fa-copy {
        cursor: pointer;
    }

    .contentArea {
        background-image: linear-gradient(to bottom, rgba(100,255,100,0.2), #ffffff, rgba(100,255,100,0.2));
        background-image: -moz-linear-gradient(to bottom, rgba(100,255,100,0.2), #ffffff, rgba(100,255,100,0.2));
        background-image: -webkit-linear-gradient(to bottom, rgba(100,255,100,0.2), #ffffff, rgba(100,255,100,0.2));
    }

</style>