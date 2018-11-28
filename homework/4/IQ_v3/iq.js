$(document).ready( function() {
    
    var currentProblem = 0;
    var correctAnswer;
    var numCorrect = 0;
    var numSeconds = 0;
    var clockTimer;
    
    var question = new Array();
    var answer1 = new Array();	// These are the correct answers
    var answer2 = new Array();
    var answer3 = new Array();
    var answer4 = new Array();
    var graphic = new Array();
    var used = new Array();
    
    question[0] = "How many legs do 2 ducks and 4 dogs have?";
    answer1[0] = "20";
    answer2[0] = "6";
    answer3[0] = "8";
    answer4[0] = "12";
    used[0] = false;
    graphic[0] = "blank.gif";
    		
    question[1] = "There are 12 pens on the table, you took 3, how many do you have?";
    answer1[1] = "3";
    answer2[1] = "9";
    answer3[1] = "15";
    answer4[1] = "6";
    used[1] = false;
    graphic[1] = "blank.gif";
    
    question[2] = "What goes around the world but stays in a corner?";
    answer1[2] = "a stamp";
    answer2[2] = "an airplane";
    answer3[2] = "a virus";
    answer4[2] = "a cobweb";
    used[2] = false;
    graphic[2] = "blank.gif";
    
    question[3] = "Which number should come next in the series? 1, 1, 2, 3, 5, 8, 13, ___";
    answer1[3] = "21";
    answer2[3] = "24";
    answer3[3] = "32";
    answer4[3] = "36";
    used[3] = false;
    graphic[3] = "blank.gif";
    
    question[4] = "If all Bloops are Razzies and all Razzies are Lazzies, then...";
    answer1[4] = "Bloops are always Lazzies";
    answer2[4] = "Bloops are sometimes Lazzies";
    answer3[4] = "Bloops are never Lazzies";
    answer4[4] = "Lazzies are always Bloops";
    used[4] = false;
    graphic[4] = "blank.gif";
    
    question[5] = "Ralph likes 25 but not 24; he likes 400 but not 300; he likes 144 but not 145. Which does he like:";
    answer1[5] = "81";
    answer2[5] = "72";
    answer3[5] = "60";
    answer4[5] = "120";
    used[5] = false;
    graphic[5] = "blank.gif";
    
    question[6] = "How many triangles are in the diagram below?";
    answer1[6] = "27";
    answer2[6] = "16";
    answer3[6] = "17";
    answer4[6] = "32";
    graphic[6] = "triangles.gif";
    used[6] = false;
    
    question[7] = "How many different-sized squares can be created where each corner is on a dot?";
    answer1[7] = "5";
    answer2[7] = "4";
    answer3[7] = "3";
    answer4[7] = "2";
    graphic[7] = "squares.jpg";
    used[7] = false;
    
    question[8] = "I'm a male. If Albert's son is my son's father, what is the relationship between Albert and I?";
    answer1[8] = "Albert is my father";
    answer2[8] = "Albert is my brother";
    answer3[8] = "Albert is my uncle";
    answer4[8] = "Albert is not related to me";
    used[8] = false;
    graphic[8] = "blank.gif";
    
    question[9] = "A ladder from a boat has 10 steps each 1 foot apart.  Four of the steps are underwater.  If a storm causes the water to rise 2 feet, how many steps will be underwater?";
    answer1[9] = "4";
    answer2[9] = "2";
    answer3[9] = "6";
    answer4[9] = "8";
    used[9] = false;
    graphic[9] = "blank.gif";
    			
    $("#start").on("click", function() {
        $("#introScreen").css("display", "none");
        clockTimer = window.setInterval(updateClock, 1000);
        newProblem();
    });
    
    
    $("#answer1").on("click", function() {
        if($("#answer1").text()==correctAnswer)
            numCorrect++;
        newProblem();
    });
    $("#answer2").on("click", function() {
        if($("#answer2").text()==correctAnswer)
            numCorrect++;
        newProblem();
    });
    $("#answer3").on("click", function() {
        if($("#answer3").text()==correctAnswer)
            numCorrect++;
        newProblem();
    });
    $("#answer4").on("click", function() {
        if($("#answer4").text()==correctAnswer)
            numCorrect++;
        newProblem();
    });
    
    function updateClock() {
        numSeconds++;
    }
    
    function newProblem() {
        if(currentProblem == 10) {
            if(numCorrect > 6)
                $("#testScreen").html("<h1>You are a Genius</h1>");
            else if(numCorrect > 4)
                $("#testScreen").html("<h1>Quite smart I would say</h1>");
            else
                $("#testScreen").html("<h1>Are you awake today?</h1>");
                
            $("#testScreen").append("You got " + numCorrect + " correct!");
            $("#testScreen").append("<br><br>You took " + numSeconds + " seconds.");
            clearInterval(clockTimer);
        }
        else {
            currentProblem++;
            
            var rp;
            do {
                rp = Math.floor(Math.random()*10);
            } while(used[rp]);
            used[rp] = true;
            
            $("#graphic").attr("src", graphic[rp]);
            $("#question").html(currentProblem + '. ' + question[rp]);
            correctAnswer = answer1[rp];
            
            var r1, r2, r3, r4;
            
            r1 = Math.floor(Math.random()*4)+1;
            do {
                r2 = Math.floor(Math.random()*4)+1;
            } while (r2==r1);
            
            do {
                r3= Math.floor(Math.random()*4)+1;
            } while (r3==r1 || r3==r2);
            
            r4 = 10 -(r1+r2+r3);
            
            $("#answer" + r1).html(answer1[rp]);
            $("#answer" + r2).html(answer2[rp]);
            $("#answer" + r3).html(answer3[rp]);
            $("#answer" + r4).html(answer4[rp]);
        }
       
    }
    
    
});