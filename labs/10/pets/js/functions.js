$(document).ready(function() {
    var nameArray = new Array("alex", "bear", "carl", "charlie", "lion",
                              "otter", "sally", "samantha", "ted", "tiger");
    function createCarousel() {
        $.each(nameArray, function (index, value) {
            if(index == 0)
                $(".carousel-inner").append("<div class='carousel-item active'> <img class='carouselIMG' src='img/" + value + ".jpg' alt = '" + value + "'> </div>");
            else
                $(".carousel-inner").append("<div class='carousel-item'> <img class='carouselIMG' src='img/" + value + ".jpg' alt = '" + value + "'> </div>");
        });
        
    }
    
    if(window.location.href.indexOf("index") > -1)
        createCarousel();
    
    function setModal(data, name) {
        console.log(data);
        $("h5").html(name);
        $("#petIMG").attr("src", data['img']);
        $("#petIMG").attr("alt", name);
        $("#mainText").html("Age: " + data['age'] +
                            "<br><br>Breed: " + data['breed'] +
                            "<br><br>" + data['desc']);
        $('#loadingIMG').hide();
    }
    
        
    $(".nameLink").on("click" , function(e) {
        e.preventDefault();
        $('#loadingIMG').show();
        var nameText = $(this).text();
        $.ajax({
                type: "GET",
                url: "pets.php",
                dataType: "json",
                
                data: {
                        "name": nameText
                },
                  
                success: function(data,status) {
                    setModal(data, nameText);
                }
        });
        
    });
    
    $(".adoptButton").on("click" , function() {
        var thisID = $(this).attr("id");
        $('#loadingIMG').show();
        $.ajax({
                type: "GET",
                url: "pets.php",
                dataType: "json",
                
                data: {
                        "name": thisID
                },
                  
                success: function(data,status) {
                   setModal(data, thisID);
                }
        });
        
    });
    

    
    
    
});