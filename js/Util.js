gp.Util={DoLogin:function(){var strID=document.getElementById("txtUserID");var strPW=document.getElementById("txtPassWD");var strRSA=document.getElementById("RSA");e="D93B9655A817FADCC58262BDB222291C07C61E456526C67F2012D5316CAF389831AAD9A68F7B930C17EBCF55DC6792FBD731C9016AA9789BDA4896515F409D5B42246A591E040550E6A60ED4A7E5B1DBB665472455E2A95C3B71F8B7E52CBEDD1DB1194163E0F1126C31B6C671E691C6ED9FFAAAE0E45C4AE1F0F8D78382EAE3";n="10001";try{var objRSA=new RSAKey();objRSA.setPublic(e,n);var strData=(escape(strID.value)+"|#|"+strPW.value);var response=objRSA.encrypt(strData);if(response){strRSA.value=this.StringToHex(hex2b64(response));return true}else{return false}}catch(e){return false}finally{strID.value="";strPW.value=""}},IsDaylight:function(req){var rightNow=new Date();var jan1=new Date(rightNow.getFullYear(),0,1,0,0,0,0);var temp=jan1.toGMTString();var jan2=new Date(temp.substring(0,temp.lastIndexOf(" ")-1));var std_time_offset=(jan1-jan2)/(1000*60*60);var june1=new Date(rightNow.getFullYear(),6,1,0,0,0,0);temp=june1.toGMTString();var june2=new Date(temp.substring(0,temp.lastIndexOf(" ")-1));var daylight_time_offset=(june1-june2)/(1000*60*60);var dst;if(std_time_offset==daylight_time_offset){dst=false}else{dst=true}return dst},StringToHex:function(str){var hex="";for(var i=0;i<str.length;i++){hex+=""+str.charCodeAt(i).toString(16)}return hex},IsLogin:function(){var rtn=false;var ckLogin=this.GetCookie("WZ_GLOBAL_SECURE");if(ckLogin==""||ckLogin=="undefined"||ckLogin==null){rtn=false}else{rtn=true}return rtn},SetCookie:function(name,value,ExpireDate){var todayDate=new Date();todayDate.setDate(todayDate.getDate()+ExpireDate);document.cookie=name+"="+escape(value)+"; path=/;domain="+gp.strTopDomain+";expires="+todayDate.toGMTString()+";"},GetCookie:function(sName){var aRec;var aCook=document.cookie.split("; ");for(var i=0;i<aCook.length;i++){aRec=aCook[i].split("=");if(sName.toLowerCase()==unescape(aRec[0].toLowerCase())){return this.GetRealContent(aRec)}}return""},DeleteCookie:function(name){var expireDate=new Date();expireDate.setUTCDate(expireDate.getUTCDate()-2);document.cookie=name+"="+escape(name)+"; path=/; expires="+expireDate.toGMTString()+";"},GetRealContent:function(aRec){if(aRec.length>2){var strContents=aRec[1];for(var i=2;i<aRec.length;i++){strContents=strContents+"="+aRec[i]}return strContents}return aRec[1]},GetBrowser:function(){var strUA,strBName,intI;strUA=window.navigator.userAgent.toLowerCase();this.isIE=false;this.isFF=false;this.isNS=false;this.isOP=false;this.isSF=false;this.isCR=false;this.version=null;strBName="msie";if((intI=strUA.indexOf(strBName))>=0){this.isIE=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="trident";if((intI=strUA.indexOf(strBName))>=0){this.isIE=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="firefox/";if((intI=strUA.indexOf(strBName))>=0){this.isFF=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="minfefiled/";if((intI=strUA.indexOf(strBName))>=0){this.isFF=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="namoroka/";if((intI=strUA.indexOf(strBName))>=0){this.isFF=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="netscape/";if((intI=strUA.indexOf(strBName))>=0){this.isNS=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="opera/";if((intI=strUA.indexOf(strBName))>=0){this.isOP=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="safari/";if((intI=strUA.indexOf(strBName))>=0){this.isSF=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}strBName="chrome/";if((intI=strUA.indexOf(strBName))>=0){this.isCR=true;this.version=parseFloat(strUA.substr(intI+strBName.length));return}},ZeroPad:function(number,length){var str=""+number;while(str.length<length){str="0"+str}return str}};function setIframe(type){var targeturl="";switch(type){case"Login":targeturl="https://gp-local-login.webzen.com/home/loginpopup/";break;case"SC":targeturl="http://gp-local-cs.webzen.com/faq/tmpFrame/Sc";break;default:targeturl="http://gp-local-cs.webzen.com/faq/tmpFrame/Etc";break}$("<iframe />",{name:"tmpframe",id:"tmpframe",src:targeturl}).appendTo("body")}var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(input){var output="";var chr1,chr2,chr3,enc1,enc2,enc3,enc4;var i=0;input=Base64._utf8_encode(input);while(i<input.length){chr1=input.charCodeAt(i++);chr2=input.charCodeAt(i++);chr3=input.charCodeAt(i++);enc1=chr1>>2;enc2=((chr1&3)<<4)|(chr2>>4);enc3=((chr2&15)<<2)|(chr3>>6);enc4=chr3&63;if(isNaN(chr2)){enc3=enc4=64}else{if(isNaN(chr3)){enc4=64}}output=output+this._keyStr.charAt(enc1)+this._keyStr.charAt(enc2)+this._keyStr.charAt(enc3)+this._keyStr.charAt(enc4)}return output},decode:function(input){var output="";var chr1,chr2,chr3;var enc1,enc2,enc3,enc4;var i=0;input=input.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(i<input.length){enc1=this._keyStr.indexOf(input.charAt(i++));enc2=this._keyStr.indexOf(input.charAt(i++));enc3=this._keyStr.indexOf(input.charAt(i++));enc4=this._keyStr.indexOf(input.charAt(i++));chr1=(enc1<<2)|(enc2>>4);chr2=((enc2&15)<<4)|(enc3>>2);chr3=((enc3&3)<<6)|enc4;output=output+String.fromCharCode(chr1);if(enc3!=64){output=output+String.fromCharCode(chr2)}if(enc4!=64){output=output+String.fromCharCode(chr3)}}output=Base64._utf8_decode(output);return output},_utf8_encode:function(string){string=string.replace(/\r\n/g,"\n");var utftext="";for(var n=0;n<string.length;n++){var c=string.charCodeAt(n);if(c<128){utftext+=String.fromCharCode(c)}else{if((c>127)&&(c<2048)){utftext+=String.fromCharCode((c>>6)|192);utftext+=String.fromCharCode((c&63)|128)}else{utftext+=String.fromCharCode((c>>12)|224);utftext+=String.fromCharCode(((c>>6)&63)|128);utftext+=String.fromCharCode((c&63)|128)}}}return utftext},_utf8_decode:function(utftext){var string="";var i=0;var c=c1=c2=0;while(i<utftext.length){c=utftext.charCodeAt(i);if(c<128){string+=String.fromCharCode(c);i++}else{if((c>191)&&(c<224)){c2=utftext.charCodeAt(i+1);string+=String.fromCharCode(((c&31)<<6)|(c2&63));i+=2}else{c2=utftext.charCodeAt(i+1);c3=utftext.charCodeAt(i+2);string+=String.fromCharCode(((c&15)<<12)|((c2&63)<<6)|(c3&63));i+=3}}}return string}};