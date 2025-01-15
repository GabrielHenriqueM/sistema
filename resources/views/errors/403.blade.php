@extends('layouts.app')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @php
                $user = Auth::user();
                $role = $user->getRoleNames()->first();
                $mensagem = '';

                if ($role === 'admin') {
                    $mensagem = 'Você é um administrador, mas ocorreu um erro ao acessar esta funcionalidade.';
                } elseif ($role === 'funcionario') {
                    $mensagem = 'Você não tem permissão para deletar registros. Fale com o administrador.';
                } elseif ($role === 'estagiario') {
                    $mensagem = 'Estagiários não têm permissão para editar ou excluir dados.';
                } else {
                    $mensagem = 'Você não tem permissão para acessar esta página.';
                }
            @endphp

            Swal.fire({
                icon: 'error',
                title: 'Acesso Negado!',
                text: '{{ $mensagem }}',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Voltar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
        });
    </script>
@endsection
