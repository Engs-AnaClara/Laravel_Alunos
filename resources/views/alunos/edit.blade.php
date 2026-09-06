<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
</head>
<body>
    <h1>Editar Aluno</h1>

    <form method="POST" action="/alunos/{{ $id }}">
        @method('PUT')
        <input type="text" name="name" placeholder="Nome">
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
