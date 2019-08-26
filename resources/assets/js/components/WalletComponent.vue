<template>
    <div class="WalletComponent">

        <div class="row">

            <div class="col">

                <graph-treemap :width="800"
                               :height="800"
                               :text-align="'right'"
                               :text-vertical-align="'bottom'"
                               :colors="[ '#EC2500', '#ECE100', '#EC9800', '#9EDE00' ]"
                               :values="values">
                    <note :text="'Treemap Chart'" :align="'left'"></note>
                    <tooltip :position="'top'"></tooltip>
                </graph-treemap>

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
</style>