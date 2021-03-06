import $ from 'jquery';

class PostShoes {
  constructor() {

    if(window.location.href.indexOf('/post-your-shoes') > -1){
      
      // Variable for Images
          this.uploadDialog;
      var _PREVIEW_URL =0  
  
      // Call to start events function
      this.events();
  
      self = this;
      console.log(self);

    }
  }

  events() {

    // IMAGE CONTROL EVENTS
    // 	IMAGE CONTROL EVENTS - Show Select File dialog
		    document.querySelector("#upload-dialog").addEventListener('click', this.uploadDialog);
    //   IMAGE CONTROL EVENTS - Selected File has changed
        document.querySelector("#fileInput").addEventListener('change', this.fileChange);
    //   IMAGE CONTROL EVENTS - Reset file input
        document.querySelector("#cancel-image").addEventListener('click', this.resetFile);

    $(".ShoesSubmit-note").on("click", this.createNote.bind(this));


  }

  // Image creation
  uploadDialog() {
    

    const uploadDialogBox = document.querySelector("#fileInput");

    if (uploadDialogBox.getAttribute('data-logged') == 'no') {
      
      const message = "You need to Log In / Sign In to Upload a Photo";
      const messageColor = "orange";
      const shoesMessage = document.querySelector('.shoesMessage');
      console.log(shoesMessage);
      // shoesMessage.textContent(message);
      shoesMessage.textContent = message;
      shoesMessage.style.backgroundColor = messageColor;
      shoesMessage.style.width = "80%";
      shoesMessage.style.margin = "auto";
      shoesMessage.style.marginTop = "1rem";
      shoesMessage.style.marginBottom = "4rem";
      shoesMessage.style.padding = "4px 3px";
      shoesMessage.style.borderRadius = "5px";
      shoesMessage.style.fontSize = "0.8rem";
      
      setTimeout(function(){ 
        window.location.href = "https://www.haveyouseenmyshoes.com/wp-login.php?redirect_to=post-your-shoes";
        // window.location.href = "http://localhost:3000/wp-login.php?redirect_to=post-your-shoes";
        ; }, 2000);

    } else{
      document.querySelector("#fileInput").click();
    }
 
   }
   

  fileChange() {
   
    // user selected file	
          var file = this.files[0];
    // var file = this.files[0];

    // AGAIN TRYING


    // allowed MIME types
    var mime_types = [ 'image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/tiff' ];
    
    // validate MIME
    if(mime_types.indexOf(file.type) == -1) {
      // alert('Error : Incorrect file type');
     
      self.readImageFile("Incorrect File Type. Only Image File Types accepted");
      return;
    }

    // validate file size
    if(file.size > 5*1200*1200) {
      // alert('Error : Exceeded size 5MB');
      self.readImageFile("Image too large please choose another one");
      return;
    }


    // validation is successful

    // hide upload dialog button
    document.querySelector("#upload-dialog").style.display = 'none';
    
    // set name of the file
    document.querySelector("#image-name").innerText = file.name;
    document.querySelector("#image-name").style.display = 'inline-block';

    // local url
    this._PREVIEW_URL = URL.createObjectURL(file);

    // console.log("value is " + this._PREVIEW_URL);
    // set src of image and show
    
    document.querySelector("#preview-image").setAttribute('src', this._PREVIEW_URL);
    document.querySelector("#preview-image").style.display = 'inline-block';

    
    // show cancel and upload buttons now
    document.querySelector("#cancel-image").style.display = 'inline-block';
    // document.querySelector("#upload-button").style.display = 'inline-block';
     
    // if image is too small
   

    // NOW
 
    var reader = new FileReader(); // CREATE AN NEW INSTANCE.
  
    var img = document.getElementById('preview-image');    
    reader.onload = function (e) {

      let width = img.naturalWidth;
      let height = img.naturalHeight;

      if(width < 400 || height < 400){
        self.readImageFile("Image too small please choose another one");
        console.log(`width is ${width} and height is ${height}`);
     
      }
    };
    reader.readAsDataURL(file);
    // console.log(reader);

    // END AGAIN TRYING
    // END NOW
    }
  

readImageFile(textToShow){

const message =  document.querySelector('.post-grid1-left-bottom-photo p');

message.textContent = textToShow;
message.style.color = 'red';
message.style.textAlign = 'center';

setTimeout(() =>{
  location.reload();
}, 1800);


}
  //  readImageFile(file){


  //   console.log('HALLO DUDE');
  //   // var reader = new FileReader(); // CREATE AN NEW INSTANCE.
  
  //   // reader.onload = function (e) {
  //   //     var img = new Image();      
  //   //     img.src = e.target.result;
  
  //   //     img.onload = function () {
  //   //         var w = this.width;
  //   //         var h = this.height;
  //   //     }
  //   // };
  //   // // reader.readAsDataURL(file);
  //   // console.log(reader);
  // };

   
   resetFile() {
    console.log('is this mikey');
     // destroy previous local url
    URL.revokeObjectURL(this._PREVIEW_URL);

    // show upload dialog button and hide image and cancel buttons
    document.querySelector("#upload-dialog").style.display = 'inline-block';
    document.querySelector("#image-name").style.display = 'none';
    document.querySelector("#cancel-image").style.display = 'none';
    // document.querySelector("#preview-image").style.display = 'none';

    // reset to no selection
    document.querySelector("#image-file").value = '';

    // hide elements that are not required
    // // document.querySelector("#image-name").style.display = 'none';
    // document.querySelector("#preview-image").style.display = 'none';
  
    // document.querySelector("#upload-button").style.display = 'none';
   
   }



  // Creation of Post Your Shoes Post

  createNote(e) {
 
    var postedby = $(e.target).attr('data-user');
 

  e.preventDefault();

    var ourNewPost = {
    'posted': postedby,
    'name': $(".name").val(),
    'address': $(".address").val(),
    'city': $(".city").val(),
    'country': $("#countrylist").val(),
    'commentary': $(".commentary").val(),
    'status': 'publish'

   
    // var ourNewPost = {
    //   'posted': $(".posted-by").val(),
    //   'name': $(".name").val(),
    //   'address': $(".address").val(),
    //   'city': $(".city").val(),
    //   'country': $("#countryList option:selected").val(),
    //   'commentary': $(".commentary").val(),
    //   'status': 'publish'

    
  }
 
  console.log($("#countrylist").val());

  const files = document.querySelector('#fileInput').files;

  if(files.length == 0){
      console.log('please upload an image');
      this.messageBank();
  } else{

    const formData = new FormData();

	for (let i = 0; i < files.length; i++) {
      let file = files[i];

      formData.append('files[]', file);
  }
  
    


     formData.append('posted',ourNewPost.posted);
    //  formData.append('postedBy',ourNewPost.postedBy);
     formData.append('name',ourNewPost.name);
     formData.append('address',ourNewPost.address);
     formData.append('city',ourNewPost.city);
     formData.append('country',ourNewPost.country);
     formData.append('commentary',ourNewPost.commentary);
     

  // formData.append('dummy', $(".postedBy"),val());

  // const files = document.querySelector('.post-grid1').files;
  // const formData = new FormData(files);


  $.ajax({
    beforeSend: (xhr) => {
      xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
    },
    url: shoeData.root_url + '/wp-json/shoes/v1/manageShoe',
 
    type: 'POST',
    data: formData,
    // extra Info

    cache: false,
    processData: false,
    contentType: false,

    // extra Info End
    success: (response) => {
        // $(".name, .shoePhoto").val('');
      // console.log(formData);
      console.log("Congrats");
      console.log(response);

  
    },
    error: (response) => {
      if(response.responseText == "You have reached your note limit.") {
        $(".note-limit-message").addClass("active");
      }
      console.log("Stevie");
      console.log(response);
    }
  });

  // Response from Shoe - Creation of Modal Fixed

  const shoesModal = document.querySelector('.post-shoes-modal');
  shoesModal.style.display = 'block';

  setTimeout(function(){
  shoesModal.style.display = 'none';

  }, 8000);

    
  }

    
 
}


messageBank(){
  const message = "You need to upload a photo";
  const shoesMessage = document.querySelector('.whenNoImage');
  shoesMessage.style.display = 'block'; 
  shoesMessage.textContent = message;
  shoesMessage.style.backgroundColor = 'red';
  shoesMessage.style.width = "80%";
  shoesMessage.style.margin = "auto";
  // shoesMessage.style.marginTop = "0.2rem";
  shoesMessage.style.marginBottom = "1rem";
  shoesMessage.style.padding = "4px 3px";
  shoesMessage.style.borderRadius = "5px";
  shoesMessage.style.fontSize = "0.8rem";
  shoesMessage.style.textAlign = "center";

  setTimeout(function(){
   shoesMessage.style.display = 'none'; 
   window.location.reload();
  }, 2000);
}


}


export default PostShoes;
