@extends('admin.layout.masteradmin')
@section('content') 


<!-- page content -->
<div class="right_col" role="main">
<div class="">

<div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      <div class="x_panel shadow-sm">
        <div class="x_title">
          <h2>Isi Pesan <small></small></h2>

          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Pesan Bidang Terkait</th>
                          @if(Auth::user()->level == 1 || Auth::user()->level == 4)
                          <th>Pesan DKK</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @forelse($ispes as $showispes)
                            <td style="width: 50%"> {{ $showispes->isi_pesan }}</td>
                            @if(Auth::user()->level == 1 || Auth::user()->level == 4)
                            <td style="width: 50%">{{ $showispes->isi_pesan_dkk }}</td>
                            @endif
                        </tr>
                      </tbody>
                    @empty
                    <tr>
                    <td colspan="5" style="text-align: center;">Tidak Ada Isi Pesan Apapun</td>
                    </tr>
                  @endforelse
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')


@endsection
