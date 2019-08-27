<template>
    <div id="DashboardComponent">

        <div class="row">

            <div class="col p-0 m-4 box-shadow h-100">
                <b-card no-body class="p-0 m-0">

                    <b-card-header header-tag="header">
                            <span class="card-title">
                                Latest
                            </span>
                        <span class="float-right">
                                <b-button block href="#" v-b-toggle.collapse-latest varient="none">
                                    <i class="fa fa-sort-up" id="latest-up"></i>
                                    <i class="fa fa-sort-down" id="latest-down"></i>
                                </b-button>
                           </span>
                    </b-card-header>

                    <b-collapse id="collapse-latest" visible role="tabpanel">
                        <b-card-body class="m-0 p-0">

                            <table class="table table-sm table-responsive-sm table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="small">
                                        Image
                                    </th>
                                    <th scope="col" class="small">
                                        Description
                                    </th>
                                    <th scope="col" class="small">
                                        Category
                                    </th>
                                    <th scope="col" class="small" colspan="2">
                                        Price
                                    </th>

                                </tr>

                                </thead>

                                <!-- Fill With Demo Data -->
                                <tbody>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                </tbody>



                            </table>

                        </b-card-body>

                    </b-collapse>

                </b-card>
            </div>

            <div class="col p-0 m-4 box-shadow h-100">
                <b-card no-body class="p-0 m-0">

                    <b-card-header header-tag="header">
                        <span class="card-title">
                            Trending
                        </span>
                        <span class="float-right">
                            <b-button block href="#" v-b-toggle.collapse-trending varient="none">
                                <i class="fa fa-sort-up" id="trending-up"></i>
                                <i class="fa fa-sort-down" id="trending-down"></i>
                            </b-button>
                        </span>
                    </b-card-header>

                    <b-collapse id="collapse-trending" visible role="tabpanel">
                        <b-card-body class="m-0 p-0">

                            <table class="table table-sm table-responsive-sm table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="small">
                                        Image
                                    </th>
                                    <th scope="col" class="small">
                                        Description
                                    </th>
                                    <th scope="col" class="small">
                                        Category
                                    </th>
                                    <th scope="col" class="small" colspan="2">
                                        Price
                                    </th>

                                </tr>

                                </thead>

                                <!-- Fill With Demo Data -->
                                <tbody>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                <tr>

                                    <td scope="row">
                                        <img src="images/blank.jpg" class="tableImage" />
                                    </td>

                                    <td>
                                        Describe the product in detail
                                    </td>

                                    <td>
                                        Fun Times
                                    </td>

                                    <td>
                                        $24.99
                                    </td>

                                    <td title="Copy Affiliate Link">
                                        <i class="fa fa-copy"></i>
                                    </td>

                                </tr>

                                </tbody>



                            </table>

                        </b-card-body>

                    </b-collapse>

                </b-card>

            </div>

        </div>

        <div class="row">
            <div class="col p-0 m-4 box-shadow">

                <b-card no-body class="p-0 m-0">
                    <b-card-header header-tag="header">
                        <span class="card-title">
                            Featured
                        </span>
                        <span class="float-right">
                            <b-button block href="#" v-b-toggle.collapse-featured varient="none">
                                <i class="fa fa-sort-up" id="featured-up"></i>
                                <i class="fa fa-sort-down" id="featured-down"></i>
                            </b-button>
                        </span>
                    </b-card-header>


                    <b-collapse id="collapse-featured" visible role="tabpanel">
                        <b-card-body class="m-0 p-0">

                            <table class="table table-sm table-responsive-sm table-hover" id="featuredTable">

                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="small">
                                        ID
                                    </th>
                                    <th scope="col" class="small">
                                        Description
                                    </th>
                                    <th scope="col" class="small">
                                        Category
                                    </th>
                                    <th scope="col" class="small">
                                        Link
                                    </th>
                                    <th scope="col" class="small">
                                        Embedded Image
                                    </th>
                                </tr>

                                </thead>

                                <tbody v-for="info in affiliateLinks" v-bind="affiliateLinks">

                                <tr>

                                    <td scope="row">
                                        {{ info.id }}
                                    </td>

                                    <td>
                                        <p>{{ info.desc }}</p>
                                    </td>

                                    <td>
                                        {{ info.category }}
                                    </td>

                                    <td>
                                        <i class="fa fa-copy"
                                           v-clipboard:copy="info.link"
                                           v-clipboard:success="clipboardSuccessHandler"
                                           v-clipboard:error="clipboardErrorHandler">
                                            Copy Link
                                        </i>
                                    </td>

                                    <td>
                                        <button class="btn btn-outline-primary" title="Copy Embedded Image"
                                                v-clipboard:copy="info.fullEmbed"
                                                v-clipboard:success="clipboardSuccessHandler"
                                                v-clipboard:error="clipboardErrorHandler">
                                            <img :src="info.embedImgSrc" />
                                        </button>
                                    </td>

                                </tr>

                                </tbody>

                            </table>

                        </b-card-body>
                    </b-collapse>
                </b-card>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "DashboardComponent",

        data() {
            return {
                affiliateLinks: [
                    {
                        id: 0,
                        img: "Image",
                        desc: "Description",
                        category: "Category",
                        price: "Price",
                        link: ""
                    }
                ]
            }
        },

        methods: {

            clipboardSuccessHandler({ value, event }) {
                console.log('success', value)
            },

            clipboardErrorHandler({ value, event }) {
                console.log('error', value)
            },

            copyEmbed(info) {
                this.$copyText(info).then(this.clipboardSuccessHandler, this.clipboardErrorHandler);
            },

            setAffiliates() {
                this.affiliateLinks.push(
                    {
                        id: 1,
                        img: "images/blank.jpg",
                        desc: "My description of the product.",
                        category: "My category",
                        price: "The price",
                        link: "http://thisisalink.com",
                        embedImgSrc: "images/blank.jpg",
                        fullEmbed: "<a href=\"http://thisisalink.com\" target=\"_blank\"><img src=\"images/blank.jpg\"/></a>"
                    },
                    {
                        id: 2,
                        img: "images/blank.jpg",
                        desc: "Second Description.",
                        category: "Fun Time",
                        price: "$29.95",
                        link: "http://aol.com",
                        embedImgSrc: "images/blank.jpg",
                        fullEmbed: "<a href=\"http://aol.com\" target=\"_blank\"><img src=\"images/blank.jpg\"/></a>"
                    }
                );

                this.affiliateLinks.shift();

                console.log(this.affiliateLinks);
            }

        },

        created: function() {
            this.setAffiliates()
        }
    };
</script>

<style scoped>
    /*
    #collapse-latest[class~="show"] > #latest-up,
    :not(#collapse-latest[class~="show"]) > #latest-down {
        display: none;
    }
        */
</style>