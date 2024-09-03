<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>{{ $name }} 您好，</p>
        <br>
        <div style="background-color:#f2f2f2;vertical-align:top;padding:20px 25px">
            <h4>請點選「我要註冊」按鈕來完成註冊。</h4>
            <p>會員繳納會員費，請透過郵局劃撥或至『會員繳費』進行線上刷卡，以便完成會員申請手續。</p>
            <div style="padding:10px 25px;text-align:center">
                <a href="{{ $href }}" style="display:inline-block;background:#ec6f11;color:#ffffff;text-decoration:none;text-transform:none;padding:10px 60px;border-radius:3px" target="_blank">我要註冊</a>
            </div>
        </div>
        <p>若無法點選按鈕請連此網址：</p>
        <a href="{{ $href }}" style="color:#ec6f11" target="_blank">{{ $href }}</a>
        <br>
        <br>
        <small>
            謝謝您<br>臺灣財務金融學會敬上
        </small>
    </body>
</html>