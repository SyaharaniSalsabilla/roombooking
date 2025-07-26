<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di NinSpace</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: white; max-width: 600px; margin: auto; border-radius: 8px; padding: 20px;">
        <tr>
            <td align="center">
                <img src="https://anindhaloka.com/assets/front/image/Anindhaloka.png" alt="Logo" style="height: 50px;">
            </td>
        </tr>
        <tr>
            <td>
                <h2 style="color: #991b1b;">Halo {{ $user->profile->nama ?? $user->email }},</h2>
                <p>Terima kasih telah mendaftar di aplikasi <strong>NinSpace</strong>.</p>
                <p>Sekarang kamu bisa mulai memesan ruangan melalui website kami.</p>
                <p style="text-align: center; margin: 20px 0;">
                    <a href="https://anindhaloka.com" style="padding: 10px 20px; background-color: #991b1b; color: white; text-decoration: none; border-radius: 4px;">Kunjungi Website</a>
                </p>
                <p>Jika kamu tidak merasa membuat akun ini, abaikan email ini.</p>
                <p>Salam,<br>Tim NinSpace</p>
            </td>
        </tr>
    </table>
</body>
</html>
