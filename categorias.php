<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar categoria</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
    <script src="https://kit.fontawesome.com/52ff4c741b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sep">
        <header>
            <?php include("menu.php");?>
        </header>
        <main>
            <section>
                <h1><i class="fa-solid fa-user-plus"></i> Cadastro de postagem</h1>
                <p>Preencha os dados para adicionar postagem</p>
                <form action="#" method="POST">
                    <div class="space">
                        <label for="inome">Título</label>
                        <input type="text" name="nome" id="inome" placeholder="Digite o título da postagem">
                    </div>
        
                    <div class="space">
                        <label for="icont">Conteúdo</label>
                        <textarea name="cont" id="icont" placeholder="Sobre o que fala sua postagem??"></textarea>
                    </div>

                    <div class="space">
                        <label for="icat">Categoria</label>
                        <input type="text" name="cat" id="icat" placeholder="Qual a categoria da sua postagem?">
                    </div>

                    <div class="space">
                        <label for="istats">Status</label>
                        <select name="stats" id="istats">
                            <option>ativo</option>
                            <option>inativo</option>
                        </select>
                    </div>
        
                    <div class="space">
                        <input type="submit" value="Salvar" class="esp-btn" id="btn-salvar">
                        <input type="reset" value="Limpar" class="esp-btn">
                    </div>
                </form>
            </section>
        </main>
    </div>
    <footer>
        <?php include("rodape.php"); ?>
    </footer>
    <script>
        let btnSalvar = document.getElementById('btn-salvar')
        btnSalvar.addEventListener('click', () => {
            let titulo = document.getElementById('inome').value
            let conteudo = document.getElementById('icont').value
            let categoria = document.getElementById('icat').value
            let status = document.getElementById('istats').value

            if(titulo != '' && conteudo != ''){
                const newPost = {
                    postTitle: titulo,
                    postCont: conteudo,
                    postCat: categoria,
                    postStats: status
                }

                let postagens = JSON.parse(localStorage.getItem('bancoPostagens'))|| []
                postagens.push(newPost)
                localStorage.setItem('bancoPostagens', JSON.stringify(postagens))
                alert("Postagem cadastrada!!")
            } else{
                alert("Dados incompletos!")
            }
        })
    </script>
</body>
</html>