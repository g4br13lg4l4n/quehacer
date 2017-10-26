<script>
  import VueCharts from 'vue-chartjs'
  import { Bar } from 'vue-chartjs'
  export default Bar.extend({
    mounted () {
      this.renderChart({
        labels: ["Género"],
        datasets: [
          {
            label: "Femenino",
            backgroundColor: "#ee6082",
            data: [30],
          },
          {
            label: "Masculino",
            backgroundColor: "#3aa2eb",
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