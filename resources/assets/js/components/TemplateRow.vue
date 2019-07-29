<template>
  <v-layout row>
    <v-flex xs1>
      <select
        v-model="template.shape"
        style="marginTop:20px;marginRight:5px;border:1px dotted black"
      >
        <option selected value="4">Rectangle</option>
        <option value="1">Circle</option>
        <option value="3">Triangle</option>
        <option value="5">Pentagon</option>
        <option value="6">Hexagon</option>
      </select>
    </v-flex>
    <v-flex xs1>
      <v-text-field v-model="template.x" class="inputNumber" type="number" label="X" pattern="\d+"></v-text-field>
    </v-flex>
    <v-flex xs1>
      <v-text-field v-model="template.y" class="inputNumber" type="number" label="Y" pattern="\d+"></v-text-field>
    </v-flex>
    <v-flex xs1>
      <v-text-field
        v-model="template.width"
        class="inputNumber"
        type="number"
        label="Width"
        pattern="\d+"
      ></v-text-field>
    </v-flex>
    <v-flex xs1>
      <v-text-field
        v-model="template.height"
        class="inputNumber"
        type="number"
        label="Height"
        pattern="\d+"
      ></v-text-field>
    </v-flex>
    <v-flex xs1>
      <v-text-field v-model="template.ratio" label="ratio" />
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  name: "TemplateRow",
  data() {
    return {
      template: {
        productId: 0,
        shape: 4,
        x: 0,
        y: 0,
        width: 0,
        height: 0,
        ratio: 0
      }
    };
  },
  methods: {
    setX: function(x) {
      this.template.x = x;
    },
    setY: function(y) {
      this.template.y = y;
    },
    setW: function(w) {
      this.template.width = w;
    },
    setH: function(h) {
      this.template.height = h;
    },
    getShape: function() {
      return this.template.shape;
    }
  }
};
</script>

<style></style>sdxs