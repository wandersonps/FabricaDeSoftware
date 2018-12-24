<?php
include_once "../config/deny.php";
?>

<!-- Conteudo que envolve as tab e suas respectivas informacoes-->

<!-- linhas : idOs, dataEmissao, dataPrevEntrega  -->


<fieldset>
    <div class="form-group"><legend> Dados </legend></div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="clienteOs">Cliente (CPF):</label> 
        <div class="col-md-7">
            <input id="cpf_cnpj" name="clientes_cpf" type="text" placeholder="Informe o CPF do cliente já cadastrado" class="form-control input-md" required="true" />

        </div>
        <div class="col-md-2">
            <a class="btn btn-primary col-md12 control-label" href="cadastro-cliente.php" target="_blank" title="Caso o cliente nao tenha sido cadastrado!"> Cadastrar Cliente</a>
        </div>
    </div>                
    <hr/>
    <div class="form-group">
        <div class="col-md-5">
            <!-- Campo Data Previsão de entrega da OS ()-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="dataEmissao">Data Emissão:</label> 
                <div class="col-md-6">
                    <input  id="dataEmissao" name="dataEmissao" type="text" placeholder="Data Emissão" class="form-control input-md" required="true" />
                </div>
            </div>                
        </div>
        <div class="col-md-6">
            <!-- Campo Data Previsäo de entrega da OS ()-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="dataPrevEntrega">Data Prevista:</label> 
                <div class="col-md-6">
                    <input id="dataPrevEntrega" name="dataPrevEntrega" type="text" placeholder="Previsão de entrega" class="form-control input-md" required="true" />
                </div>
            </div>                
        </div>                          
    </div>
    <hr/>
    <!-- Fim linhas : idOs, dataEmissao, dataPrevEntrega  -->       
    <!-- Inicio table longe ***************************-->

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Longe</th>
                <th>ESF</th>
                <th>CIL</th>
                <th>EIXO</th>
                <th>DNP</th>
                <th>ALTURA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>OD</td>
                <td>
                    <!-- Campo Grau longe Esférico olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longEsfOd" name="longEsfOd" type="number" min="0" max="10" step="0.25" placeholder="Long Esf OD" class="form-control input-md" />
                        </div>

                    </div>          
                </td>
                <td>
                    <!-- Campo Grau longe Esférico olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longCilOd" name="longCilOd" type="number" min="0" max="10" step="0.25" placeholder="Long Cil OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longEixoOd" name="longEixoOd" type="number" min="0" max="10" step="1" placeholder="Long Eixo OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longDnpOd" name="longDnpOd" type="number" min="0" max="10" step="0.25" placeholder="Long Dnp OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longAlturaOd" name="longAlturaOd" type="number" min="0" max="10" step="0.25" placeholder="Long Alt OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
            </tr>
            <tr>
                <td>OE</td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longEsfOd" name="longEsfOe" type="number" min="0" max="10" step="0.25" placeholder="Long Esf OE" class="form-control input-md" />
                        </div>
                    </div>          
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longCilOd" name="longCilOe" type="number" min="0" max="10" step="0.25" placeholder="Long Cil OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longEixoOd" name="longEixoOe" type="number" min="0" max="10" step="1" placeholder="Long Eixo OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longDnpOd" name="longDnpOe" type="number" min="0" max="10" step="0.25" placeholder="Long Dnp OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau longe Esf�rico olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="longAlturaOd" name="longAlturaOe" type="number" min="0" max="10" step="0.25" placeholder="Long Altura OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Perto</th>
                <th>ESF</th>
                <th>CIL</th>
                <th>EIXO</th>
                <th>DNP</th>
                <th>ALTURA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>OD</td>
                <td>
                    <!-- Campo Grau pertoEsfOd olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perEsfOd" name="perEsfOd" type="number" min="0" max="10" step="0.25" placeholder="Perto Esf OD" class="form-control input-md" />
                        </div>
                    </div>          
                </td>
                <td>
                    <!-- Campo Grau pertoCilOd olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perCilOd" name="perCilOd" type="number" min="0" max="10" step="0.25" placeholder="Perto Esf OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoEixoOd olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perEixoOd" name="perEixoOd" type="number" min="0" max="10" step="1" placeholder="Perto Eixo OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoDnpOd olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perDnpOd" name="perDnpOd" type="number" min="0" max="10" step="0.25" placeholder="Perto Dnp OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoAlturaOd olho direito da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perAlturaOd" name="perAlturaOd" type="number" min="0" max="10" step="0.25" placeholder="Perto Alt OD" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
            </tr>
            <tr>
                <td>OE</td>
                <td>
                    <!-- Campo Grau pertoEsfOe olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perEsfOe" name="perEsfOe" type="number" min="0" max="10" step="0.25" placeholder="Perto Esf OE" class="form-control input-md" />
                        </div>
                    </div>          
                </td>
                <td>
                    <!-- Campo Grau pertoCilOe olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perCilOe" name="perCilOe" type="number" min="0" max="10" step="0.25" placeholder="Perto Cil OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoEixoOe olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perEixoOe" name="perEixoOe" type="number" min="0" max="10" step="1" placeholder="Perto Eixo OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoDnpOe olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perDnpOe" name="perDnpOe" type="number" min="0" max="10" step="0.25" placeholder="Perto Dnp OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
                <td>
                    <!-- Campo Grau pertoAlturaOe olho Esquerdo da OS ()-->
                    <div class="form-group">
                        <div class="col-md-11">
                            <input id="perAlturaOe" name="perAlturaOe" type="number" min="0" max="10" step="0.25" placeholder="Perto Altura OE" class="form-control input-md" />
                        </div>
                    </div>        
                </td>
            </tr>
        </tbody>
    </table>
</fieldset>
<br/>
