  <!-- Modal -->
<div class="modal fade" id="modalCuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Persetujuan Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <!-- Tab 1 -->
          <div role="tabpanel" class="tab-pane fade in active" id="tab1">
            <div class="row">
              <div class="col-sm-8">
                <!-- ID Cuti -->
                <label for="">ID Cuti</label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="text" class="form-control" readonly id="ID_Cuti">
                  </div>
                </div>
                <!-- Nama Pengaju -->
                <label for="">Nama Pengaju Cuti</label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="text" class="form-control" readonly id="Pengaju_Cuti">
                  </div>
                </div>
                <!-- Alasan -->
                <label for="">Alasan Cuti</label>
                <div class="form-group">
                  <div class="form-line">
                    <textarea name="Alasan_Cuti" id="Alasan_Cuti" class="form-control" cols="30" rows="5" readonly></textarea>
                  </div>
                </div>
              </div>  
              <!-- Persetujuan -->
              <div class="col-sm-4" style="margin-top: 100px;">
                <!-- Ditolak -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <button type="button" class="btn btn-danger btn-block btnSubmit" id="btnDecline" data-toggle="tab" role="tab" data-target="#tab2"><i class="material-icons">highlight_off</i> <strong>Tolak Cuti</strong></button>
                    </div>
                  </div>
                </div>
                <!-- Diterima -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- Form Diterima -->
                    <form method="POST" id="formDiterima">
                      {{ csrf_field() }}
                      <!-- Input Hidden -->
                      <input type="hidden" id="ID_Cuti_1" name="Cuti_ID">
                      <input type="hidden" name="Status_Perizinan" value="1">

                      <!-- Button Submit -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btnSubmit"><i class="material-icons">beenhere</i> <strong>Izinkan</strong></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 2 -->
          <div role="tabpanel" class="tab-pane fade" id="tab2">
            <!-- Form Ditolak -->
            <form method="POST" id="formDitolak">
              {{ csrf_field() }}
              <!-- Input Hidden -->
              <input type="hidden" id="ID_Cuti_2" name="Cuti_ID">
              <input type="hidden" name="Status_Perizinan" value="0">

              <!-- Catatan -->
              <label for="">Catatan</label>
              <div class="form-group">
                <div class="form-line">
                  <textarea name="Catatan" class="form-control" id="" cols="30" rows="7" placeholder="Catatan Ditolak"></textarea>
                </div>
              </div>

              <!-- Button -->
              <div class="text-center">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="pull-left" id="btnBack">
          <button type="button" id="btnKembali" class="btn btn-default" data-toggle="tab" role="tab" data-target="#tab1">Kembali</button>
        </div>
        <div class="pull-right">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>