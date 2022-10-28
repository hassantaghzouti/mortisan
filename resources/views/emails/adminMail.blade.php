<!DOCTYPE html>
<html>
<head>
    <title>Mortisan</title>
</head>
<body>
<table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    <tr>
        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
            class="main-header">
            <p style="line-height: 35px">
                <span style="color: #f7941d;">Mortisan</span><span style="color: #000000;"> Admin</span>
            </p>
        </td>
    </tr>
    <tr>
        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
    </tr>
    <tr>
        <td align="center">
            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                <tr>
                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
    </tr>
    <tr>
        <td align="left">
            <table border="0" width="590" align="center" cellpadding="0" cellspacing="0" class="container590">
                <tr>
                    <td align="left" style="color: #000; font-size: 20px; font-family: Calibri; line-height: 24px;">
                        <p style="line-height: 24px; margin-bottom:15px;">
                            New client registered : <b>{{ $details['clientName'] }}</b>,
                        </p>
                        <p style="line-height: 24px; margin-bottom:15px;">
                            Client Email : <b>{{ $details['clientMail'] }}</b>,
                        </p>
                        <p style="line-height: 24px; margin-bottom:15px;">
                            Registered Day/Time  : <b>{{ $details['registeredTime'] }}</b>,
                        </p>
                        
                        <p style="line-height: 24px">
                            Mortisan Admin Team
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>