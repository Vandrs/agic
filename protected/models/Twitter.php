<?php

require_once('twitteroauth/twitteroauth.php');

class Twitter{
    CONST CONSUMER_KEY = '11ADKMDyolvsx3JS3fhGrynFo';
    CONST CONSUMER_SECRET = 'YSC53qsKiL4oaN7bAGNWJySIMEvhYnWgih3if8g7YYMy9rxlDL';
    CONST TWEETS_NUMBER = 6;
    
    private $twitterApi = null;

    public function connect(){
        $this->twitterApi = new TwitterOAuth(Twitter::CONSUMER_KEY, Twitter::CONSUMER_SECRET);
    }
    
    public function getMentions($candidatoTwitter){
        $tweets = array();
         $params = array(
            "q"=>"@".$candidatoTwitter,
            "count" => Twitter::TWEETS_NUMBER
        );
        $contentMentions = $this->twitterApi->get('search/tweets',$params);
        if(isset($contentMentions)){
            $tweets = $contentMentions->statuses;
        }
        return $tweets;
    }
    
    public function getUltimosTweets($candidatoTwitter){   
        $params = array(
            "screen_name" => $candidatoTwitter,
            "count" => Twitter::TWEETS_NUMBER,
            "exclude_replies" => "true"    
        );
        $tweets = array();
        $content = $this->twitterApi->get('statuses/user_timeline',$params);   
        if(is_array($content)){
            $tweets = $content;
        }
        return $tweets;
    }
    
    public function getCandidatoTwitter($codigoCandidato){
        $candidatoTwitter = array(
            "280000000083" => "dilmabr",
            "280000000085" => "AecioNeves",
            "280000000043" => "lucianagenro",
            "280000000061" => "EduardoJorge43",
            "280000000021" => "levyfidelix",
            "280000000121" => "silva_marina",
            "280000000065" => "Everaldo_20",
            "210000000633" => "anaamelialemos",
            "210000000003" => "tarsogenro",
            "210000000083" => "redesartori",
            "250000001672" => "geraldoalckmin_",
            "190000001649" => "LFPezao"
        );
        
        if(array_key_exists($codigoCandidato, $candidatoTwitter)){
            return $candidatoTwitter[$codigoCandidato];
        }
        
       return false;
    }   
}