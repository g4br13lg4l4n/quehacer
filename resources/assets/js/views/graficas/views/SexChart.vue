<script>
  import { Bar } from 'vue-chartjs'

  export default Bar.extend({
    props:['fDetailsUsers', 'mDetailsUsers'],
    mounted () {
      this.renderChart({
        labels: ["Mayor edad",'Menor edad', 'Media de edad'],
        datasets: [
          {
            label: "Hombres",
            backgroundColor: "#3aa2eb",
            data: this.mDetailsUsers,
          },
          {
            label: "Mujeres",
            backgroundColor: "#ee6082",
            data: this.fDetailsUsers,
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