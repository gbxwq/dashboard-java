<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/52ff4c741b.js" crossorigin="anonymous"></script>
    <title>Categorias</title>
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
                <h1>Gestão de categorias</h1>
                <a href="add-categorias.php"><button class="add"><i class="fa-solid fa-user-plus"></i> Adicionar categoria</button></a>
            </div>
            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
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
            let categorias = JSON.parse(localStorage.getItem('bancoCategorias')) || []
            let id = 0
            corpoTable.innerHTML = ''

            categorias.forEach(function(categoria, index){
                corpoTable.innerHTML += `
                    </tr>
                        <td>${id + 1}</td>
                        <td>${categoria.catName}</td>
                        <td><mark class="badge ${categoria.catStats}">${categoria.catStats}</mark></td>
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
            if(confirm("Tem certeza que deseja deletar essa categoria??")){
                let categorias = JSON.parse(localStorage.getItem('bancoCategorias'))
                categorias.splice(index, 1)
                localStorage.setItem('bancoCategorias', JSON.stringify(categorias))
                carregarDados()
            }
        }
        
        function editar(index){
            let novoNome = prompt("Qual o novo nome da categoria?")
            let categorias = JSON.parse(localStorage.getItem('bancoCategorias')) 
            categorias[index].catName = novoNome
            if(prompt("Deseja mudar o status da categoria?") == 'sim'){
                if(categorias[index].catStats == 'ativo'){
                    categorias[index].catStats = 'inativo'
                } else if(categorias[index].catStats == 'inativo'){
                    categorias[index].catStats = 'ativo'
                }
            } 
            localStorage.setItem('bancoCategorias', JSON.stringify(categorias))
            carregarDados()
        }

        carregarDados()

    </script>
</body>
</html> 