@extends('layouts.app')

@section('page_title')
   Bem Vindo {{ Auth::user()->name }}
@endsection

@section('content')
    <center><h3>
    Sistema teste criado como prova de conhecimento Técnico para o candidato Fábio Fleck.
    <br><br><br>
    Utilizado Framework LARAVEL (versão 5.7)
    <br><br><br>
    Tema padrão ADMIN Lte (Gratuito) em versão original e com as bibliotecas padronizadas.
    <br><br><br>
    Sem mudança de cores e estilos (CSS)
        </h3></center>
@endsection

