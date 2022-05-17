@extends('admin.layout.masteradmin')
@section('content') 

<div class="right_col" role="main">
  <div class=""> 
    <div class="clearfix"></div>
      <div class="x_panel shadow-sm">
         <form method="POST" action="{{URL::to('/datauser/tambah')}}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    <font size="1" color="red">Minimal 6 Karakter</font>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div> 

                <div class="form-group">
                    <label for="level">{{ __('Level') }}</label>
                        <div class="has-error">
                            <select class="form-control" name="level" required="">
                                <option value="">-- Pilih Level --</option>
                                @foreach ($level as $level)
                                <option value="{{$level->id_level}}">{{$level->nama_level}}</option>
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
                    <label for="posisi">{{ __('Posisi') }}</label>
                        <div class="has-error">
                            <select class="form-control" name="posisi" required="">
                                <option value="">-- Pilih Posisi --</option>
                                @foreach ($posisi as $posisi)
                                <option value="{{$posisi->id_posisi}}">{{$posisi->nama_posisi}}</option>
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

                <br/>
                <a href="{{ url('/user') }}"><button type="button" class="btn btn-danger btn-xs" >
                    <span class="fa fa-chevron-left"></span> {{ __('Kembali') }}
                </button></a>
                <button type="submit" class="btn btn-primary btn-xs" style="float: right;">
                   <span class="fa fa-plus"></span> {{ __('Tambah Pengguna/Pelamar') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection