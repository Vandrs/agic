<div class="content-info-candidato">
    <div class="row">
        <?php if($modelCandidato->hasFoto()){ ?>
        <div class="col-xs-12 col-sm-2"> 
            <center>
                <img src="<?php echo $modelCandidato->getUrlPathFotoCandidato();?>" alt="<?php echo $modelCandidato->NOME_CANDIDATO ?>" class="img-thumbnail img-candidato">
            </center>
        </div>
        <?php } ?>
             
        <div class="panel panel-agic col-sm-10 col-xs-12">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-list-alt"></span> 
                <h3 class="panel-title" style="display: inline;">Informações Eleitorais</h3>
                <div class="clearfix"></div>        
            </div>
            <div class="panel-body">
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Nome na Urna:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->NOME_URNA_CANDIDATO?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Cargo disputado:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->strCargo; ?>
                </span>
                
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Número:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->NUMERO_CANDIDATO ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Partido:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->strPartido ?>
                </span>
            </div>
        </div>
        
        <div class="panel panel-agic col-md-10 col-xs-12">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user"></span> 
                <h3 class="panel-title" style="display: inline;">Informações Pessoais</h3>
                <div class="clearfix"></div>        
            </div>
            <div class="panel-body">
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Idade:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->IDADE ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Data de nascimento:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DATA_NASCIMENTO ?>
                </span>
                
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Ocupação:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_OCUPACAO ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Grau de instrução:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_GRAU_INSTRUCAO ?>
                </span>
                
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Sexo:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_SEXO ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Estado civil:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_ESTADO_CIVIL ?>
                </span>
                
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Nacionalidade:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_NACIONALIDADE ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Cor/Raça:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->DESCRICAO_COR_RACA ?>
                </span>
                
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>Município de nascimento:</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->NOME_MUNICIPIO_NASCIMENTO ?>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <strong>UF de nascimento</strong>
                </span>
                <span class="col-md-3 col-sm-6 col-xs-12 text-left">
                    <?php echo $modelCandidato->SIGLA_UF_NASCIMENTO ?>
                </span>
            </div>
        </div>
  </div>
</div>

