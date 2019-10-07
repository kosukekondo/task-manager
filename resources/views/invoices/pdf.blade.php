<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>PDF</title>
        <style>
            body {
                font-family: ipag;
                padding: 3px;
            }
            
            header {
                height: 100px;
            }
            
            h1 {
                text-align: center;
                border-bottom: double 1px black;
                margin: 10px;
            }

            h2 {
                 border-bottom: double 1px black;
                 margin: 0px;
            }
            
            table {
                border-collapse: collapse;
            }
            
            table th, table td {
                border: 1px solid black;
            }
            
            p {
                margin: 0px;
            }
            
            #left {
                width: 55%;
                padding: 20px;
                float: left;
            }
            
            #right {
                width: 35%;
                padding: 20px;
                float: right;
            }
            
            #detail {
                padding: 20px;
                clear: both;
            }
            
            #bank {
                width: 60%;
                padding: 20px;
                border: 1px solid black;
            }
            

        </style>
    </head>
    <body>
        <header>
            <p style="text-align:right;">発行日：{{ $period_end->format('Y/m/d') }}</p>
            <h1>請求書</h1>
        </header>
        <div id="wrapper">
            <div id="left">
                <h2>{{ $invoices[0]['company_name'] }} 御中</h2>
                <p style="margin: 20px 0px 0px;">件名</p>
                <h2>{{ $invoices[0]['year'] }}年{{ $invoices[0]['month'] }}月分　ご請求書</h2>
                <p style="margin: 20px 0px 0px;">いつもお世話になっております。</p>
                <p>下記の通り請求申し上げます。</p>
                <table style="width: 100%; margin: 20px 0px 0px;">
                    <tr>
                        <th><h3 style="text-align: center;">合計金額</h3></th>
                        <th><h3 style="text-align: right;">{{ number_format($grand_total) }}円</h3></th>
                    </tr>
                </table>
            </div>
            <div id="right">
                <p style="margin: 20px 0px 0px;">社名：株式会社テスト</p>
                <p>住所：東京都世田谷区北沢1-1-1</p>
                <p>電話番号：12-3456-7890</p>
                <p>担当者：テスト太郎</p>
                <img src="http://resource.namaeya.jp/productimg/rs-311/rs-311___large1.jpg" style="width: 30%; padding: 20px;"></img>
            </div>
        </div>

        <div id="detail">
            <table style="width: 100%;">
                <tr>
                    <th style="text-align: center;">内容</th>
                    <th style="text-align: center;">数量</th>
                    <th style="text-align: center;">単価</th>
                    <th style="text-align: center;">金額</th>
                </tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: right;">{{ number_format($task->price) }}</td>
                        <td style="text-align: right; font-weight: bold;">{{ number_format($task->price) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="border: 1px solid white;"></td>
                    <td style="border-bottom: solid 1px white;"></td>
                    <th style="text-align: center;">消費税</th>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($tax) }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid white;"></td>
                    <td style="border-bottom: solid 1px white;"></td>
                    <th style="text-align: center;">合計</th>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($grand_total) }}</td>
                </tr>
            </table>
        </div>

        <div id="bank">
            <p>支払期限：御社規定の通り</p>
            <p style="margin: 20px 0px 0px;">お支払いは下記口座へお振込にてお願いいたします。</p>
            <p>（支払手数料は貴社にてご負担をお願いいたします。）</p>
            <p style="margin: 20px 0px 0px;">ああああ銀行　いいい支店　普通口座</p>
            <p>口座番号：1234567</p>
            <p>口座名義：株式会社テスト</p>
            <p>代表取締役　テスト太郎　（表記：ｶ)ﾃｽﾄ）</p>
        </div>
    </body>
</html>