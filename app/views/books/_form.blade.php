<div class="input-field">
	{{HTML::Micon('mdi-action-book')}}
	{{Form::Mlabel('title', 'Judul Buku')}}
	{{Form::Mtext('title')}}
</div>
{{-- <div class="input-field">
	{{HTML::Micon('mdi-social-person')}}
	{{Form::Mlabel('author_id', 'Penulis')}}
	{{Form::select('author_id', [''=>'']+Author::lists('name','id'), null, ['id'=>'author_id','placeholder'=>'Pilih Penulis'])}}
</div> --}}
<div class="input-field">
	{{Form::select('author_id', [''=>'Pilih Penulis']+Author::lists('name','id'), 0)}}
</div>
<div class="input-field">
	{{HTML::Micon('mdi-action-dns')}}
	{{Form::Mlabel('amount', 'Jumlah')}}
	{{Form::Mtext('amount')}}
</div>
{{-- {{HTML::divider()}} --}}
{{Form::Msubmit('Simpan')}}
{{HTML::fab('index','mdi-content-reply')}}
@section('js')
	$('select').material_select();
@stop
@section('css')
	.btn {
		z-index:0;
	}
@stop