<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Section Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<script>
    function nextStep(){
        document.getElementById('personalData').style["display"] = "none";
        document.getElementById('address').style["display"] = "";
        document.getElementById('submit').style["display"] = "";
         }
</script>
<body>

<div class="container mb-3">
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-6 ">
            <form action="ecommerce-private/login-control/register.php" method="post">
                <!-- Section 1 -->
                <div class="form-group " id="personalData" >
                    <h2>Informacoes pessoais</h2>
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>

                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>

                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control w-25" id="senha" name="senha" required>

                    <label for="confirmarSenha">Confirmar Senha:</label>
                    <input type="password" class="form-control w-25" id="confirmarSenha" name="confirmarSenha" required>
                    
                    <div class="col-md-6">
                    <a href="login.php" class="btn btn-danger mt-2">Voltar</a>
                    <button class="btn btn-success mt-2" onclick="nextStep()">Proximo</button>
                   
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="form-group"id="address" style="display: none;">
                    <h2>Endereço</h2>
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control w-25" id="cep" name="cep" required>

                    <div class="form-row">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required>

                    <label for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>

               

                    <div class="form-group col-md-6 mt-2">
                    <label for="uf">UF:</label>

                        <select name="uf" id="uf">
                        <option value="MG">MG</option>
                        <option value="SP">SP</option>
                        <option value="RJ">RJ</option>
                        <option value="RO">RO</option>
                        </select>
                    </div>

                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control w-50" id="bairro" name="bairro" required>

                 

                    

                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control w-50" id="cidade" name="cidade" required>
                </div>

                <button type="submit" id="submit" style="display: none;" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    </div>
</div>
<footer class="text-center text-secondary mt-3"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>



</body>
</html>
