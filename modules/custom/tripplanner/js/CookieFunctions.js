// JScript File
function LoadCookiesArray() {
   
        var customarray = getArray('startAddressCookie')
        var customarray2 = getArray('destinationAddressCookie')
    }


    var cookieArrayStart = getArray('startAddressCookie')
    var cookieArrayEnd = getArray('destinationAddressCookie')
    
    
    
    
    function getArray(cookieName) {
         var cookieStr = getCookie(cookieName); 
        if (cookieStr != "")
        {
            var cookieArray = cookieStr.split('||');
            var cookieArray_addressSeperated = new Array();
            for (var i = 0; i < cookieArray.length; i++) {
                //Before pipe is address only, after pipe is lat$lon$address
                cookieArray_addressSeperated[i] = unescape(cookieArray[i]).split('$')[2] + "|" + unescape(cookieArray[i]);
            }
            return cookieArray_addressSeperated;
        }
        else
        {
            return cookieStr
        }
    }


    function setCookie(c_name, cookieArray, expiredays) {
        //cookieArray.join('||'), joins array elements into string with || as seperator
        var exdate=new Date();exdate.setDate(exdate.getDate()+expiredays);
        document.cookie = c_name + "=" + escape(cookieArray.join('||')) +
        ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString()) + ";path=/";

    }


    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
           c_start=document.cookie.indexOf(c_name + "=");
           if (c_start!=-1)
            { 
            c_start=c_start + c_name.length+1; 
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
            } 
        }
        return "";
    } 
        
            
    function setMyCookie(newCookie, txtInput)
    {//debugger;
        var cookieName;
        if (txtInput == "txtOriginInput")
        {
            cookieName = "startAddressCookie";
        }
        else if (txtInput == "txtDestinationInput")
        {
            cookieName = "destinationAddressCookie";
        }
        
        var cookieStr= getCookie(cookieName);
        var cookieArray = cookieStr.split('||');           
        
        // to trim the starting and trailing white spaces
        newCookie = newCookie.replace(/^\cookieStr+|\cookieStr+$/g, '');

        //new cokie value is null do not do anything
        if (newCookie != "")
        {
            newCookie = escape(newCookie)
            //if existing cookieStr is not null 
            if (cookieStr != "") {
                var index = -1 ;
                for (var i = 0; i < cookieArray.length; i++) {
                    if (cookieArray[i] == newCookie) {
                        index = i;
                        break;
                    }
                }
                //If the cookie exists then remove it from the list as it will be added on the top.
                if (index != -1) {
                    cookieArray.splice(index, 1);
                }
            }
             //if existing cookie sting is null then create a new array, and add new cookie to it
            else
            {
                var cookieArray = new Array();
            }
            
            //adds new elements to the beginning of an array, and returns the new length. This method changes the length of an array!
            cookieArray.unshift(newCookie);
            if(cookieArray.length > 10 )
            {
               cookieArray.pop(); 
            }
            setCookie(cookieName,cookieArray,365);
        }
    }
                                                                           
  
               
           