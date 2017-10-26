<script>
  import { Bar } from 'vue-chartjs'

  export default Bar.extend({
    mounted () {
      this.renderChart({
        labels: ["Hombres"],
        datasets: [
          {
            label: "Edad Mayor",
            backgroundColor: "#3aa2eb",
            data: [35],
          },
          {
            label: "Edad Menor",
            backgroundColor: "#3aa2eb",
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