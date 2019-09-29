<?php
echo "Created By Izzamuddin Royhul Firdaus\nEmail : rezultroy@gmail.com\n";
$user = readline("Masukkan Username:");
$pass = readline("Masukkan Password: ");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://admin.epicashapp.com/api/v3/account.signIn.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&clientId=1&password=$pass&");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 5.1.1; LGM-V300K Build/N2G47H)';
$headers[] = 'Host: admin.epicashapp.com';
$headers[] = 'Connection: close';
$headers[] = 'Accept-Encoding: gzip, deflate';
//$headers[] = 'Content-Length: 41';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}else
{
	$pecah = json_decode($result,1);
	if ($pecah['error_code'] == 1) {
		die("User / Password Salah");
	}
	//print_r($pecah);
	$token = $pecah["accessToken"];
	$info_acc = $pecah['account']['0'];
	$nama = $info_acc['fullname'];
	$email = $info_acc['email'];
	$point = $info_acc['points'];
	echo "Akun Dengan\nNama : $nama\nEmail : $email\nSaldo : $point\n";
}
curl_close($ch);
//("");
$data = "data=".urlencode('{"clientId":"1","accountId":"135","accessToken":"'.$token.'","user":"'.$user.'","ver":"2.5","pckg":"proxima.e.android","tictactoe":"1","luckyReward":"1","status":false}')."&";
$berapa = readline("Mau Berapa Point:");
for ($i=0; $i < $berapa; $i++) { 
	# code...

$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://admin.epicashapp.com/api/v3/tictactoe.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_POST, 1);

	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
	$headers[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 5.1.1; LGM-V300K Build/N2G47H)';
	$headers[] = 'Host: admin.epicashapp.com';
	$headers[] = 'Connection: close';
	//$headers[] = 'Cookie: PHPSESSID=eb00f46fbaf362186e75948b47a4d5c2';
	$headers[] = 'Content-Length: 302';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	} else {
		if (preg_match("/false/", $result)) {
			echo "Berhasil\n";
		}else
		{
			echo "Gagal Bro".\n;
		}
	}
	curl_close($ch);
	}
?>