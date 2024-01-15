<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProtoType - sign in</title>
    <link rel="icon" href="assets/icons/site-icon.png">
    <link rel="stylesheet" href="style/createAccount.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

</head>
<script>
    function stepBack(){
        document.getElementById('personalData').style["display"] = "";
        document.getElementById('address').style["display"] = "none";
        document.getElementById('submit').style["display"] = "none";
        document.getElementById('returnAddress').style["display"] = "none";
    }

    function nextStep(){
        document.getElementById('personalData').style["display"] = "none";
        document.getElementById('address').style["display"] = "";
        document.getElementById('submit').style["display"] = "";
        document.getElementById('returnAddress').style["display"] = "";
         }

         function getDadosEderecoPorCep(cep){
			let url = 'https://viacep.com.br/ws/'+cep+'/json/'
			console.log(url)
			let xmlHttp = new XMLHttpRequest()
			xmlHttp.open('GET',url)
			xmlHttp.onreadystatechange = ()=>{
				if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
					let dadosJSONText =  xmlHttp.responseText
					let dadosJSONObj = JSON.parse(dadosJSONText)

					document.getElementById('endereco').value=dadosJSONObj.logradouro
					console.log(dadosJSONObj.logradouro)

					document.getElementById('bairro').value= dadosJSONObj.bairro
					console.log(dadosJSONObj.bairro)

					document.getElementById('cidade').value = dadosJSONObj.localidade
					console.log(dadosJSONObj.localidade)

					document.getElementById('uf').value = dadosJSONObj.uf
					console.log(dadosJSONObj.uf)
				}
			}
			xmlHttp.send()
		}
        
</script>
<body  >


<img src="assets/icons/logo.png" alt="Logo" class="logo">
<div class="container mb-3">
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-6 ">
            <form action="ecommerce-private/login-control/register.php" method="post">
                <!-- Section 1 -->
                <div class="form-group " id="personalData" >
                    <h2>Personal Data</h2>
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>

                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>

                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control w-25" id="senha" name="senha" required>

                    <label for="confirmarSenha">Confirmar Senha:</label>
                    <input type="password" class="form-control w-25" id="confirmarSenha" name="confirmarSenha" required>
                    
                  
                    <a href="login.php" class="btn btn-danger mt-2">Return</a>
                    <button class="btn btn-success mt-2" style=" position: absolute; right: 40px;" onclick="nextStep()">Next</button>
                   
                    
                </div>

                <!-- Section 2 -->
                <div class="form-group"id="address" style="display: none;">
                    <h2>Address</h2>
                    <label for="cep">CEP:</label>
                    <input type="text" onblur="getDadosEderecoPorCep(this.value)" class="form-control w-25" id="cep" name="cep" required>

                    <div class="form-row">
                    <label for="endereco">Address:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required>

                    <label for="complemento">Complement:</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>

               

                    <div class="form-group col-md-6 mt-2">
                    <label for="uf">UF:</label>
                        <select name="uf" id="uf">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>

                        <br>
                    <label for="bairro">District:</label>
                    <input type="text" class="form-control w-50" id="bairro" name="bairro" required>

                 

                    

                    <label for="cidade">City:</label>
                    <input type="text" class="form-control w-50" id="cidade" name="cidade" required>
                </div>
                 <button  id="returnAddress" onclick="stepBack()" style="display: none; position: absolute; bottom:30px; left: 50px;" class="btn btn-danger" >Back</button>
                <button type="submit" id="submit" style="display: none; position: absolute; bottom:30px; right: 40px;" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    </div>
</div>
<footer class="text-center text-secondary mt-3" id="footerCreateAccount"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>



</body>
</html>
