<script>
  import { Bar } from 'vue-chartjs'

  export default Bar.extend({
    props: ['data', 'options'],
    mounted () {
      this.renderChart({
        labels: ["Cantidad de usuarios"],
        datasets: [
          {
            label: "Usuarios",
            backgroundColor: "#3aa2eb",
            data: [this.data],
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