<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="pegawaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel"><i class="material-icons">perm_contact_calendar</i> <span class="icon-name"> Input Data Pegawai</span></h5>
        </div>
        <hr>
        <form id="formPegawai" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                {{ csrf_field() }}
                <!-- Input Hidden -->
                <input type="hidden" id="id">
                <input type="hidden" id="method" name="_method">

                <div class="tab-content">
                    <!-- Tab 1 -->
                    <div role="tabpanel" class="tab-pane fade in active" id="form1">
                        <i class="material-icons">person_pin_circle</i> <strong><span class="icon-name"> Form Data Diri Pegawai</span></strong>
                        <hr>
                        <!-- Nama -->
                        <div class="form-group form-float">
                            <div class="row">
                                <!-- Nama Depan -->
                                <div class="col-sm-6">                        
                                    <label for="">Nama Depan</label>
                                    <div class="form-line">
                                        <input type="text" id="Nama_Depan" name="Nama_Depan"  class="form-control only-string" autocomplete="off" placeholder="Nama Depan">
                                    </div>
                                </div>
                                <!-- Nama Belakang -->
                                <div class="col-sm-6">
                                    <label for="">Nama Belakang</label>
                                    <div class="form-line">
                                        <input type="text" id="Nama_Belakang" name="Nama_Belakang"  class="form-control only-string" autocomplete="off" placeholder="Nama Belakang">
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <!-- Jenis Kelamin -->
                        <div class="form-group form-float">
                            <label for="Jenis_Kelamin">Jenis Kelamin</label>
                            <select name="Jenis_Kelamin" required class="form-control show-tick" id="Jenis_Kelamin">
                                <option disabled selected value="">Pilih Jenis Kelamin</option>
                                <option value="1">Laki - laki</option>
                                <option value="2">Perempuan</option>
                            </select> 
                        </div>
            
                        <!-- Alamat -->
                        <div class="form-group form-float">
                            <label for="Alamat">Alamat</label>
                            <div class="form-line">
                                <textarea name="Alamat" required class="form-control" id="Alamat" cols="30" rows="5" placeholder="Alamat"></textarea>
                            </div>
                        </div>
            
                        <!-- TTL -->
                        <div class="form-group form-float">
                            <label for="">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-line">
                                        <input type="text" id="Tempat_Lahir" name="Tempat_Lahir" class="form-control only-string" autocomplete="off" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-line">
                                        <input type="text" id="Tanggal_Lahir" name="Tanggal_Lahir" required class="form-control datepicker" autocomplete="off" placeholder="Tanggal Lahir dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>    
                        
                        <!-- Upload Foto -->
                        <div class="form-group form-float">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="Upload Foto">Upload Foto</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control uploads" id="Foto" name="Foto_Avatar" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="avatar">Foto</label>
                                    <br>
                                    <img class="product" id="avatar" width="250" height="200">          
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Tab 2 -->
                    <div role="tabpanel" class="tab-pane fade" id="form2">
                        <i class="material-icons">person_pin_circle</i> <strong><span class="icon-name"> Form Data Pegawai di Perusahaan</span></strong>
                        <hr>
                        <!-- Jabatan -->
                        <div class="form-group form-float">
                            <label for="Jabatan">Jabatan</label>
                            <select name="Jabatan" class="form-control show-tick" id="Jabatan">
                                <option disabled selected value="">Pilih Jabatan</option>
                                <option value="1">Direktur</option>
                                <option value="2">Manager</option>
                                <option value="3">Keuangan</option>
                                <option value="4">Purchasing</option>
                                <option value="5">Administrasi</option>
                            </select> 
                        </div>

                        <!-- Divisi -->
                        <div class="form-group form-float">
                            <label for="Divisi">Divisi</label>
                            <select name="Divisi" class="form-control show-tick" id="Divisi">
                                <option disabled selected value="">Pilih Divisi</option>
                                <option value="1">Bubut</option>
                                <option value="2">Miling</option>
                                <option value="3">Pengelasan</option>
                                <option value="4">Pengecoran</option>
                                <option value="5">Perangkaian</option>
                                <option value="6">Gudang</option>
                                <option value="7">Operasional</option>
                            </select> 
                        </div>

                        <!-- Atasan -->
                        <div class="form-group form-flat">
                            <label for="Atasan">Atasan</label>
                            <select name="Atasan" class="form-control show-tick" id="Atasan">
                                <option disabled selected value="">Pilih Atasan</option>
                                
                            </select> 
                        </div>

                        <!-- Email -->                      
                        <div class="form-group form-float" id="form-email">
                            <label for="">Email</label>
                            <div class="form-line">
                                <input type="email" id="Email" name="Email" class="form-control" autocomplete="off" placeholder="Email">
                            </div>
                        
                        </div>

                        <!-- Password -->
                        <!-- <div class="form-group form-float" id="form-password">
                            <label for="">Password</label>
                            <div class="form-line">
                                <input type="password" id="Password" name="Password" class="form-control" autocomplete="off" placeholder="Password">
                            </div>
                        </div> -->

                        <!-- Retype Password -->
                        <!-- <div class="form-group form-float" id="form-retype">
                            <label for="">Retype Password</label>
                            <div class="form-line">
                                <input type="password" id="Retype_Password" onkeyup="check()" name="Retype_Password" class="form-control" autocomplete="off" placeholder="Retype Password">
                            </div>
                            <h5><span id="message" style="margin-top:10px;"></span></h5>
                        </div> -->
                                
                    </div>
                </div>
                <div class="pull-left" id="btnBack">
                    <button type="button" data-target="#form1" id="btnPrev" role="tab" data-toggle="tab" class="btn btn-info">
                        <i class="material-icons">chevron_left</i> Sebelumnya
                    </button>
                </div>
                <div class="pull-right" id="btnGo">
                    <button type="button" data-target="#form2" id="btnNext" role="tab" data-toggle="tab" class="btn btn-info">
                        Selanjutnya <i class="material-icons">chevron_right</i>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <hr>
                <div class="pull-right">
                    <button id="btnReset" type="reset" class="btn btn-danger">Reset Form</button>
                    <button id="btnSubmit" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
