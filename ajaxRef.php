
		<script type = "text/javascript">	
			function sendRequest(name)
			{
				if(window.XMLHttpRequest)
					req = new XMLHttpRequest();
				else
					req = new ActiveXObject("Microsoft.XMLHttp");
				req.onreadystatechange = showMessage;
				url = "addToCart.php?item="+name;
				req.open("POST", url, true);
				req.send(null);
			}
			function showMessage()
			{
				if (req.readyState == 4)
				{
					document.getElementById("message").innerHTML = req.responseText;
				}
			}
		</script>
