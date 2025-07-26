<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Diperbarui</title>
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
                <p>Informasi profil kamu telah berhasil diperbarui.</p>
                <p>Jika kamu tidak merasa melakukan perubahan ini, harap segera hubungi tim kami.</p>
                <p>Terima kasih telah menggunakan NinSpace.</p>
                <p>Salam,<br>Tim NinSpace</p>
            </td>
        </tr>
    </table>
</body>
</html>
