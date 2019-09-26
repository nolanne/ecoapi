let ecoapi = {
    'getPays' : function( urlData, apiKey, userfunction )
    {
        let doAjax = new XMLHttpRequest();
        let urlVar = 'request=' + urlData + '&apikey=' + apiKey ;
        //let urlVar = '/' + urlData + '/' + apiKey ;
        doAjax.open( 'GET', 'http://127.0.0.1:8080/ecoapi/API/index.php?' + urlVar, true );

        doAjax.onreadystatechange = function()
        {
            if( doAjax.readyState == 4 && doAjax.status == 200 )
            {
                let respJson = JSON.parse( doAjax.responseText );
                
                userfunction(respJson);
            }
        }

        doAjax.send();
    }
};