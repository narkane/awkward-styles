<template>
  <div>
    <v-layout row>
      <v-flex xs1 class="variable">
        <select
          v-model="template.geo.shape"
          style="marginTop:14px;padding:10px 5px 10px 5px;"
          @change="()=>{dataChange(template.geo);}"
        >
          <option selected value="4">Rectangle</option>
          <option value="1">Circle</option>
        </select>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field
          v-model="template.geo.x"
          class="inputNumber"
          type="number"
          label="X"
          @change="()=>{dataChange(template.geo);}"
          pattern="\d+"
        ></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field
          v-model="template.geo.y"
          class="inputNumber"
          type="number"
          label="Y"
          @change="()=>{dataChange(template.geo);}"
          pattern="\d+"
        ></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field
          v-model="template.geo.width"
          class="inputNumber"
          type="number"
          label="Width"
          @change="()=>{dataChange(template.geo);}"
          pattern="\d+"
        ></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field
          v-model="template.geo.height"
          class="inputNumber"
          type="number"
          label="Height"
          @change="()=>{dataChange(template.geo);}"
          pattern="\d+"
        ></v-text-field>
      </v-flex>
      <v-flex xs1 class="constant">
        <v-text-field
          v-model="template.ratio"
          @change="()=>{setRatSize(template.ratio, template.size);}"
          label="Ratio"
        />
      </v-flex>
    </v-layout>
    <v-layout row>
      <v-flex xs1 class="constant">
        <select id="size" v-model="template.size" @change="getTemplateAxios" style="fontSize:24pt;">
          <option value="XS">XS</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
          <option value="2XL">2XL</option>
          <option value="3XL">3XL</option>
          <option value="4XL">4XL</option>
        </select>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field v-model="template.geo.x / template.ratio" label="X inches" disabled></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field v-model="template.geo.x / template.ratio" label="Y inches" disabled></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field v-model="inchesWtemp" label="Width in."></v-text-field>
      </v-flex>
      <v-flex xs1 class="variable">
        <v-text-field v-model="inchesHtemp" label="Height in."></v-text-field>
      </v-flex>
      <v-flex xs1 class="constant">
        <v-text-field v-model="template.ratio" label="Ratio" disabled />
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
export default {
  name: "TemplateRow",
  data() {
    return {
      template: {
        geo: { shape: 4 },
        ratio: 0,
        size: "XS"
      }
    };
  },
  methods: {
    setX: function(x) {
      this.template.geo.x = x;
    },
    setY: function(y) {
      this.template.geo.y = y;
    },
    setW: function(w) {
      this.template.geo.width = w;
    },
    setH: function(h) {
      this.template.geo.height = h;
    },
    getShape: function() {
      return this.template.geo.shape;
    },
    getTemplateAxios: function() {
      this.setRatSize(this.template.ratio, this.template.size);
      this.rt();
      this.getTemplate();
    }
  },
  props: {
    setRatSize: Function,
    dataChange: Function,
    getTemplate: Function,
    rt: Function
  },
  computed: {
    inchesWtemp: {
      get() {
        return this.template.geo.width / this.template.ratio;
      },
      set(value) {
        this.template.ratio = this.template.geo.width / value;
        // this.template.geo.width = value * this.template.ratio;
      }
    },
    inchesHtemp: {
      get() {
        return this.template.geo.height / this.template.ratio;
      },
      set(value) {
        this.template.ratio = this.template.geo.height / value;
        // this.template.geo.height = value * this.template.template.ratio;
      }
    }
  },
  mounted() {
    this.setRatSize(this.template.ratio, this.template.size);
    this.dataChange(this.template.geo);
  }
};
</script>

<style scoped>
.constant {
  background-color: lightcoral;
}
.variable {
  background-color: lightgreen;
}
#size {
  margin-top: 8px;
  padding-left: 14px;
}
</style>