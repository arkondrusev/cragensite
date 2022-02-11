<!DOCTYPE html>
<html>
<body>
	<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['msg'];
		$backUrl = $_POST['backUrl'];
		$mes = "От $name.\r\nПочта $email.\r\nТелефон $phone.\r\n\r\n$message";
		$send = mail($email, "Тема письма", $mes, "Content-type:text/plain; charset = UTF-8\r\nFrom:webmaster@sadkoala.ru");
		if ($send == 'true') {echo "Сообщение отправлено";}
		else {echo "Ой, что-то пошло не так";}
	?>
	
	<br/>
	<div>Возврат на предыдущую страницу через <span>7</span> сек.</div>
	
	<script type="text/javascript">
		let cntElem = document.querySelector("span");
		let cnt = 7;
		cntElem.innerHTML = cnt;
		
		let intId = setInterval(() => {
			cnt--;
			cntElem.innerHTML = cnt;
			
			if (cnt === 0) {
				clearInterval(intId);
				location.href = <?php echo json_encode($backUrl, JSON_HEX_TAG); ?>;
			}
		}, 1000);
	</script>	
</body>
</html>
