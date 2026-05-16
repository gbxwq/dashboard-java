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
                <h1><i class="fa-solid fa-user-plus"></i> Cadastro de categoria</h1>
                <p>Preencha os dados para adicionar categoria</p>
                <form action="#" method="POST">
                    <div class="space">
                        <label for="inome">Nome</label>
                        <input type="text" name="nome" id="inome" placeholder="Digite o nome da categoria">
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
            let nome = document.getElementById('inome').value
            let stats = document.getElementById('istats').value

            if(nome != ''){
                const newCat = {
                    catName: nome,
                    catStats: stats
                }

                let categorias = JSON.parse(localStorage.getItem('bancoCategorias')) || []
                categorias.push(newCat)
                localStorage.setItem('bancoCategorias', JSON.stringify(categorias))
                alert("Categoria registrada com sucesso!")
            } else{
                alert("Dados imcompletos !!")
            }
        })
    </script>
</body>
</html>