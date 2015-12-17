<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<title>Test</title>
</head>
<body>

<div id="container">
	<form>
		<table>
			<tr>
				<td>
					Название компании <input type = "text" id = "name"/>
				</td>
			</tr>
			<tr>
				<td>
					Описание компании <textarea id = "description"></textarea>
				</td>
			</tr>
		</table>
		<input type = "submit" value = "Отправить" onclick = "myFunc();return false;"/>
	</form>
</div>
<div id = "result"></div>

	<script>
	function $_GET(key) {
	var s = window.location.search;
	s = s.match(new RegExp(key + '=([^&=]+)'));
	return s ? s[1] : false;
}

		function myFunc()
		{
			
			var get_url_id = $_GET('id');
			if(get_url_id == false){
				get_url_id = 23801;
			}
			var name = $('#name').val();
			var description = $('#description').val();
			if(name == ''){
				alert('Заполните поле "Название компании"');
				return false;
			} else if(description == ''){
				alert('Заполните поле "Описание компании"');
				return false;
			}
			$.ajax({
			  type: "POST",
			  url: "/main",
			  data: {
				'id': get_url_id,
				'area':'area.ru.r4.a44.628',
				'rating': '2.000',
				'inn': '1234567890',
				'kpp': '987654321',
				'name': name,
				'name_full': 'Общество с ограниченной ответственностью '+name,
				'address': '420087, Россия, Казань, Ленина, 15',
				'address_legal': '420073 Казань Ленина 15, Россия',
				'anno_short': 'продажа спецодежды, спецобуви, средств индивидуальной защиты',
				'anno': description,
				'phone': '(843) 295-12-34',
				'fax': '(843) 295-12-35',
				'site': '',
				'location': '["Россия","Приволжский","Республика Татарстан","Казань"]'
			  },
			  success: function(data){
				var data = JSON.parse(data);
				console.log(data);
				var item = '<table>';
				item += '<tr>';
				item += '<td>';
				item += '# - '+data.id;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Адрес - '+data.area;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Rating - '+data.rating;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'inn - '+data.inn;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'kpp - '+data.kpp;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Адрес - '+data.address;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Точный адрес - '+data.address_legal;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Описание - '+data.name;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Полное описание - '+data.anno;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'anno_short - '+data.anno_short;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Fax - '+data.fax;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'location - '+data.location;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Name full - '+data.name_full;
				item += '</td>';
				item += '</tr>';
				item += '<tr>';
				item += '<td>';
				item += 'Телефон - '+data.phone;
				item += '</td>';
				item += '</tr>';
				item += '</table>';
				$('#result').html(item);
			  }
			});
		}
	</script>


</body>
</html>