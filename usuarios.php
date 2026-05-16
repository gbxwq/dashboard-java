<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/52ff4c741b.js" crossorigin="anonymous"></script>
    <title>Módulo de Usuários</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tabelas.css">
    <style>
        #tableh h1{
            margin: 10px;
        }

        #tableh{
            display: flex;
            flex-direction: row;
            justify-content: space-between; 
            align-items: center;
            margin: 10px;
        }

        #tableh  button{
            border-radius: 5px;
            border: 1px solid black;
            padding: 10px;
            background-color: #2743c0;
            color: white;
            cursor: pointer;
            transition-duration: .2s;
        }

        #tableh  button:hover{
            background-color: #5272ff;
        }

        #tableh i{
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="sep">
        <header><?php include("menu.php");?></header>
        <main>
            <div id="tableh">
                <h1>Gestão de usuários</h1>
                <a href="usuarios.php"><button class="add"><i class="fa-solid fa-user-plus"></i> Adicionar usuário</button></a>
            </div>
            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Acesso</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <footer><?php include("rodape.php");?></footer>
    <script>
        function carregarDados(){
            let corpoTable = document.querySelector('tbody')
            let usuarios = JSON.parse(localStorage.getItem('bancoUsuarios')) || []
            let id = 0
            corpoTable.innerHTML = ``
            usuarios.forEach(function(usuario, index){
            corpoTable.innerHTML += `
                </tr>
                    <td>${id + 1}</td>
                    <td>${usuario.userName}</td>
                    <td>${usuario.userEmail}</td>
                    <td>${usuario.userLvl}</td>
                    <td><mark class="badge inativo">Inativo</mark></td>
                    <td>
                        <i class="fa-solid fa-pen" onclick="editar(${index})"></i>
                        <i class="fa-solid fa-trash-can" onclick="deletar(${index})">
                    </td>
                </tr>    
                `
                id += 1
            })
        }

        function deletar(index){
            if(confirm("Tem certeza de que deseja deletar??")){
                let usuarios = JSON.parse(localStorage.getItem('bancoUsuarios'))
                usuarios.splice(index, 1)
                localStorage.setItem('bancoUsuarios', JSON.stringify(usuarios))
                carregarDados()
            }
        }

        function editar(index){
            let novoNome = prompt("Qual o novo nome do usuário??")
            let novoEmail = prompt("Qual o novo email do usuário??")    
            let usuarios = JSON.parse(localStorage.getItem('bancoUsuarios')) || []
            usuarios[index].userName = novoNome
            usuarios[index].userEmail = novoEmail
            localStorage.setItem('bancoUsuarios', JSON.stringify(usuarios))
            carregarDados()
        }

        carregarDados()
    </script>
</body>
</html>