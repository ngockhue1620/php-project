Vue.component('cart-item',{

   

	props:['price','count'],
	
	 template:` 

	 <div>	

	  <button @click="count--" onclick="get_quantity()">-</button> <button  class="soluong">{{count}}</button> <button  @click="count++" onclick="get_quantity()">+</button>
	  gia ca:<button>{{price*count | convertNum }}</button> 
	  <input type="hidden"  :value="count*price" class="price_item">
	</div>	 
	 `,
	 watch:
        {
        	count: function()
        	{
        		if(this.count<0)
        		{
        			this.count=0;
        		}


        	}
        },
	 filters :{
        convertNum :function (sotien)
        {
            return sotien.toFixed(2).replace(/\d(?=(\d{3})+\.)/g,'$&,');
        }
        ,

    }

});

new Vue({
	el: '#cart_',
	component : [

		'cart-item'
	],
	data:
	{
		sanpham : [],
		newSanPham : '',
	},method:
	{

	}

})

function update_cart()
{
	document.getElementById("updateCart").click();
	console.log("ok");
}

function get_quantity()
{
	
	
	var tinhtien = document.getElementsByClassName("price_item")
	var tongtien =0;
	for(let i=0;i<tinhtien.length;i++)
	{
		tongtien+=parseInt(tinhtien[i].value);
		
	}
	document.getElementById("price_").innerHTML=tongtien;
	console.log("ok");

	
}

function checkOut()
{
	var elements = document.getElementsByClassName("delete");	
	var quantity = document.getElementsByClassName("soluong");
	var idPro = ""
	var soluong= ""
	for(let i=0;i<elements.length;i++)
	{
		console.log(elements[i].value);
		soluong+=quantity[i].innerText+"n";
		idPro+=elements[i].value+"n"
	}

	console.log(idPro)

	html='<form action="checkOut.php" method="post">'+
	'<input type="hidden" name="id" value="'+idPro+'">'+
	'<input type="hidden" name="quantity" value="'+soluong+'">'+
	'<input style="display: none" type="submit"  Id="thanhtoansubmit" value="Thanh Toan">'
	'</form>'
	document.write(html);
	document.getElementById("thanhtoansubmit").click();

}
