<script>
  import VueCharts from 'vue-chartjs'
  import { Bar } from 'vue-chartjs'
  export default Bar.extend({
    mounted () {
      this.renderChart({
        labels: ["Estados"],
        datasets: [
          {
            label: "Tabasco",
            backgroundColor: "#5ad9fa",
            data: [50],
          },
          {
            label: "Chiapas",
            backgroundColor: "#5ad9fa",
            data: [10],
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