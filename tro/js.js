function check(a)
{
	if( a<2) return false;
	if(	a==2 ) return true;
	for( let i=2;i<=Math.sqrt(a);i++)
	{
		if(a%i==0) return false
	}
	return true
}

for( let i =2;i<100;i++)
{
	if(check(i)) console.log(i);
}
// ---------------------
function time()
{
	document.getElementById('time').innerHTML=Date()
}