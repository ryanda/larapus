<div class="input-field">
	{{HTML::Micon('mdi-action-book')}}
	{{Form::Mlabel('title', 'Judul Buku')}}
	{{Form::Mtext('title')}}
</div>
<div class="input-field">
	{{Form::select('author_id', [''=>'Pilih Penulis']+Author::lists('name','id'), null)}}
</div>
<div class="input-field">
	{{HTML::Micon('mdi-action-dns')}}
	{{Form::Mlabel('amount', 'Jumlah')}}
	{{Form::Mtext('amount')}}
</div>
<div class="input-field file-field">
	{{Form::text(null, null, ['class'=>'file-path validate'])}}
      <div class="btn">
        <span> file </span>
        {{Form::file('cover')}}
      </div>
</div>
@if (isset($book) && $book->cover )
	<div class="input-field">
		{{HTML::image(asset('img/'.$book->cover), null, ['class' => 'responsive-img'])}}
	</div>
@endif
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