<template>
  <div class="animated fadeIn">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Traffic &amp; Sales
          </div>
          <div>
            <br/>
            <table class="table table-hover table-outline mb-0 hidden-sm-down">
              <thead class="thead-default">
                <tr>
                  <th class="text-center"><i class="icon-people"></i></th>
                  <th>User</th>
                  <th class="text-center">Country</th>
                  <th>Usage</th>
                  <th class="text-center">Payment Method</th>
                  <th>Activity</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="text-center">
                    <div class="avatar">
                      <img src="static/img/avatars/1.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                      <span class="avatar-status badge-success"></span>
                    </div>
                  </td>
                  <td>
                    <div>Yiorgos Avraamu</div>
                    <div class="small text-muted">
                      <span>New</span> | Registered: Jan 1, 2015
                    </div>
                  </td>
                  <td class="text-center">
                    <img src="static/img/flags/USA.png" alt="USA" style="height:24px;">
                  </td>
                  <td>
                    <div class="clearfix">
                      <div class="float-left">
                        <strong>50%</strong>
                      </div>
                      <div class="float-right">
                        <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                      </div>
                    </div>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td class="text-center">
                    <i class="fa fa-cc-mastercard" style="font-size:24px"></i>
                  </td>
                  <td>
                    <div class="small text-muted">Last login</div>
                    <strong>10 sec ago</strong>
                  </td>
                </tr>
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>
</template>

<script>



import { dropdown } from 'vue-strap'

export default {
  name: 'dash',
  components: {
    dropdown
  }
}
</script>
