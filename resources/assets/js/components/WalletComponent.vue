<template>
    <div class="WalletComponent">

        <div class="row">

            <div class="col">

                <b-jumbotron class="profit-gradient text-center box-shadow">
                    <h3>Your Profits</h3>
                    <h1>$0.00</h1>
                </b-jumbotron>
            </div>

            <div class="col">

                <b-card no-body class="box-shadow">
                    <b-card-header header-tag="weekSales">
                        <span class="card-title">
                            Sales By Week
                        </span>
                    </b-card-header>
                    <b-card-body>
                        Graph
                    </b-card-body>
                </b-card>

            </div>

            <div class="col">

                <b-card no-body class="box-shadow">
                    <b-card-header header-tag="monthSales">
                        <span class="card-title">
                            Sales By Month
                        </span>
                    </b-card-header>
                    <b-card-body>
                        Graph
                    </b-card-body>
                </b-card>

            </div>

        </div>

        <div class="row">

            <div class="col">

                <b-jumbotron class="box-shadow text-center">
                    Other Affiliate Information
                </b-jumbotron>

            </div>

        </div>

    </div>
</template>

<script>

    import GraphTreeMap from 'vue-graph/src/components/treemap';
    import Tooltip from 'vue-graph/src/widgets/tooltip';
    import Note from 'vue-graph/src/widgets/note';

    export default {

        name: 'WalletComponent',

        data() {

            return {
                values: [
                    ['0', 'Apples', -1],
                    ['0.0', 'Anne', 5],
                    ['0.1', 'Rick', 3],
                    ['0.2', 'Peter', 4],
                    ['1', 'Bananas', -1],
                    ['1.0', 'Anne', 4],
                    ['1.1', 'Rick', 10],
                    ['1.2', 'Peter', 1],
                    ['2', 'Oranges', -1],
                    ['2.0', 'Anne', 1],
                    ['2.1', 'Rick', 3],
                    ['2.2', 'Peter', 3],
                    ['3', 'Susanne', 2],
                ]
            }
        },
        components: {
            'graph-treemap': GraphTreeMap,
            'tooltip': Tooltip,
            'note': Note
        }
    };
</script>

<style scoped>
    .profit-gradient {
        color: #fff;
        text-shadow: 2px 2px 4px #000, -2px -2px 4px #000;
        background-image: radial-gradient(circle, #dbff00, #76ca75);
    }
</style>