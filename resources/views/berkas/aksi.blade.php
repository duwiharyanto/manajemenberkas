<form action="{{ route('Berkas.destroy',$row->id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<a href="{{ route('Berkas.edit',encrypt($row->id)) }}" class=" btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>
	<button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')" name="hapus" value="hapus"><span class="fa fa-trash"></span></button>
	<a href="{{ Storage::url($row->file)}}" target="_blank" class=" btn btn-xs btn-success"><span class="fa fa-download"></span></a>	
</form>