@extends('adminlte::layouts.app')
@section('title')
Inicio
@endsection
@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
Inicio
@endsection
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						@role('admin')
						<h3 class="box-title">Bienvenido Doctor</h3>
						@endrole
						@role('nurse')
						<h3 class="box-title">Bienvenido</h3>
						@endrole

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						{{ trans('adminlte_lang::message.logged') }}. 
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
			<img src="{{ asset('img/medical.jpg') }}" class="img-responsive" width="100%" alt="consultAPP">
		</div>
	</div>
@endsection
