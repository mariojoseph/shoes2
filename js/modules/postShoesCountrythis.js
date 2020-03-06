class PostShoesCountry{

    constructor(){
        
        this.selectID = document.querySelector('#countryList');
        this.events();
    }

    events(){
        this.other = this.otherFunction();
    }

    otherFunction(){
        const x = "if we use this for the secondFunction it will work";
        // secondFunction(x);
    }
 
    // secondFunction(x){
    //     console.log(x);
    // }

}

export default PostShoesCountry;  

