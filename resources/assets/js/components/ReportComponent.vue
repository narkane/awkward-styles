<template>

    <div id="ReportComponent">
        <line-chart :chart-data="datacollection" />
        <button @click="fillData()">Randomize</button>
    </div>
    
</template>

<script>

    import { Line, mixins } from 'vue-chartjs'
    const { reactiveProp } = mixins;

    export default {
        name: "ReportComponent",

        mixins: [reactiveProp],

        components: {
            'line-chart': Line
        },

        data () {
            return {
                datacollection: null
            }
        },
        mounted () {
            this.fillData()
        },
        methods: {
            fillData () {
                this.datacollection = {
                    labels: [this.getRandomInt(), this.getRandomInt()],
                    datasets: [
                        {
                            label: 'Data One',
                            backgroundColor: '#f87979',
                            data: [this.getRandomInt(), this.getRandomInt()]
                        }, {
                            label: 'Data One',
                            backgroundColor: '#f87979',
                            data: [this.getRandomInt(), this.getRandomInt()]
                        }
                    ]
                }
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            }
        }

    }
</script>

<style scoped>

    .small {
        max-width: 600px;
        margin: 150px auto;
    }
</style>