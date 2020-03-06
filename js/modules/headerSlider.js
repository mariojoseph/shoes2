import $ from 'jquery';

class HeaderSlider{

constructor(){
  this.menu = document.querySelector('.site-header__menu');
  this.openButton = document.querySelector('.site-header__menu-trigger');
  var toggleType= true;
  this.events();
}

events() {

  this.openButton.addEventListener('click', this.openSlide.bind(this));
 
  }

openSlide(e){



  if(this.toggleType === true){
    this.menu.classList.toggle('site-header__menu--active', true);
    this.openButton.classList.toggle("fa-bars", false);
    this.openButton.classList.toggle("fa-window-close", true);
    this.toggleType = false;
  } else{
    this.menu.classList.toggle('site-header__menu--active', false);
    this.openButton.classList.toggle("fa-bars", true);
    this.openButton.classList.toggle("fa-window-close", false);
    this.toggleType = true;
  }


}

}




export default HeaderSlider;


