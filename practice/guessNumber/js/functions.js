            var randomNumber = Math.floor(Math.random()*99) + 1;
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            
            
            var winCount = 0;
            var lossCount = 0;
            $("#score").html("Wins: " + winCount + " Losses: " + lossCount);
        
             
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            guessField.focus();
            resetButton.style.display = 'none';
            
            function checkGuess() {
                var userGuess = Number(guessField.value);
                if (guessCount === 1 ) {
                    $("#guesses").html('Previous guesses');
                }
                if(!isNaN(userGuess))
                    $("#guesses").append(' ' + userGuess + ' ');
                
                if(userGuess === randomNumber) {
                    $("#lastResult").html('Congratulations! You got it right!');
                    lastResult.style.backgroundColor = 'green';
                    lowOrHi.innerHTML = '';
                    winCount++;
                   
                    setGameOver();
                }
                else if(guessCount === 7) {
                    $("#lastResult").html('Sorry, you lost!');
                    lossCount++;
                    
                    setGameOver();
                }
                else if (userGuess > 99 || isNaN(userGuess)) {
                    $("#lastResult").html("Error, invalid input!");
                    lastResult.style.backgroundColor = 'red';
                    $("#lowOrHi").html("");
                }
                else {
                    $("#lastResult").html('Wrong!');
                    lastResult.style.backgroundColor = 'red';
                    if(userGuess < randomNumber) {
                        $("#lowOrHi").html('Last guess was too low!');
                    }
                    else {
                        $("#lowOrHi").html("Last guess was too high!");
                    }
                    guessCount++;
                    guessField.value = '';
                    guessField.focus();
                }
            }
            
            guessSubmit.addEventListener('click', checkGuess);
            
            function setGameOver() {
                $("#score").html("Wins: " + winCount + " Losses: " + lossCount);
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = "inline";
                resetButton.addEventListener('click', resetGame);
                
            }
            
            function resetGame() {
                guessCount = 1;
                var resetParas = document.querySelectorAll('.resultParas p');
                for(var i = 0; i < resetParas.length; i++) {
                    resetParas[i].textContent = "";
                }
                
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                $("#score").html("Wins: " + winCount + " Losses: " + lossCount);
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor(Math.random()*99) +1
            }