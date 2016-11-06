<script>
	var str = "12/27/2016";
	var day = parseInt(str.substring(3,5))+1;
	console.log(day);
	var toDate = str.replace(str.substring(3,5),day);
</script>