<template>
  <div class="">
        <div v-if="loaded" class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-start">
              <div class="col-lg-6 border-lg-right">
                <div class="btn-group" role="group">
                  <button v-on:click="fetchDataFromThisWeek" class="btn btn-primary btn-sm mx-1">This Week</button>
                  <button v-on:click="fetchDataFromThisMonth" class="btn btn-primary btn-sm mx-1">This Month</button>
                  <button v-on:click="fetchDataFromThisYear" class="btn btn-primary btn-sm mx-1">This Year</button>
                </div>
              </div>
              <div class="col-lg-6">
                <strong>Average:</strong>&nbsp;{{ average }}&nbsp;°C
              </div>
            </div>
            
          <line-chart class="chart"
            v-if="loaded"
            :chartData="chartData"
            :chartLabels="chartLabels"/>
        </div> <!-- card-body -->
    </div> <!-- card -->
  </div>
</template>

<script>
import LineChart from './TemperatureChart.vue'

export default {
  components: { LineChart },
  data: () => ({
    loaded: false,
    chartData: [],
    chartLabels: [],
    average: 0,
    room: {}
  }),
  async mounted () {
    this.room = this.$store.getters.getRoom;
    this.loaded = false
    try {
      if (this.loaded != false && this.room.id != null){
        this.fetchDataFromThisWeek();
      }
    } catch (e) {
      console.error(e)
    }
  },
  methods: {
    async fetchDataFromThisWeek(){
      await axios.get('/api/temperaturesFromThisWeek/' + this.room.id)
      .then(response => {
          console.log(response);
          this.chartData = response.data.map(elem => elem.value);
          this.chartLabels = response.data.map(elem => elem.created_at);
          this.average = this.calculateAverage(this.chartData);
          this.loaded = true
        })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    },
    async fetchDataFromThisMonth(){
      await axios.get('/api/temperaturesFromThisMonth/' + this.room.id)
      .then(response => {
          this.chartData = response.data.map(elem => elem.value);
          this.chartLabels = response.data.map(elem => elem.created_at);
          this.average = this.calculateAverage(this.chartData);
          this.loaded = true
        })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    },
    async fetchDataFromThisYear(){
      await axios.get('/api/temperaturesFromThisYear/' + this.room.id)
      .then(response => {
          this.chartData = response.data.map(elem => elem.value);
          this.chartLabels = response.data.map(elem => elem.created_at);
          this.average = this.calculateAverage(this.chartData);
          this.loaded = true
        })
      .catch(error => {
          console.log(error);
      })
      this.loaded = true
    },
    calculateAverage(array){
      var average = array.reduce((a, b) => parseFloat(a) + parseFloat(b), 0) / array.length;
      return Math.round(average * 100) / 100
    }
  },
  watch: {
    'room.id': function(){
      try {
        if (this.room.id != null){
          this.fetchDataFromThisWeek();
        }
      } catch (e) {
        console.error(e)
      }
    }
  }
}
</script>