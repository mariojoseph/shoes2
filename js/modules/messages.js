import $ from 'jquery';

class Messages {

  constructor() {
    // this.ShoesSubmitNote = document.querySelector('.ShoesSubmit-note');
      // this.modal = document.querySelector('.post-shoes-modal')dermo
  
      // this.imgMain = document.querySelector('.ShoesMain-img');
      // this.opacity = 0.6;
      // this.tempPlace = document.querySelector('.temp');
 
      // this.link = null;
      this.events();
 
  }

  events() {

    // this.ShoesSubmitNote.addEventListener('click', ()=>{

    //    alert('click button is working'); 
    // });

  //   if(document.URL === 'https://www.haveyouseenmyshoes.com/' || document.URL === 'http://localhost:3000/' ){

  //   // Image Click

  //   this.imgs = document.querySelectorAll('.imgs img');

  //   this.imgs.forEach((img) => {

  //     img.addEventListener('click', this.imgClick.bind(this));

  //   });

  //   // Closing Image
  //   this.closeImage = document.querySelector('.close');
  //   this.closeImage.addEventListener('click', this.closingImage.bind(this));
      
 
  //   // More Info Click
  //   this.moreInfoClick = document.querySelector('.image-button');
  //   this.moreInfoClick.addEventListener('click', this.moreInfo.bind(this));
  // }  

  }

  imgClick(e) {
    
    // // Modaly Set Up
    // this.modal.style.position = 'fixed';
    // this.modal.style.display = 'block';
    // this.modal.style.zIndex = '5';
    // this.modal.style.left = '0';
    // this.modal.style.top = '0';
    // this.modal.style.right = '0';
    // this.modal.style.height = '100%';
    // this.modal.style.width = '100%';
    // this.modal.style.backgroundColor = 'rgba(0,0,0,0.7)';

    
    // // // Something Else
    // // this.imgs[0].style.opacity = this.opacity;
    // // // TESTING BEGINNING
    // // var mario = this.imgTotal.getBoundingClientRect();
    // this.link = e.target.getAttribute('longdesc');
    // // let left = mario.left;
    // // let right = mario.right;
    // // let top = mario.top;
    // // this.thumbnails.style.position = 'relative';
    // this.imgMain.style.position = 'absolute';
    // this.imgMain.style.display = 'block';
    // this.imgMain.style.top = '30%';
    // this.imgMain.style.marginLeft = '15%';
    // this.imgMain.style.width = '70%';
    // this.imgMain.style.zIndex = '8';
   

    // // TESTING END

    // // Reset the opacity
    // this.imgs.forEach(img => (img.style.opacity = 1));

    // // Change current timage to src of clicked image
    // this.current.src = e.target.src;

    // // Add fade in class

    // this.current.classList.add('fade-in');

    // // Remove fade-in class after .5 seconds)
    // setTimeout(() => this.current.classList.remove('fade-in'), 500);

    // // Change the opacity to opacity var 
    // e.target.style.opacity = this.opacity;

  }

  closingImage(){
    // this.imgMain.style.display = 'none';
    // this.modal.style.display = 'none';
  }

  moreInfo(){


   
    // window.open(this.link,"_self - URL");
   
    // console.log(this.parentElement.parentElement);

    // window.open(this.link, "_self");

  }

}

export default Messages;


