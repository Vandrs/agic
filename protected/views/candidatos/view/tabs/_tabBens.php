<?php
$this->widget('booster.widgets.TbGridView',array(
	'id'=>'candidato-bens-grid',
	'dataProvider'=>$modelCandidato->getBensCandidato(),
	'columns'=>array(
                array(
                    'name'  => 'Tipo',
                    'value' => '$data["DS_TIPO"]'
                ),
            array(
                    'name'  => 'Descrição',
                    'value' => '$data["DS_BEM"]'
                ),
            array(
                    'name'  => 'Valor',
                    'value' => 'Utils::moneyMask($data["VALOR_BEM"])'
                ),
	)
));
