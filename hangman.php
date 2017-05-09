<?php
    session_start();

    class Hangman{
        private $word_status;
        public $game_status;
        private $correct_word;
        private $tries_left;
        private $curr_alphabet; 
        private $score = 0;
        
        private function updateAlphabet($guessed_letter){
            if (strstr($this->curr_alphabet, $guessed_letter)){
                $this->curr_alphabet = str_replace($guessed_letter, '-', $this->curr_alphabet );   
            }
        }
        private function pickRandWrd(){
            $file_handle = fopen('words.txt', 'r');
            $file_content = '';
            while(!feof($file_handle)){ 
                $file_content .= fgets($file_handle);
            }//$file_content = fread($file_handle);
            $words = explode(' ', $file_content);
            $rand_index = rand(0,count($words) - 1);
            $this->correct_word = strtoupper($words[$rand_index]);
            fclose($file_handle);
            return;
        }
        private function updateStatus($guessed_letter){
            //$pos = strpos($this->correct_word, $guessed_letter);
            //$this->word_status[$pos] = $guessed_letter;
            for($x = 0; $x < strlen($this->correct_word); $x++){
                if($this->correct_word[$x] == $guessed_letter){
                    $this->word_status[$x] = $guessed_letter;
                }
            }
        }
        public function checkWord($guessed_letter){
            $this->updateAlphabet($guessed_letter);
            if(strstr($this->correct_word, $guessed_letter)){
                $this->updateStatus($guessed_letter);
                if($this->word_status == $this->correct_word){
                    $this->game_status = 'done';
                    $this->score++;
                }
            }else{
                $this->tries_left--;
                if ($this->tries_left <= 0){
                    $this->game_status = 'failed';
                }
            }
        }
        public function startNewGame(){
            $this->pickRandWrd();
            $this->tries_left = strlen($this->correct_word) + 1;
            $this->curr_alphabet = 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
            $array = [];
            for($x = 0; $x < strlen($this->correct_word); $x++ ){$array[] = '-';}
            $this->word_status = implode($array);
            $this->game_status = 'ongoing';
        }
        public function getTriesLeft(){
            return $this->tries_left;
        }
        public function getCurrAlp(){
            return $this->curr_alphabet;
        }
        public function getWordStatus(){
            return $this->word_status;
        }  
        public function getCorrectWord(){
            return $this->correct_word;
        }
        public function getScore(){
            return $this->score;
        }
    }
    if ($_POST){
        if (!empty($_POST['clear'])){
            $_SESSION['player'] = new Hangman();
            $_SESSION['player']->startNewGame();
        }
    }
    if  (!$_SESSION['player']){
        $_SESSION['player'] = new Hangman();
        $_SESSION['player']->startNewGame();
    }
    if(!empty($_POST['guessed_letter'])){
        $_SESSION['player']->checkWord(strtoupper($_POST['guessed_letter']));
        //echo $_POST['guessed_letter'];
        //echo $_SESSION['player']->getCorrectWord();
    }
    
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <?php
                echo "<h3>I'm looking for a " . strlen($_SESSION['player']->getCorrectWord()). ' letter word</h3><hr>';
                echo '<h4>Progress: ' . $_SESSION['player']->getWordStatus() . '</h4>';
                echo '<h4>Letter Set: ' . $_SESSION['player']->getCurrAlp() . '</h4>';
                echo '<h4>Tries Left: ' . $_SESSION['player']->getTriesLeft() . '</h4>';
                echo '<h4>Status: ' . $_SESSION['player']->game_status . '</h4>';
                echo '<h4>Player Total Score: ' . $_SESSION['player']->getScore() . '</h4>';
                if ($_SESSION['player']->game_status == 'done'){
                    echo '<hr><h3>Congratulations</h3>';
                    echo '<h4>New Total Score' . $_SESSION['player']->getScore() . '</h4>';
                    $_SESSION['player']->startNewGame();
                    echo '<h4><hr>New Game<h4>';
                }else if ($_SESSION['player']->game_status == 'failed'){
                    echo '<hr><h3>Sorry you failed!!<br>Correct Word = ' . $_SESSION['player']->getCorrectWord() .'<br>Try again!!</h3><br>';
                    $_SESSION['player']->startNewGame();
                }
            ?>
            <h3>Enter guess<hr></h3>
            <form method="post">
                <p><input class="form-control" type="text" maxlength="1" name="guessed_letter" required/></p>
                <p><label>Clear History: </label><input type="checkbox" name="clear"></p>
                <p><input class="btn" type="submit"></p>
            </form>
        </div>
    </body>
</html>