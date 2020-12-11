<script>
import { Pie} from 'vue-chartjs'

export default {
  extends: Pie,
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
          legend: {
            display: false
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: true,
            fontSize: 16,
            fontColor: "#FFFFFF80",
            text: "Presence detections"
          },
        }
      }
    },
  mounted () {
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
    this.gradient.addColorStop(0, 'rgba(54, 162, 235, 0.9)');
    this.gradient.addColorStop(0.5, 'rgba(54, 162, 235, 0.3)');
    this.gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');
    this.renderPresenceChart();
  },
  methods: {
    renderPresenceChart(){
      this.renderChart({
        labels: this.chartLabels,
        datasets: [
            {
                label: 'Presence Detections',
                data: this.chartData,
                borderColor: 'rgba(54, 162, 235, 0.8)',
                //backgroundColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: this.gradient,
                borderWidth: 2
            }
        ]
      }, this.options)
    }
  },
	watch: {
		chartLabels() {
			this.renderPresenceChart();
		}
	}
}
</script>