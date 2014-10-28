<?php
$this->widget('booster.widgets.TbDetailView',array(
    'data'=>$modelCandidato,
    'attributes'=>array(
            'DESCRICAO_OCUPACAO',
            'DATA_NASCIMENTO',
            'NUM_TITULO_ELEITORAL',
            'DESCRICAO_SEXO',
            'DESCRICAO_GRAU_INSTRUCAO',
            'DESCRICAO_ESTADO_CIVIL',
            'DESCRICAO_COR_RACA',
            'DESCRICAO_NACIONALIDADE',
            'SIGLA_UF_NASCIMENTO',
            'NOME_MUNICIPIO_NASCIMENTO',
    ),
));


