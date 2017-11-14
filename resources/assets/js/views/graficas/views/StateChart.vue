<script>
  import VueCharts from 'vue-chartjs'
  import { Bar } from 'vue-chartjs'
  export default Bar.extend({
    props : ['state'],
    mounted () {
      this.renderChart(this.state)
    }
  })
</script>