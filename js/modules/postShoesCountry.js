class PostShoesCountry{

    constructor(){
        
        this.events();
    }

    events(){
        this.results = this.obtainJSONFile();

    }

    obtainJSONFile(){

        const xhrCountry = new XMLHttpRequest();
        xhrCountry.open('GET', "../wp-content/themes/have-you-seen-my-shoes2/json/country.json");
        xhrCountry.onload = function(){

            var ourData = JSON.parse(xhrCountry.responseText);
            
            this.selectID = document.querySelector('#countryList');

            for(var i=0; i<ourData.length; i++){
                var country = ourData[i].name;
                
                var option = document.createElement('option');
                option.setAttribute('value', country);
                option.appendChild(document.createTextNode(country));
                this.selectID.appendChild(option);      
            }
 
 
        };

        xhrCountry.send();
    }


}

export default PostShoesCountry;  