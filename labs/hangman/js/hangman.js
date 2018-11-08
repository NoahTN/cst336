var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = ["snake", "monkey", "beetle"];

window.onload = startGame();

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
}

function initBoard() {
    for(var letter in selectedWord) {
            board.push("_");
    }
}

function updateBoard() {
    for(var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt];
}

