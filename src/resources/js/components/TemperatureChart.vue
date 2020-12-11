<script>
import { Line } from 'vue-chartjs'

export default {
  extends: Line,
  props: {
    chartData: {
      type: Array,
      default: null
    },
    chartLabels: {
        type: Array,
        default: null
    }
  },
  data () {
      return {
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                display: true
              },
              ticks: {
                fontColor: "#FFFFFF80",
              }
            }],
            xAxes: [ {
              gridLines: {
                display: false
              },
              ticks: {
                fontColor: "#FFFFFF80",
              }
            }]
          },
          legend: {
            display: false
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: true,
            fontSize: 16,
            fontColor: "#FFFFFF80",
            text: "Temperature °C"
          }
        },
      }
    },
  mounted () {  
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
    this.gradient.addColorStop(0, 'rgba(54, 162, 235, 0.9)')
    this.gradient.addColorStop(0.5, 'rgba(54, 162, 235, 0.3)');
    this.gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');
    this.renderTemperatureChart();
  },
  methods: {
    renderTemperatureChart() {
      this.renderChart({
        labels: this.chartLabels,
        datasets: [
            {
                label: 'Temperature',
                data: this.chartData,
                //backgroundColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: this.gradient,
                borderColor: 'rgba(54, 162, 235, 0.8)',
            }
        ]
    }, this.options)
    }
  },
  watch: {
		chartData() {
			this.renderTemperatureChart();
		}
	}
}
</script>