<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Admin</title>
</head>
<body>
    <div id="container">
        <form method="post" action="#">
            <input type="text" name="email" placeholder="Email" /><br>
            <input type="submit" value="Cadastrar" />
        </form>

        <table>
            <caption>Lista de Acesso</caption>
            <tr>
                <th>Email</th>
                <th colspan="2">Ações</th>
            </tr>
            <!-- As informações são pegadas pelo php e os hrefs vão para as páginas que vão editar ou inativar -->
            <tr>
                <td>Moisés</td>
                <td>moises@gmail.com</td>
                <td><a <?= "href='#?cod=cod'" ?>>Editar</a> <a <?= "href='#?cod=cod'" ?>>Inativar</a></td>
            </tr>
        </table>
    </div>
</body>
</html>