 <script>





printJson();

function printJson(){
 var data = getUrlVars();
console.log(data)
//decode uri to normal character
data =  decodeURI(data);
//for special character , / ? : @ & = + $ #
data =  decodeURIComponent(data);
//remove  " ' " at first and last in string before parse string to JSON
data = data.slice(1,-1);
data = JSON.parse(data);
alert(JSON.stringify(data));

}

//read get variable form url
//credit http://papermashup.com/read-url-get-variables-withjavascript/
function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}


</script>