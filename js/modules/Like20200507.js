import $ from 'jquery';

class Like {
  constructor() {
    this.likeResponse = $(".like-response"); 
    this.events();
  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {
    var currentLikeBox = $(e.target).closest(".like-box");
    var heart = $(e.target);

    console.log("testing beginning");

    console.log(currentLikeBox.attr('data-exists'));
    console.log(currentLikeBox.attr('data-posted'));


    console.log("testing end");

    // Week and Year Declaration

    if (currentLikeBox.attr('data-logged') == 'no') {

      this.likeResponse.html("You need to Log In / Sign In to Vote");
      this.likeResponse.css('color', 'yellow');
      this.likeResponse.css('background-color', 'gray');
      this.likeResponse.css('width', '80%');
      this.likeResponse.css('margin', 'auto');
      this.likeResponse.css('margin-top', '1rem');
      this.likeResponse.css('margin-bottom', '4rem');
      this.likeResponse.css('padding', '4px 3px');
      this.likeResponse.css('border-radius', '5px');


      setTimeout(function(){ 
        window.location.href = "http://localhost:3000/wp-login.php";
        ; }, 2000);


      return null;
    } else {

      if (currentLikeBox.attr('data-exists') == 'yes') {
        this.likeResponse.html("You have deleted your vote. You can now vote again");
        this.likeResponse.css('color', 'green');
        heart.removeClass('fa-heart');
        heart.addClass('fa-heart-o');
        heart.css('visibility', 'visible');
        heart.css('opacity', 1 );
        this.deleteLike(currentLikeBox);

        setTimeout(function(){ 
          location.reload();
          ; }, 2000);

  
      } else {
        if(currentLikeBox.attr('data-posted') == 'yes'){
          this.likeResponse.html("Sorry you have already voted this week, if you wish to vote, please delete your previous LIKE");
          this.likeResponse.css('color', 'red');
          return null;
        } else{

          this.likeResponse.html("Thank You for Voting");
          this.likeResponse.css('color', 'yellow');
          heart.removeClass('fa-heart-o');
          heart.addClass('fa-heart');
          heart.css('visibility', 'visible');
          heart.css('opacity', 1 );
          this.createLike(currentLikeBox);
  
          setTimeout(function(){ 
            location.reload();
            ; }, 2000);

        }

      }

    }


  }


  createLike(currentLikeBox) {


    //  const $professorId = currentLikeBox.data('professor');   

    var $shoeId = {
      'shoeId': currentLikeBox.data('shoe'),
      'userId': currentLikeBox.data('user'),
      'dateId': currentLikeBox.data('date'),
      'weekId': currentLikeBox.data('week'),
      'yearId': currentLikeBox.data('year'),
      'status': 'publish'
    }

    //  alert(currentLikeBox.data('professor'));

      $.ajax({
        beforeSend: (xhr) => {
          xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
        },
        url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',

        type: 'POST',
        data: $shoeId,
        // extra Info

        // cache: false,
        // processData: false,
        // contentType: false,

        // extra Info End
        success: (response) => {
          currentLikeBox.attr('data-exists', 'yes');
          var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
          likeCount++;
          currentLikeBox.find(".like-count").html(likeCount);
          currentLikeBox.attr("data-like", response);
          alert("stevie pass");
          console.log(response);
        },
        error: (response) => {
          if(response.responseText == "You have reached your note limit.") {
            $(".note-limit-message").addClass("active");
          }
          console.log(response);
        }
      });
      // location.reload();
  }


  deleteLike(currentLikeBox) {

    var $like = {
      'like': currentLikeBox.attr('data-like'),
      'shoeId': currentLikeBox.data('shoe'),
      'status': 'publish'
    }


    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
      },
      url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',
      data: $like,
      type: 'DELETE',
      success: (response) => {
        currentLikeBox.attr('data-exists', 'no');
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount--;
        currentLikeBox.find(".like-count").html(likeCount);
        currentLikeBox.attr("data-like", '');
        console.log(response);
      },
      error: (response) => {
        console.log(response);
      }
    });
    // location.reload();
  }
}

export default Like;
