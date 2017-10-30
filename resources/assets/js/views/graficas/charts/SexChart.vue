<script>
  import { Bar } from 'vue-chartjs'

  export default Bar.extend({
    mounted () {
      this.renderChart({
        labels: ["Mayor edad",'Menor edad', 'Media de edad'],
        datasets: [
          {
            label: "Hombres",
            backgroundColor: "#3aa2eb",
            data: [35, 12, 25],
          },
          {
            label: "Mujeres",
            backgroundColor: "#ee6082",
            data: [30, 16, 22],
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