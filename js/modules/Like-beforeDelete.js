import $ from 'jquery';

class Like {
  constructor() {
    this.events();
  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {
    var currentLikeBox = $(e.target).closest(".like-box");

    if (currentLikeBox.attr('data-exists') == 'yes') {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
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

  // createLike(currentLikeBox) {

  //   console.log("test beg");
  //   alert(currentLikeBox.data('professor'));
  //   console.log(currentLikeBox.data('professor'));
  //   console.log("test end");

  //   $.ajax({
  //     // beforeSend: (xhr) => {
  //     //   xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
  //     // },
  //     url: shoeData.root_url + '/wp-json/shoe/v1/manageLike',
  //     type: 'POST',
  //     data: {'professorId': currentLikeBox.data('professor')},
  //     success: (response) => {
  //       currentLikeBox.attr('data-exists', 'yes');
  //       var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
  //       likeCount++;
  //       currentLikeBox.find(".like-count").html(likeCount);
  //       currentLikeBox.attr("data-like", response);
  //       alert("stevie pass");
  //       console.log(response);
  //     },
  //     error: (response) => {
  //       alert("stevie fail");
  //       console.log(response);
  //     }
  //   });
  // }

  deleteLike(currentLikeBox) {

    var $like = {
      'like': currentLikeBox.attr('data-like')
      
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
