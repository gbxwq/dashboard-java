<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/52ff4c741b.js" crossorigin="anonymous"></script>
    <title>Postagens</title>
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
                <h1>Gestão de postagens</h1>
                <a href="add-postagens.php"><button class="add"><i class="fa-solid fa-user-plus"></i> Adicionar postagem</button></a>
            </div>
            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Conteúdo</th>
                            <th>Categoria</th>
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
            let postagens = JSON.parse(localStorage.getItem('bancoPostagens')) || []
            let id = 0
            corpoTable.innerHTML = ``

            postagens.forEach(function(postagem, index){
                corpoTable.innerHTML += `
                    </tr>
                        <td>${id + 1}</td>
                        <td>${postagem.postTitle}</td>
                        <td>${postagem.postCont}</td>
                        <td>${postagem.postCat}</td>
                        <td><mark class="badge ${postagem.postStats}">${postagem.postStats}</mark></td>
                        <td>
                            <i class="fa-solid fa-pen" onclick = "editar(${index})"></i>
                            <i class="fa-solid fa-trash-can" onclick = "deletar(${index})"></i>
                        </td>
                    </tr>
                `

                id += 1
            })
        }

        function deletar(index){
            if(confirm("Tem certeza que deseja apagar??")){
                let postagens = JSON.parse(localStorage.getItem('bancoPostagens'))
                postagens.splice(index, 1)
                localStorage.setItem('bancoPostagens', JSON.stringify(postagens))
                carregarDados()
            }
        }

        function editar(index){
            let novoTitle = prompt("Qual o novo título da postagem??")
            let novoCont = prompt("Qual o novo conteúdo da postagem??")
            let novoCat = prompt("Qual a nova categoria da postagem??")

            let postagens = JSON.parse(localStorage.getItem('bancoPostagens'))
            postagens[index].postTitle = novoTitle
            postagens[index].postCont = novoCont
            postagens[index].postCat = novoCat

            if(prompt("Deseja mudar o status da categoria??") == 'sim'){
                if(postagens[index].postStats == "ativo"){
                    postagens[index].postStats = "inativo"
                }else if(postagens[index].postStats == "inativo"){
                    postagens[index].postStats = "ativo"
                }
            }

            localStorage.setItem('bancoPostagens', JSON.stringify(postagens))
            carregarDados()
        }

        carregarDados()
    </script>
</body>
</html> 