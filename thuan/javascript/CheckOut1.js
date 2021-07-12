var checkOut = new Vue({
el:'#mainCheckOut',
data:
{
	address:"",
	phone :"",
	recipient : "",
	note  : ""
},
watch:
{
	phone : function()
	{
		if(  parseInt(this.phone).toString().length != this.phone.length && this.phone!="" )
		{
			
			alert('Ban Phai Nhap Vao So');
			this.phone="";
			
			
		}
		console.log('a   '+parseInt(this.phone).toString().length )
		console.log('b ' +this.phone.length)
	}
}	
		


});