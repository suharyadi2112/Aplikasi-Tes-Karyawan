@extends('admin.layout.masteradmin')
@section('content') 

@if(Auth::user()->level == "1" || Auth::user()->level == "4")
<!-- page content -->
<div class="right_col" role="main">
  <div class=""> 
    <div class="clearfix"></div>
      <div class="x_panel shadow-sm">
        <form method="POST" action="{{ url('/user/'.$data->id.'/simpanedit') }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$data->id}}" >

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>

                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$data->username}}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="level">{{ __('Level') }}</label>

                        <div class="has-error">
                                <select class="form-control" name="level"> 
                        
                                  @foreach ($levelgrup as $leveling)
                                  <option @if ($leveling->id_level == $data->level) selected @endif" value="{{$leveling->id_level}}">{{$leveling->nama_level}}</option>
                                  @endforeach
                                </select>
                        <small class="help-block"></small>
                        </div>
                        @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="level">{{ __('Posisi') }}</label>

                        <div class="has-error">
                                <select class="form-control" name="posisi"> 
                        
                                  @foreach ($posisi as $posisis)
                                  <option @if ($posisis->id_posisi == $data->posisi) selected @endif" value="{{$posisis->id_posisi}}">{{$posisis->nama_posisi}}</option>
                                  @endforeach
                                </select>
                        <small class="help-block"></small>
                        </div>
                        @error('posisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                </div>
                <a href="{{ url('/user') }}"><button type="button" class="btn btn-danger btn-xs" >
                    <span class="fa fa-chevron-left"></span> {{ __('Kembali') }}
                </button></a>
                <button type="submit" class="btn btn-primary btn-xs" style="float: right;">
                    <span class="fa fa-plus"></span> {{ __('Update') }}
                </button>
        </form>
      </div>
    </div>
  </div>

@else
 <script type="text/javascript">
  alert('Terjadi Kesalahan');
  history.back();
</script>
@endif

@endsection
@section('script')

@endsection