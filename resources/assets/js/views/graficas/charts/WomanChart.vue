<script>
  import VueCharts from 'vue-chartjs'
  import { Bar } from 'vue-chartjs'
  export default Bar.extend({
    mounted () {
      this.renderChart({
        labels: ["Mujeres"],
        datasets: [
          {
            label: "Edad Mayor",
            backgroundColor: "#ee6082",
            data: [35],
          },
          {
            label: "Edad Menor",
            backgroundColor: "#ee6082",
            data: [16],
          },
        ],
        options: {
          scales: {
            xAxes: [
              {
                ticks: {
                  beginAtZero:true
                },
                gridLines: {
                  display: true,
                  color: "red",
                  lineWidth: 1
                }
              }
            ]
          }
        }
      })
    }
  })
</script>