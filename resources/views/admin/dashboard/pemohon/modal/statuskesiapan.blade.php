<div id="status_bar">
<div class="shadow-sm p-2 mb-2 bg-white rounded">
  @if(($countdatadiri == 0) && ($countkesehatan == 0) && ($countpendidikan == 0) && ($countptinggi == 0))
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"><font color="black">Kelengkapan 1%</font></div>
  </div>
  @elseif(($countdatadiri > 0) && ($countkesehatan == 0) && ($countpendidikan == 0) && ($countptinggi == 0))
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"><font color="black">Kelengkapan 10%</font></div>
  </div>
  @elseif(($countkesehatan > 0) && ($countdatadiri > 0))
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"><font color="black">Kelengkapan 30%</font></div>
  </div>
  @else
  @endif
</div>
</div>