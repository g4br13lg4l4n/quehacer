<script>
  import VueCharts from 'vue-chartjs'
  import { Bar } from 'vue-chartjs'
  export default Bar.extend({
    props: ['genero'],
    watch: {
      genero: (dataNow, dataOld) => {
        //this.genero = dataNow
      }
    },
    mounted () {
      this.renderChart({
        labels: ["Género"],
        datasets: [
          {
            label: "Femenino",
            backgroundColor: "#ee6082",
            data: [this.genero[1]],
          },
          {
            label: "Masculino",
            backgroundColor: "#3aa2eb",
            data: [this.genero[0]],
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