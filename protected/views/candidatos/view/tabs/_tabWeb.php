<?php
/* Twitter $twitter */
/* ModelCandidato $modelCandidato */
    $twitterCandidato = $twitter->getCandidatoTwitter($modelCandidato->CODIGO_CANDIDATO);
    if($twitterCandidato){
        $twitter->connect();
        $tweets = $twitter->getUltimosTweets($twitterCandidato);
        $mentions = $twitter->getMentions($twitterCandidato);
    }
?>
<?php if($twitterCandidato){ ?>
<div class="panel panel-agic panel-twitter col-xs-12">
    <div class="panel-heading">
        <h3 class="panel-title" style="display: inline;">@<?php echo $twitterCandidato ?></h3>
        <div class="clearfix"></div>        
    </div>
    <div class="panel-body">
            <div class="tweetsContent col-xs-12 col-sm-6">
                <h4>Últimos Tweets:</h4>
                <?php if(isset($tweets)){
                    foreach($tweets as $tweet){
                       echo "<div class='tweetText text-justify'>".$tweet->text."</div>" ;
                       echo "<div class='text-right tweetDate'>Data ".Utils::dateFromTwitter($tweet->created_at)."</div>" ;
                    } 
                } else{
                    echo "<div>Nehum registro encontrado.</div>";
                } ?>
            </div>
            <div class="mentionsContent col-xs-12 col-sm-6">
                <h4>Mentions:</h4>
                <?php if(isset($mentions)){
                    foreach($mentions as $tweet){
                       echo "<div class='tweetText text-justify'>".$tweet->text."</div>" ;
                       echo "<div class='text-right tweetDate'>Data ".Utils::dateFromTwitter($tweet->created_at)."</div>" ;
                    } 
                } else{
                    echo "<div>Nehum registro encontrado.</div>";
                } ?>
            </div>
    </div>
</div>
<?php } ?>

<div class="panel panel-agic panel-search col-xs-12">
    <div class="panel-heading">
        <h3 class="panel-title" style="display: inline;">Na web</h3>
        <div class="clearfix"></div>        
    </div>
    <div class="panel-body" id="searchResult">
        <div class="col-sm-2" class="col-xs-12">
        </div>
    </div>
</div>

<?php
$baseUrl = Yii::app()->baseUrl; 
Yii::app()->getClientScript()->registerScriptFile($baseUrl.'/js/google-search.js');
Yii::app()->clientScript->registerScript("searchPanel","              
    customSearch('".$modelCandidato->NOME_URNA_CANDIDATO."');
");
?>
