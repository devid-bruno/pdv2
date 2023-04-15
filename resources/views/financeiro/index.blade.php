@extends('layoutsfinanceiro.header')
@section('content')

<a href="{{ url('/nota/' . $notaFiscal->id) }}" class="btn btn-primary">Imprimir nota fiscal</a>

@endsection
