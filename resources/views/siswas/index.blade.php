@extends('siswas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>PPDB SMK Wikrama</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('landing') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Asal Sekolah</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td>{{ $siswa->tampat_lahir }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->asal_sekolah }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->jurusan }}</td>
            <td>
                <form action="{{ route('siswas.destroy',$siswa->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('siswas.show',$siswa->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('siswas.edit',$siswa->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $siswas->links() !!}
      
@endsection