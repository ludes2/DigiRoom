<template>
  <div class="">
      <div v-if="loaded" class="card">
          <div class="card-body">
              <div class="row col-xl-6 d-flex justify-content-start">
              <div class="btn-group" role="group">
                <button v-on:click="fetchDataHourly" class="btn btn-primary btn-sm mx-1">Day</button>
                <button v-on:click="fetchDataDaily" class="btn btn-primary btn-sm mx-1">Week</button>
                <button v-on:click="fetchDataMonthly" class="btn btn-primary btn-sm mx-1">Year</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <bar-chart class="chart"
                  v-if="loaded && room.id != null"
                  :chartData="chartData"
                  :chartLabels="chartLabels"/>
              </div>
              <div class="col-md-6">
                <pie-chart class="chart"
                  v-if="loaded && room.id != null"
                  :chartData="chartData"
                  :chartLabels="chartLabels"/>
              </div>
            </div>
          </div> <!-- card-body -->
      </div> <!-- card -->
  </div>
</template>

<script>
import BarChart from './PresenceBarChart.vue'
import PieChart from './PresencePieChart.vue'

export default {
  components: { BarChart, PieChart },
  data: () => ({
    loaded: false,
    chartData: [],
    chartLabels: [],
    room: {}
  }),
  async mounted () {
    this.room = this.$store.getters.getRoom
    this.loaded = false
    try {
      if (this.loaded != false && this.room.id != null){
        this.fetchDataHourly();
      }
    } catch (e) {
      console.error(e)
    }
  },
  methods: {
    async fetchDataHourly(){
      await axios.get('/api/presencesHours/' + this.room.id)
      .then(response => {
          this.chartData = Object.values(response.data);
          this.chartLabels = Object.keys(response.data);
          this.loaded = true
      })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    },
    async fetchDataDaily(){
      await axios.get('/api/presencesDays/'  + this.room.id)
      .then(response => {
          this.chartData = Object.values(response.data);
          this.chartLabels = Object.keys(response.data);
          this.loaded = true
      })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    },
    async fetchDataMonthly(){
      await axios.get('/api/presencesMonths/' + this.room.id)
      .then(response => {
          this.chartData = Object.values(response.data);
          this.chartLabels = Object.keys(response.data);
          this.loaded = true
      })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    }
  },
  watch: {
    'room.id': function(){
      try {
        if (this.room.id != null){
          this.fetchDataHourly();
        }
      } catch (e) {
        console.error(e)
      }
    }
  }
}
</script>