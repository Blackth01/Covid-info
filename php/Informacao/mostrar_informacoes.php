<html>
	<head>
		<meta charset="utf-8"/>
		<title>Informações</title>
		<?php include '../main_imports.php';?>
		<style>
			.labelInfo{
				display:inline;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
		  <div class="row">
				<div class="col s12 m12">
						<div class="card hoverable">
							<div class="card-content">
								<span class="card-title indigo-text text-darken-3" style="text-align:center;font-size:40px"><strong>Dados sobre o Covid-19</strong></span>
							</div>
						</div>
				</div>
		  </div>
			<h4>Pesquisar por:</h4>
			<label>
				<input type="radio" id="estado" name="selecionado" value="estado" checked>
				<span>Estado</span>
			</label>
			<label>
				<input type="radio" id="pais" name="selecionado" value="pais">
				<span>País</span>
			</label>
			<div id="es">
				<br>
				<h4>Selecione o estado</h4>
				<br>
				<select id="porestado">
					<option value="sc">Santa Catarina</option>
					<option value="ac">Acre</option>
					<option value="al">Alagoas</option>
					<option value="ap">Amapá</option>
					<option value="am">Amazonas</option>
					<option value="ba">Bahia</option>
					<option value="ce">Ceará</option>
					<option value="df">Distrito Federal</option>
					<option value="es">Espírito Santo</option>
					<option value="go">Goiás</option>
					<option value="ma">Maranhão</option>
					<option value="mt">Mato Grosso</option>
					<option value="ms">Mato Grosso do Sul</option>
					<option value="mg">Minas Gerais</option>
					<option value="pa">Pará</option>
					<option value="pb">Paraíba</option>
					<option value="pr">Paraná</option>
					<option value="pe">Pernambuco</option>
					<option value="pi">Piauí</option>
					<option value="rj">Rio de Janeiro</option>
					<option value="rn">Rio Grande do Norte</option>
					<option value="rs">Rio Grande do Sul</option>
					<option value="ro">Rondônia</option>
					<option value="rr">Roraima</option>
					<option value="sp">São Paulo</option>
					<option value="se">Sergipe</option>
					<option value="to">Tocantins</option>
				</select>
				<ul class="collection">
				  <li class="collection-item"><p class="labelInfo">Casos confirmados: </p><span id="casos">0</span></li>
				  <li class="collection-item"><p class="labelInfo">Mortes: </p><span id="mortes">0</span></li>
				  <li class="collection-item"><p class="labelInfo">Suspeitos: </p><span id="suspeitos">0</span></li>
				  <li class="collection-item"><p class="labelInfo">Descartados: </p><span id="descartados">0</span></li>
				  <li class="collection-item"><p class="labelInfo">Atualizado em: </p><span id="data">0</span></li>
				</ul>
			</div>
			<div id="pa" style="display:none">
				<br>
				<h4>Selecione o país</h4>
				<br>
				<select id="porpais">
					<option value="brazil">Brasil</option>
					<option value="afghanistan">Afghanistan</option>
					<option value="albania">Albania</option>
					<option value="algeria">Algeria</option>
					<option value="andorra">Andorra</option>
					<option value="angola">Angola</option>
					<option value="antigua and barbuda">Antigua and Barbuda</option>
					<option value="argentina">Argentina</option>
					<option value="armenia">Armenia</option>
					<option value="australia">Australia</option>
					<option value="austria">Austria</option>
					<option value="azerbaijan">Azerbaijan</option>
					<option value="bahamas">Bahamas</option>
					<option value="bahrain">Bahrain</option>
					<option value="bangladesh">Bangladesh</option>
					<option value="barbados">Barbados</option>
					<option value="belarus">Belarus</option>
					<option value="belgium">Belgium</option>
					<option value="belize">Belize</option>
					<option value="benin">Benin</option>
					<option value="bhutan">Bhutan</option>
					<option value="bolivia">Bolivia</option>
					<option value="bosnia and herzegovina">Bosnia and Herzegovina</option>
					<option value="botswana">Botswana</option>
					<option value="brunei">Brunei</option>
					<option value="bulgaria">Bulgaria</option>
					<option value="burkina faso">Burkina Faso</option>
					<option value="burma">Burma</option>
					<option value="burundi">Burundi</option>
					<option value="cabo verde">Cabo Verde</option>
					<option value="cambodia">Cambodia</option>
					<option value="cameroon">Cameroon</option>
					<option value="canada">Canada</option>
					<option value="central african republic">Central African Republic</option>
					<option value="chad">Chad</option>
					<option value="chile">Chile</option>
					<option value="china">China</option>
					<option value="colombia">Colombia</option>
					<option value="comoros">Comoros</option>
					<option value="congo (brazzaville)">Congo (Brazzaville)</option>
					<option value="congo (kinshasa)">Congo (Kinshasa)</option>
					<option value="costa rica">Costa Rica</option>
					<option value="cote d'ivoire">Cote d'Ivoire</option>
					<option value="croatia">Croatia</option>
					<option value="cuba">Cuba</option>
					<option value="cyprus">Cyprus</option>
					<option value="czechia">Czechia</option>
					<option value="denmark">Denmark</option>
					<option value="diamond princess">Diamond Princess</option>
					<option value="djibouti">Djibouti</option>
					<option value="dominica">Dominica</option>
					<option value="dominican republic">Dominican Republic</option>
					<option value="ecuador">Ecuador</option>
					<option value="egypt">Egypt</option>
					<option value="el salvador">El Salvador</option>
					<option value="equatorial guinea">Equatorial Guinea</option>
					<option value="eritrea">Eritrea</option>
					<option value="estonia">Estonia</option>
					<option value="eswatini">Eswatini</option>
					<option value="ethiopia">Ethiopia</option>
					<option value="fiji">Fiji</option>
					<option value="finland">Finland</option>
					<option value="france">France</option>
					<option value="gabon">Gabon</option>
					<option value="gambia">Gambia</option>
					<option value="georgia">Georgia</option>
					<option value="germany">Germany</option>
					<option value="ghana">Ghana</option>
					<option value="greece">Greece</option>
					<option value="grenada">Grenada</option>
					<option value="guatemala">Guatemala</option>
					<option value="guinea">Guinea</option>
					<option value="guinea-bissau">Guinea-Bissau</option>
					<option value="guyana">Guyana</option>
					<option value="haiti">Haiti</option>
					<option value="holy see">Holy See</option>
					<option value="honduras">Honduras</option>
					<option value="hungary">Hungary</option>
					<option value="iceland">Iceland</option>
					<option value="india">India</option>
					<option value="indonesia">Indonesia</option>
					<option value="iran">Iran</option>
					<option value="iraq">Iraq</option>
					<option value="ireland">Ireland</option>
					<option value="israel">Israel</option>
					<option value="italy">Italy</option>
					<option value="jamaica">Jamaica</option>
					<option value="japan">Japan</option>
					<option value="jordan">Jordan</option>
					<option value="kazakhstan">Kazakhstan</option>
					<option value="kenya">Kenya</option>
					<option value="korea, south">Korea, South</option>
					<option value="kosovo">Kosovo</option>
					<option value="kuwait">Kuwait</option>
					<option value="kyrgyzstan">Kyrgyzstan</option>
					<option value="laos">Laos</option>
					<option value="latvia">Latvia</option>
					<option value="lebanon">Lebanon</option>
					<option value="lesotho">Lesotho</option>
					<option value="liberia">Liberia</option>
					<option value="libya">Libya</option>
					<option value="liechtenstein">Liechtenstein</option>
					<option value="lithuania">Lithuania</option>
					<option value="luxembourg">Luxembourg</option>
					<option value="ms zaandam">MS Zaandam</option>
					<option value="madagascar">Madagascar</option>
					<option value="malawi">Malawi</option>
					<option value="malaysia">Malaysia</option>
					<option value="maldives">Maldives</option>
					<option value="mali">Mali</option>
					<option value="malta">Malta</option>
					<option value="marshall islands">Marshall Islands</option>
					<option value="mauritania">Mauritania</option>
					<option value="mauritius">Mauritius</option>
					<option value="mexico">Mexico</option>
					<option value="moldova">Moldova</option>
					<option value="monaco">Monaco</option>
					<option value="mongolia">Mongolia</option>
					<option value="montenegro">Montenegro</option>
					<option value="morocco">Morocco</option>
					<option value="mozambique">Mozambique</option>
					<option value="namibia">Namibia</option>
					<option value="nepal">Nepal</option>
					<option value="netherlands">Netherlands</option>
					<option value="new zealand">New Zealand</option>
					<option value="nicaragua">Nicaragua</option>
					<option value="niger">Niger</option>
					<option value="nigeria">Nigeria</option>
					<option value="north macedonia">North Macedonia</option>
					<option value="norway">Norway</option>
					<option value="oman">Oman</option>
					<option value="pakistan">Pakistan</option>
					<option value="panama">Panama</option>
					<option value="papua new guinea">Papua New Guinea</option>
					<option value="paraguay">Paraguay</option>
					<option value="peru">Peru</option>
					<option value="philippines">Philippines</option>
					<option value="poland">Poland</option>
					<option value="portugal">Portugal</option>
					<option value="qatar">Qatar</option>
					<option value="romania">Romania</option>
					<option value="russia">Russia</option>
					<option value="rwanda">Rwanda</option>
					<option value="saint kitts and nevis">Saint Kitts and Nevis</option>
					<option value="saint lucia">Saint Lucia</option>
					<option value="saint vincent and the grenadines">Saint Vincent and the Grenadines</option>
					<option value="san marino">San Marino</option>
					<option value="sao tome and principe">Sao Tome and Principe</option>
					<option value="saudi arabia">Saudi Arabia</option>
					<option value="senegal">Senegal</option>
					<option value="serbia">Serbia</option>
					<option value="seychelles">Seychelles</option>
					<option value="sierra leone">Sierra Leone</option>
					<option value="singapore">Singapore</option>
					<option value="slovakia">Slovakia</option>
					<option value="slovenia">Slovenia</option>
					<option value="solomon islands">Solomon Islands</option>
					<option value="somalia">Somalia</option>
					<option value="south africa">South Africa</option>
					<option value="south sudan">South Sudan</option>
					<option value="spain">Spain</option>
					<option value="sri lanka">Sri Lanka</option>
					<option value="sudan">Sudan</option>
					<option value="suriname">Suriname</option>
					<option value="sweden">Sweden</option>
					<option value="switzerland">Switzerland</option>
					<option value="syria">Syria</option>
					<option value="taiwan*">Taiwan*</option>
					<option value="tajikistan">Tajikistan</option>
					<option value="tanzania">Tanzania</option>
					<option value="thailand">Thailand</option>
					<option value="timor-leste">Timor-Leste</option>
					<option value="togo">Togo</option>
					<option value="trinidad and tobago">Trinidad and Tobago</option>
					<option value="tunisia">Tunisia</option>
					<option value="turkey">Turkey</option>
					<option value="us">United States</option>
					<option value="uganda">Uganda</option>
					<option value="ukraine">Ukraine</option>
					<option value="united arab emirates">United Arab Emirates</option>
					<option value="united kingdom">United Kingdom</option>
					<option value="uruguay">Uruguay</option>
					<option value="uzbekistan">Uzbekistan</option>
					<option value="vanuatu">Vanuatu</option>
					<option value="venezuela">Venezuela</option>
					<option value="vietnam">Vietnam</option>
					<option value="west bank and gaza">West Bank and Gaza</option>
					<option value="western sahara">Western Sahara</option>
					<option value="yemen">Yemen</option>
					<option value="zambia">Zambia</option>
					<option value="zimbabwe">Zimbabwe</option>
				</select>
				<ul class="collection">
				  <li class="collection-item"><p class="labelInfo">Casos ativos: </p><span id="casos_pa" >0</span></li>
				  <li class="collection-item"><p class="labelInfo">Casos confirmados: </p><span id="confirmados_pa" >0</span></li>
				  <li class="collection-item"><p class="labelInfo">Mortes: </p><span id="mortes_pa" >0</span></li>
				  <li class="collection-item"><p class="labelInfo">Recuperados: </p><span id="recuperados_pa" >0</span></li>
				  <li class="collection-item"><p class="labelInfo">Atualizado em: </p><span id="data_pa" >0</span></li>
				</ul>
			</div>
			<br>
		</div>
	</body>
	<script>
		  $(document).ready(function(){
			$('select').formSelect();
		  });

		//Define que quando algum radio button mudar de valor, a seguinte funcao deve ser executada:
		$('input[type=radio][name=selecionado]').change(function() {
			//verifica se o valor selecionado foi estado ou pais
			if (this.value == 'estado') {
				/*executa a funcao buscarDados passando como parametro uma string com o valor "estado" para buscar os dados iniciais,
					esconde o select e as informacoes dos paises e mostra as dos estados*/
				buscarDados("estado")
				$("#es").css({"display":"block"});
				$("#pa").css({"display":"none"});
			}
			else if (this.value == 'pais') {
                                /*executa a funcao buscarDados passando como parametro uma string com o valor "pais" para buscar os dados iniciais,
                                	esconde o select e as informaçoes do estados e mostra as dos paise*/
				buscarDados("pais")
				$("#es").css({"display":"none"});
				$("#pa").css({"display":"block"});
			}
		});
		
		/*Define que quando o select de países mudar de valor, a função buscarDados deve ser executada
			passando como parâmetro uma string com o valor "pais" */ 
		$("#porpais").change(function(){ buscarDados("pais")});
		
		/*Define que quando o select de estados mudar de valor, a função buscarDados deve ser executada
			passando como parâmetro uma string com o valor "estado" */
		$("#porestado").change(function(){ buscarDados("estado")});

		/*Executa a função buscarDados passando como parâmetro a string "estado", para 
			inicializar os dados no primeiro carregamento da página*/
		buscarDados("estado")

		//Declara a função buscarDados
		function buscarDados(choice){
			//variável que conterá a URL da API a qual será utilizada para buscar os dados
			var url = ""
			
			//verifica se a seleção é de estados ou de países
			if(choice == "estado"){
				//utiliza a URL da API responsável por buscar os dados de estados e concatena com o valor selecionado no select de estados
				url = "https://covid19-brazil-api.now.sh/api/report/v1/brazil/uf/" + $("#porestado").val()
			}
			else{
				//utiliza a URL da API responsável por buscar os dados de países e concatena com o valor selecionado no select de países
				url = "https://covid19-brazil-api.now.sh/api/report/v1/" + $("#porpais").val()
			}
			
			//método da lib Jquery que realiza uma request http
			$.ajax({
				/*método utilizado na request, pode ser GET, POST, PUT ou DELETE, 
				GET é recomendado para a busca de dados (quem faz a API é quem define os métodos para cada rota )*/
				method: "GET",
				//URL a ser utilizada na request
				url: url,
				//Se a request resultar em sucesso, a seguinte função será executada:
				success: function(result){
					//Printa a request utilizada e o resultado obtido
					console.log("URL utilizada: " + url)
					console.log(result)
					//Verifica se o select selecionado é de estados ou de países 
					if(choice == "estado"){
						//preenche os dados da página com os resultados buscados da API
						document.getElementById("casos").innerHTML = result["cases"]
						document.getElementById("mortes").innerHTML = result["deaths"]
						document.getElementById("suspeitos").innerHTML = result["suspects"]
						document.getElementById("descartados").innerHTML = result["refuses"]
						var d = new Date(result["datetime"])
						var data_formatada = d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds()
						document.getElementById("data").innerHTML = data_formatada	
					}
					else{
						//preenche os dados da página com os resultados buscados da API
						document.getElementById("casos_pa").innerHTML = result.data["cases"]
						document.getElementById("confirmados_pa").innerHTML = result.data["confirmed"]
						document.getElementById("mortes_pa").innerHTML = result.data["deaths"]
						document.getElementById("recuperados_pa").innerHTML = result.data["recovered"]
						var d = new Date(result.data["updated_at"])
						var data_formatada = d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds()
						document.getElementById("data_pa").innerHTML = data_formatada							
					}
				},
				//Se a request resultar em erro, a seguinte função será executada:
				error: function (request, error) {
					alert("Ocorreu um erro ao buscar os dados da API!");
				},
			});
		}
	</script>
</html>